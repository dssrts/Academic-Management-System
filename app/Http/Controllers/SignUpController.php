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
        $studentNumber = $request->studentnumber; // assuming 'name' is the input name for Student Number
        $recipientEmail = $request->recipientemail;
        $studentId = Student::where('student_no', $studentNumber)->first()->id;
        $chairpersonId = User::where('email',$recipientEmail)->first()->id;
        // $studentId = DB::table('students')->where("student_no",$studentNumber)->value('id');
        // $chairpersonId = DB::table('users')->where("email",$recipientEmail)->value('id');
        $subject = $request->subject;
        $message = $request->message;

        DB::table('appeals')->insert([
            'student_id' => $studentId,
            'user_id' => $chairpersonId,
            'subject' => $subject,
            'message' => $message,
            'viewed' => "unread",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $student = Student::where('student_no', $student_no)->first();

        $btns = [
            'information' => false,
            'grades' => false,
            'process' => true,
            'classroom' => false,
            'services' => false,
        ];

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
        session()->flash('buttons', 'process');

        return redirect()->route('student-view.get',$student_no)->with('status', 'success');;
    }

    public function studentview(Request $request, $student_no)
    {
        
        $student = Student::where('student_no', $student_no)->first();
        $buttons = session()->get('buttons');
        $send  =  session()->get('status');
        session()->forget('buttons');

        $btns = [
            'information' => false,
            'grades' => false,
            'process' => false,
            'classroom' => false,
            'services' => false,
        ];

        if ( $buttons ) {
            if (array_key_exists( $buttons , $btns)) {
                // If the requested button exists in the $btns array
                $btns[$buttons ] = true;
            }
        } else {
            // If 'buttons' parameter is not present in the request
            $btns['information'] = true; // Set 'information' to true
        }

        if (!$student) {
            // Handle if student not found
            // For example, return an error message or redirect
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
            'grades' => $grades, // Pass grades to the view
            'defaultYear' => $defaultYear ?? null, // Pass the default year to the view if set
            'buttons' => "information",
            'btns' => $btns,
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

        if (Auth::attempt(['email' => $email, 'password' => $password, 'account_type' =>"Student"])) { 
            $userId = Auth::id(); // Get the authenticated user's ID  
            $student_no = Student::where('user_id',$userId)->first()->student_no;
            return redirect(route('student-view.get',$student_no))->with([ 'id' => "EMAIL FAILEd" ]);
        }
        return view('sign-in',['error' => "invalid",'btns' => $btns]);

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