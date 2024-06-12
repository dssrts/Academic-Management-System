<?php

namespace App\Http\Controllers;

use App\Models\Appeal;
use App\Models\ClassModel;
use App\Models\College;
use App\Models\Employee;
use App\Models\Grade;
use App\Models\Instructor;
use App\Models\Professor;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\StudentRecord;
use App\Models\StudentTerm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ChairpersonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function dashboard(Request $request)
    {
        $btns = [
            'dashboard' => true,
            'information' => true,
            'grades' => true,
            'process' => true,
            'inbox' => true,
            'classroom' => true,
            'professors' => true,
        ];
    
        $user = Auth::user();
        // echo "user: ". $user;
        $employee = \App\Models\Employee::where('employee_id', $user->id)->first();
        $program = "test";
    
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

            // Fetch grades for these students and group by year level
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
        } else {
            $students = collect(); // Empty collection if no employee found
            $yearLevels = [];
        $averageGrades = [];
        }
    
        return view('Chairperson.cp-dashboard', compact('btns', 'user', 'employee', 'program', 'students', 'yearLevels', 'averageGrades'));
    
        // return view('Chairperson.cp-dashboard', compact('btns', 'user', 'employee', 'program'));
    }
    

    public function viewStudents()
{
    $user = Auth::user();
    $employee = \App\Models\Employee::where('employee_id', $user->id)->first();
    $program = "test";

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
    } else {
        $studentTerms = collect(); // Empty collection if no employee found
    }

    $enrolledStudents = $studentTerms->where('enrolled', 1)->count();
    $enlistedStudents = $studentTerms->where('enrolled', 0)->count();
    $regularStudents = $studentTerms->where('registration_status_id', 1)->count();
    $irregularStudents = $studentTerms->where('registration_status_id', 2)->count();

    $studentsPerYearLevel = $studentTerms->groupBy('year_level')->map(function ($group) {
        return $group->count();
    })->toArray();

    return view('Chairperson.cp-view-students', compact('enrolledStudents', 'enlistedStudents', 'regularStudents', 'irregularStudents', 'studentsPerYearLevel'));
}


    public function viewStudent(Student $student)
    {
        $user = Auth::user();
        $studentRecords = StudentRecord::where('student_id', $student->id)->get();
        $classes = ClassModel::whereHas('studentRecord', function ($query) use ($student) {
            $query->where('student_id', $student->id);
        })->with('professor')->get();
        return view('Chairperson.cp-view-student-info', compact('student', 'studentRecords', 'classes', 'user'));
    }
    public function viewAppeals(Request $request)
    {
        $userId = Auth::user()->id;
    
        // Validate the request inputs
        $request->validate([
            'start_date' => 'nullable|date_format:Y-m-d',
            'remarks' => 'nullable|in:remarked,not_done',
        ]);
    
        // Apply filters if present
        $appealsQuery = Appeal::where('user_id', $userId);
    
        if ($request->has('start_date') && $request->start_date) {
            // Convert start_date to a Carbon instance for better compatibility
            $startDate = \Carbon\Carbon::createFromFormat('Y-m-d', $request->start_date)->startOfDay();
            $appealsQuery->where('created_at', '>=', $startDate);
        }
    
        if ($request->has('remarks') && $request->remarks) {
            if ($request->remarks == 'remarked') {
                $appealsQuery->whereNotNull('remarks');
            } elseif ($request->remarks == 'not_done') {
                $appealsQuery->whereNull('remarks');
            }
        }
    
        $appeals = $appealsQuery->with(['student' => function($query) {
            $query->select('id', 'plm_email');
        }])->paginate(20);
    
        $btns = [
            'dashboard' => false,
            'information' => false,
            'grades' => false,
            'process' => false,
            'inbox' => false,
            'classroom' => false,
            'appeals' => true,
            'professors' => true,
        ];
    
        $user = Auth::user();
        return view('Chairperson.cp-view-appeals', compact('appeals', 'btns', 'user'));
    }

    public function updateAppeal(Request $request, $id)
{
    $request->validate([
        'remarks' => 'required|string|in:pending,approved,denied',
    ]);

    $appeal = Appeal::findOrFail($id);
    $appeal->remarks = $request->input('remarks');
    $appeal->save();

    return redirect()->route('view-appeals')->with('success', 'Appeal status updated successfully.');
}

    public function saveRemarks(Request $request)
{
    $request->validate([
        'appeal_id' => 'required|exists:appeals,id',
        'remarks' => 'nullable|string'
    ]);

    $appeal = Appeal::find($request->appeal_id);
    $appeal->remarks = $request->remarks;
    $appeal->save();

    return response()->json(['success' => true]);
}

    
    
public function viewProfessors(Request $request)
{
    // Get the current logged-in user
    $user = Auth::user();
    
    // Get the employee record of the current user
    $employee = Employee::where('employee_id', $user->id)->first();
    
    if ($employee) {
        // Get the department ID of the current user's employee record
        $departmentId = json_decode($employee->department_id)[0];

        // Get all employees with the same department ID
        $employeeIds = Employee::whereJsonContains('department_id', $departmentId)
                               ->pluck('employee_id')
                               ->toArray();

        // Filter instructors based on the IDs of these employees
        $query = Instructor::whereIn('id', $employeeIds);
        
        // Add search functionality
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('last_name', 'like', '%' . $search . '%')
                  ->orWhere('first_name', 'like', '%' . $search . '%')
                  ->orWhere('middle_name', 'like', '%' . $search . '%')
                  ->orWhere('email_address', 'like', '%' . $search . '%');
            });
        }

        // Paginate the results
        $professors = $query->paginate(15);

        // Get course distribution data
        $courseDistribution = $query->with('courses')->get()->groupBy(function($instructor) {
            return $instructor->courses->count();
        })->map(function($group) {
            return $group->count();
        })->toArray();
    } else {
        // If no employee record is found, return an empty collection
        $professors = collect();
        $courseDistribution = [];
    }

    // Get all colleges
    $colleges = College::all();

    // Define button states
    $btns = [
        'dashboard' => false,
        'information' => false,
        'grades' => false,
        'process' => false,
        'inbox' => false,
        'classroom' => false,
        'appeals' => false,
        'professors' => true,
        'classes' => false,
    ];

    // Return the view with the relevant data
    return view('Chairperson.cp-view-professors', compact('professors', 'colleges', 'btns', 'user', 'courseDistribution'));
}



    public function updateClassProfessor(Request $request, ClassModel $class)
{
    $class->professor_id = $request->professor_id;
    $class->save();

    return redirect()->route('view-classes')->with('success', 'Professor updated successfully.');
}
public function createProfessor(Request $request)
{
    $request->validate([
        'college_id' => 'required|exists:colleges,id',
        'last_name' => 'required|string|max:45',
        'first_name' => 'required|string|max:45',
        'middle_name' => 'nullable|string|max:45',
        'pronouns' => 'nullable|string|max:45',
        'plm_email' => 'required|string|email|max:255|unique:professors,plm_email',
    ]);

    Professor::create($request->all());

    return redirect()->route('view-professors')->with('success', 'Professor added successfully.');
}
public function createClass(Request $request)
{
    $request->validate([
        'code' => 'required|string|max:45',
        'section' => 'required|integer',
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'units' => 'required|integer',
        'day' => 'required|string|max:45',
        'start_time' => 'required',
        'end_time' => 'required',
        'building' => 'required|string|max:45',
        'room' => 'required|string|max:45',
        'type' => 'required|string|max:56',
        'professor_id' => 'nullable|exists:professors,id',
    ]);

    ClassModel::create([
        'code' => $request->code,
        'section' => $request->section,
        'name' => $request->name,
        'description' => $request->description,
        'units' => $request->units,
        'day' => $request->day,
        'start_time' => $request->start_time,
        'end_time' => $request->end_time,
        'building' => $request->building,
        'room' => $request->room,
        'type' => $request->type,
        'professor_id' => $request->professor_id,
    ]);

    return redirect()->route('view-classes')->with('success', 'Class added successfully!');
}
public function editClass(ClassModel $class)
{
    $user = Auth::user();
    $professors = Professor::where('college_id', $user->college_id)->get();
    return view('Chairperson.cp-edit-class', compact('class', 'professors', 'user'));
}

public function updateClass(Request $request, ClassModel $class)
{
    $request->validate([
        'code' => 'required|string|max:45',
        'section' => 'required|integer',
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'units' => 'required|integer',
        'day' => 'required|string|max:45',
        'start_time' => 'required',
        'end_time' => 'required',
        'building' => 'required|string|max:45',
        'room' => 'required|string|max:45',
        'type' => 'required|string|max:56',
        'professor_id' => 'nullable|exists:professors,id',
    ]);

    $class->update([
        'code' => $request->code,
        'section' => $request->section,
        'name' => $request->name,
        'description' => $request->description,
        'units' => $request->units,
        'day' => $request->day,
        'start_time' => $request->start_time,
        'end_time' => $request->end_time,
        'building' => $request->building,
        'room' => $request->room,
        'type' => $request->type,
        'professor_id' => $request->professor_id,
    ]);

    return redirect()->route('view-classes')->with('success', 'Class updated successfully!');
}


public function viewClasses(Request $request){
    $user = Auth::user();
    $employee = \App\Models\Employee::where('employee_id', $user->id)->first();
    $programId = null;

    if ($employee) {
        $departmentIds = json_decode($employee->department_id, true);
        $departmentId = $departmentIds[0] ?? null;

        if ($departmentId) {
            $program = \App\Models\Program::where('id', $departmentId)->first();
            if ($program) {
                $programId = $program->id;
            }
        }
    }

    if (!$programId) {
        return []; // No program found, return empty result
    }

    // Get the student numbers from student terms in the current user's program
    $studentNos = \App\Models\StudentTerm::where('program_id', $programId)
        ->pluck('student_no')
        ->toArray();

    // Fetch the number of classes each day per year level
    $classSchedules = DB::table('class_schedules')
        ->join('student_classes', 'class_schedules.class_id', '=', 'student_classes.class_id')
        ->join('student_terms', 'student_classes.student_no', '=', 'student_terms.student_no')
        ->whereIn('student_terms.student_no', $studentNos)
        ->select(
            'student_terms.year_level',
            'class_schedules.day',
            DB::raw('COUNT(*) as number_of_classes')
        )
        ->groupBy('student_terms.year_level', 'class_schedules.day')
        ->orderBy('student_terms.year_level')
        ->orderBy('class_schedules.day')
        ->get();

    // Prepare data for bar charts
    $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    $yearData = [
        1 => array_fill_keys($days, 0),
        2 => array_fill_keys($days, 0),
        3 => array_fill_keys($days, 0),
        4 => array_fill_keys($days, 0),
    ];

    foreach ($classSchedules as $schedule) {
        $yearData[$schedule->year_level][$schedule->day] = $schedule->number_of_classes;
    }

    // Calculate total units per year level
    $totalUnits = DB::table('student_terms')
        ->join('student_classes', 'student_terms.student_no', '=', 'student_classes.student_no')
        ->join('classes', 'student_classes.class_id', '=', 'classes.id')
        ->whereIn('student_terms.student_no', $studentNos)
        ->select('student_terms.year_level', DB::raw('SUM(classes.actual_units) as total_units'))
        ->groupBy('student_terms.year_level')
        ->get();

    $totalUnitsPerYear = [];
    foreach ($totalUnits as $unit) {
        $totalUnitsPerYear[$unit->year_level] = $unit->total_units;
    }

    return view('Chairperson.cp-view-classes', compact('yearData', 'days', 'totalUnitsPerYear'));
}


public function showAssignClassesForm()
{
    // Get the current logged-in user
    $user = Auth::user();
    
    // Get the employee record of the current user
    $employee = Employee::where('employee_id', $user->id)->first();
    
    if ($employee) {
        // Get the department ID of the current user's employee record
        $departmentId = json_decode($employee->department_id)[0];

        // Get all employees with the same department ID
        $employeeIds = Employee::whereJsonContains('department_id', $departmentId)
                               ->pluck('employee_id')
                               ->toArray();

        // Filter instructors based on the IDs of these employees
        $instructors = Instructor::whereIn('id', $employeeIds)->get();

        // Get all classes
        $classes = ClassModel::all(); // Assuming you have a Class model
    } else {
        // If no employee record is found, return empty collections
        $instructors = collect();
        $classes = collect();
    }

    return view('Chairperson.cp-assign-classes', compact('instructors', 'classes'));
}

public function assignClasses(Request $request)
{
    $validated = $request->validate([
        'instructor_id' => 'required|exists:instructors,id',
        'class_id' => 'required|exists:classes,id',
    ]);

    // Assuming you have a pivot table named class_instructor to assign classes to instructors
    DB::table('class_faculty')->insert([
        'instructor_id' => $validated['instructor_id'],
        'class_id' => $validated['class_id'],
    ]);

    return redirect()->route('assign-classes.form')->with('success', 'Class assigned to instructor successfully.');
}
public function showSendEmailForm()
{
    return view('Chairperson.cp-laboratory');
}

public function sendEmail(Request $request)
{
    $validated = $request->validate([
        'recipient_email' => 'required|email',
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
    ]);
    
    // Send the email
    Mail::raw($validated['message'], function ($message) use ($validated) {
        $message->to($validated['recipient_email'])
                ->subject($validated['subject']);
    });

    return redirect()->route('send-email.form')->with('success', 'Email sent successfully.');
}

}



