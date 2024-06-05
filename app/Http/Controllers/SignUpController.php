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
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class SignUpController extends Controller
{
    public function get(Request $request){
        Auth::logout(); // Logs the user out
        $request->session()->invalidate(); // Invalidates the session
        $request->session()->regenerateToken(); // Regenerate the CSRF token
        return view('sign-in',['error' => "valid"]);
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
            'viewed' => "unread",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
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
        $appeals = Appeal::where('student_id', $student_id)
            ->orderBy('created_at', 'desc')
            ->get();
        
        $buttons = session()->get('buttons');
        $panel = $request->panel;
        $send = session()->get('status');
        session()->forget('buttons');
    
        $btns = [
            'dashboard' => false,
            'information' => false,
            'grades' => false,
            'process' => false,
            'classroom' => false,
            'services' => false,
            'inbox' => false,
        ];
    
        if ($buttons && array_key_exists($buttons, $btns)) {
            $btns[$buttons] = true;
        } else {
            $btns[$panel === "grades" ? 'grades' : 'dashboard'] = true;
        }
    
        $college = College::find($student->college);
        $department = Department::find($student->degree_program);
    
        $dummyGrades = $this->generateDummyGrades($student_id);
    
        $defaultYear = $request->get('year', '2024'); // Default year is 2024
        if ($defaultYear !== 'all') {
            $dummyGrades = array_filter($dummyGrades, function ($grade) use ($defaultYear) {
                return $grade['year'] == $defaultYear;
            });
            $dummyGrades = array_values($dummyGrades); // Reset array keys
        }
    
        return view('student-view', [
            'students' => $student,
            'department' => $department,
            'college' => $college,
            'grades' => $dummyGrades,
            'defaultYear' => $defaultYear,
            'buttons' => "information",
            'btns' => $btns,
            'appeals' => $appeals,
            'send' => $send
        ]);
    }
    
    private function generateDummyGrades($student_id)
    {
        $dummyGrades = [];
        $gwaValues = [1.00, 1.25, 1.50, 1.75, 2.00, 2.25, 2.50, 2.75, 3.00, 5.00];
    
        $classTitles = [
            'Mathematics', 'Physics', 'Biology', 'Chemistry', 'English Literature', 'History',
            'Computer Science', 'Psychology', 'Architecture', 'Communication Studies', 'Journalism',
            'Law', 'Criminal Justice', 'Public Administration', 'Social Work', 'Religious Studies',
            'Physical Education', 'Nutrition', 'Hospitality Management', 'Culinary Arts', 'Astronomy',
            'Geology', 'Meteorology', 'Oceanography', 'Environmental Science', 'Political Science',
            'Economics', 'Sociology', 'Anthropology', 'Philosophy', 'Theology', 'Music', 'Dance',
            'Theater', 'Film', 'Visual Arts', 'Graphic Design', 'Industrial Design', 'Fashion Design',
        ];
    
        $subjects = [];
        foreach ($classTitles as $index => $title) {
            $code = strtoupper(substr(preg_replace('/[^A-Za-z]/', '', $title), 0, 4)) . str_pad($index + 1, 3, '0', STR_PAD_LEFT);
            $subjects[$title] = $code;
        }
    
        srand(42);
    
        // Ensure the number of subjects is within the range of 2020-2024
        $years = [];
        for ($year = 2020; $year <= 2024; $year++) {
            for ($i = 0; $i < count($subjects) / 5; $i++) {  // Assume roughly equal distribution
                $years[] = $year;
            }
        }
        shuffle($years);
    
        foreach ($subjects as $title => $code) {
            $year = array_pop($years);
            $semester = rand(1, 2);
            $grade = $gwaValues[array_search($title, array_keys($subjects)) % count($gwaValues)];
            $completion_grade = $gwaValues[(array_search($title, array_keys($subjects)) + 1) % count($gwaValues)];
            $remarks = $completion_grade <= 3.00 ? 'Passed' : 'Failed';
            
            $dummyGrades[] = [
                'student_id' => $student_id,
                'subject' => $title,
                'subject_code' => $code,
                'grade' => $grade,
                'completion_grade' => $completion_grade,
                'remarks' => $remarks,
                'year' => $year,
                'semester' => $semester,
                'created_at' => now()->subYears(2024 - $year),
            ];
        }
    
        srand();
    
        return $dummyGrades;
    }
    
    
    
    
    
    public function post(Request $request){
        $btns = [
            'information' => true,
            'grades' => false,
            'process' => false,
            'classroom' => false,
            'services' => false,
        ];
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password, 'account_type' => ['Student', 'Chairperson']])) {
            $userId = Auth::id(); // Get the authenticated user's ID
            $user = Auth::user();
            
            if ($user->account_type === 'Student') {
                $student_no = Student::where('user_id', $userId)->first()->student_no;
                return redirect(route('student-view.get', $student_no))->with(['id' => "EMAIL FAILED"]);
            } else {
                return view('Chairperson.cp-dashboard', compact('btns'));
            }
        }
        return view('sign-in', ['error' => "invalid", 'btns' => $btns]);

    }

    public function resetpassword(Request $request){
        $old_password = $request->old_password;
        $new_password = $request->new_password;
        $current_email = $request->current_email;
        $current_student_no = $request->current_student_no;
    
        if ($new_password != $old_password) {
            return view('reset-password');
        }
    
    }


    public function getresetpassword(Request $request){
        return view('reset-password');
    }
    
}