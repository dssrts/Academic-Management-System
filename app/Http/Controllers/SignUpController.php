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
        $student_id = $student->id;
        $appeals = Appeal::where('student_id', $student_id)
        ->orderBy('created_at', 'desc') // Add this line to order by created_at descending
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

        if ( $buttons ) {
            if (array_key_exists( $buttons , $btns)) {
                $btns[$buttons] = true;
            }
        } else {
            if($panel == "grades"){
                $btns['grades'] = true;
            }
            else{
                $btns['dashboard'] = true; 
            }  
        }

        if (!$student) {

        }

        $college_id = $student->college_id;
        $department_id = $student->department_id;

        $college = College::where('id', $college_id)->first();
        $department = Department::where('id', $department_id)->first();

        $gradesQuery = Grade::where('student_id', $student->id);

        $defaultYear = '20241'; // Default year
        if ($request->has('year') && $request->year != 'all') {
            $defaultYear = $request->year;
            $gradesQuery->where(function ($query) use ($defaultYear) {
                $query->where('year', $defaultYear)
                    ->orWhere('year', 'LIKE', $defaultYear.'%');
            });
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