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
            // Handle case where student is not found
            return redirect()->back()->with('error', 'Student not found');
        }
    
        $student_id = $student->id;
        $appeals = Appeal::where('student_id', $student_id)
            ->orderBy('created_at', 'desc')
            ->get();
        $buttons = session()->get('buttons');
        $panel = $request->panel;
        $send  =  session()->get('status');
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
    
        if ($buttons) {
            if (array_key_exists($buttons, $btns)) {
                $btns[$buttons] = true;
            }
        } else {
            if ($panel == "grades") {
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
    
        return view('student-view', [
            'students' => $student,
            'department' => $department,
            'college' => $college,
            'grades' => $grades,
            'defaultYear' => $defaultYear ?? null,
            'buttons' => "information",
            'btns' => $btns,
            'appeals' => $appeals,
            'send' => $send
        ]);
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
                return view('Chairperson.cp-dashboard');
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