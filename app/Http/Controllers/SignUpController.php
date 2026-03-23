<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\College;
use App\Models\Department;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use App\Models\Grade;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Appeal;
use App\Models\ClassModel;
use App\Models\StudentRecord;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\Professor;


class SignUpController extends Controller
{
    public function get(Request $request)
    {
        Auth::logout(); // Logs the user out
        $request->session()->invalidate(); // Invalidates the session
        $request->session()->regenerateToken(); // Regenerate the CSRF token
        return view('sign-in', ['error' => 'valid']);
    }

    public function studentrequest(Request $request, $student_no)
    {
        $validator = Validator::make($request->all(), [
            'pdf_file' => 'nullable|mimes:pdf|max:2048', // 2MB Max
        ]);

        if ($validator->fails()) {
            session()->flash('buttons', 'process');
            return redirect()->route('student-view.get', $student_no)->with('status', 'error');
        }

        $studentNumber = $request->studentnumber;
        $recipientEmail = $request->recipientemail;
        $student = Student::where('student_no', $studentNumber)->first();
        $chairperson = User::where('email', $recipientEmail)->first();

        if (!$student || !$chairperson) {
            return redirect()->back()->with('status', 'error')->with('message', 'Student or Chairperson not found.');
        }

        $subject = $request->subject;
        $message = $request->message;

        $filePath = null;
        if ($request->hasFile('pdf_file')) {
            $file = $request->file('pdf_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $filename, 'public');
        }

        DB::table('appeals')->insert([
            'student_id' => $student->id,
            'user_id' => $chairperson->id,
            'subject' => $subject,
            'message' => $message,
            'filepath' => $filePath ? '/storage/' . $filePath : null,
            'viewed' => 'unread',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        session()->flash('buttons', 'process');

        return redirect()->route('student-view.get', $student_no)->with('status', 'success');
    }

    public function studentview(Request $request, $student_no)
    {
        $student = Student::where('student_no', $student_no)->first();
        if (!$student) {
            return redirect()->back()->with('error', 'Student not found');
        }
    
        $student_id = $student->id;
        $appeals = Appeal::where('student_id', $student_id)->orderBy('created_at', 'desc')->get();
        $buttons = session()->get('buttons');
        $panel = $request->panel;
        $send = session()->get('status');
        session()->forget('buttons');
    
        $btns = [
            'dashboard' => false,
            'schedule' => false,
            'information' => false,
            'grades' => false,
            'process' => false,
            'classroom' => false,
            'services' => false,
            'inbox' => false,
        ];
    
        if ($buttons) {
            if (array_key_exists($buttons, $btns)) {
                $btns[$buttons] = true;
            }
        } else {
            if ($panel == 'grades') {
                $btns['grades'] = true;
            } else {
                $btns['dashboard'] = true;
            }
        }
    
        $college_id = $student->college;
        $department_id = $student->degree_program;
    
        $college = College::where('id', $college_id)->first();
        $department = Department::where('department_id', $department_id)->first();
    
        // Query to get grades related to the student
        $gradesQuery = Grade::whereHas('class', function ($query) use ($student) {
            $query->whereHas('studentRecord', function ($query) use ($student) {
                $query->where('student_id', $student->id);
            });
        });
    
        $defaultYear = '2024'; // Default year
        if ($request->has('year') && $request->year != 'all') {
            $defaultYear = $request->year;
            $gradesQuery->whereYear('created_at', $defaultYear);
        }
    
        $grades = $gradesQuery->get();
    
        // Fetch the student record and classes
        $studentRecord = StudentRecord::where('student_id', $student->id)->first();
        $classes = collect();
        if ($studentRecord) {
            $currentYear = now()->year;
            $classes = ClassModel::where('student_record_id', $studentRecord->id)
                ->whereYear('created_at', $currentYear)
                ->orderBy('day')
                ->orderBy('start_time')
                ->get();
        }
    
        // Process classes into a schedule format
        $schedule = [
            'Monday' => [],
            'Tuesday' => [],
            'Wednesday' => [],
            'Thursday' => [],
            'Friday' => [],
            'Saturday' => [],
        ];
    
        foreach ($classes as $class) {
            $day = $class->day;
            $startTime = \Carbon\Carbon::parse($class->start_time)->format('g:i A');
            $endTime = \Carbon\Carbon::parse($class->end_time)->format('g:i A');
            $professor = Professor::find($class->professor_id);
            $schedule[$day][] = [
                'name' => $class->name,
                'time' => $startTime . ' - ' . $endTime,
                'building' => $class->building,
                'room' => $class->room,
                'professor' => $professor ? $professor->last_name . ' ' . $professor->first_name : 'N/A',
                'code' => $class->code,
                'type' => $class->type,
            ];
        }
    
        return view('student-view', [
            'students' => $student,
            'department' => $department,
            'college' => $college,
            'grades' => $grades,
            'defaultYear' => $defaultYear ?? null,
            'buttons' => 'information',
            'btns' => $btns,
            'appeals' => $appeals,
            'send' => $send,
            'schedule' => $schedule,
        ]);
    }
    
    
    
    

    public function post(Request $request)
    {
        $btns = [
            'information' => true,
            'schedule' => false,
            'grades' => false,
            'process' => false,
            'classroom' => false,
            'services' => false,
        ];
        $request->validate([
            'user_id' => 'required',
            'password' => 'required',
        ]);
        $user_id = $request->user_id;
        $password = $request->password;

        if (Auth::attempt(['id' => $user_id, 'password' => $password])) {    
            $userId = Auth::id(); // Get the authenticated user's ID
            $user = Auth::user();
            if ($user->usertype == "student") {
                $student = Student::where('student_no', $userId)->first();
                $studentTerms = DB::table('student_terms')->where('student_no', $student->student_no)->first();
                $program = DB::table('programs')->where('id', $studentTerms->program_id)->first();
                $college = DB::table('colleges')->where('id', $program->college_id)->first();
            
                // Fetch all grades for the student
                $grades = DB::table('grades')->where('student_no', $student->student_no)->pluck('grade');
            
                // Calculate the General Weighted Average (GWA)
                $totalGrades = $grades->sum();
                $numGrades = $grades->count();
                $gwa = $numGrades? round($totalGrades / $numGrades, 3) : 0;
            
                // Determine the current semester and calculate progress
                $currentDate = Carbon::now();
                $semesterStart = $currentDate->month <= 6? Carbon::createFromDate($currentDate->year, 1, 1) : Carbon::createFromDate($currentDate->year, 7, 1);
                $semesterEnd = $currentDate->month <= 6? Carbon::createFromDate($currentDate->year, 6, 30) : Carbon::createFromDate($currentDate->year, 12, 31);
                $daysInSemester = $semesterEnd->diffInDays($semesterStart);
                $elapsedDays = $currentDate->diffInDays($semesterStart);
                $progressPercentage = ($elapsedDays / $daysInSemester) * 100;
            
                return view('Student.student-information', [
                    'student' => $student,
                    'studentTerms' => $studentTerms,
                    'program' => $program,
                    'college' => $college,
                    'grades' => $grades,
                    'gwa' => $gwa,
                    'semProgress' => round($progressPercentage, 2) // Return the semester progress as a rounded percentage
                ]);
            }  
            else {
                $employee = \App\Models\Employee::where('employee_id', $user->id)->first();
                $program = null;
            
                if ($employee) {
                    // Decode the JSON-encoded department_id
                    $departmentIds = json_decode($employee->department_id, true);
                    // Assuming you need the first department ID
                    $departmentId = $departmentIds[0] ?? null;
            
                    if ($departmentId) {
                        $program = \App\Models\Program::where('id', $departmentId)->first();
                    }
                }
                if ($employee) {
                    $departmentIds = json_decode($employee->department_id, true);
                    // Assuming you need the first department ID
                    $departmentId = $departmentIds[0] ?? null;
                    
                    // Fetch student terms that belong to the same department
                    $studentTerms = \App\Models\StudentTerm::where('program_id', $departmentId)->get();
                    
                    // Get student numbers from student terms
                    $studentNos = $studentTerms->pluck('student_no')->toArray();
                    
                    // Fetch students with the same student numbers
                    $students = \App\Models\Student::whereIn('student_no', $studentNos)->paginate(15);
                    $grades = Grade::whereIn('grades.student_no', $studentNos)
                    ->join('student_terms', 'grades.student_no', '=', 'student_terms.student_no')
                    ->select('student_terms.year_level', DB::raw('AVG(grades.grade) as average_grade'))
                    ->groupBy('student_terms.year_level')
                    ->get();
            
            // Preparing data for Chart.js
            $yearLevels = $grades->pluck('year_level')->toArray();
            $averageGrades = $grades->pluck('average_grade')->toArray();
            
                    // Preparing data for Chart.js
                    $yearLevels = $grades->pluck('year_level')->toArray();
                    $averageGrades = $grades->pluck('average_grade')->toArray();

                    $sfeCount = DB::table('course_sfe_students')
                ->whereIn('student_no', $studentNos)
                ->where('status', true)
                ->distinct('student_no')
                ->count();
    
                    $totalStudents = count($studentNos);
                    $sfePercentage = ($totalStudents > 0) ? ($sfeCount / $totalStudents) * 100 : 0;
                    } else {
                        $students = collect();
                        $yearLevels = [];
                        $averageGrades = [];
                        $sfeCount = 0;
                        $sfePercentage = 0;
                    }
                
                    return view('Chairperson.cp-dashboard', compact('btns', 'user', 'employee', 'program', 'students', 'yearLevels', 'averageGrades', 'sfeCount', 'sfePercentage'));

            
                // return view('Chairperson.cp-dashboard', compact('btns', 'user', 'employee', 'program', 'students'));
                // return view('Chairperson.cp-dashboard', compact('btns', 'program'));
            }
        }
        return view('sign-in', ['error' => 'invalid', 'btns' => $btns]);
    }

    public function resetpassword(Request $request)
    {
        $old_password = $request->old_password;
        $new_password = $request->new_password;
        $current_email = $request->current_email;
        $current_student_no = $request->current_student_no;

        if ($new_password != $old_password) {
            return view('reset-password');
        }
    }

    public function getresetpassword(Request $request)
    {
        return view('reset-password');
    }
}
