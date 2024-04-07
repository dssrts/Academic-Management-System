<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\College;
use App\Models\Department;
use Illuminate\Contracts\Session\Session;

class SignUpController extends Controller
{
    public function get(Request $request){
        Auth::logout(); // Logs the user out
        $request->session()->invalidate(); // Invalidates the session
        $request->session()->regenerateToken(); // Regenerate the CSRF token
        return view('sign-in',['error' => "valid"]);
    }

    public function studentview(Request $request,$student_no){
        $student = Student::where('student_no',$student_no)->first();

        $college_id = $student->college_id;
        $department_id = $student->department_id;

        $college = College::where('id',$college_id)->first();
        $department = Department::where('id',$department_id)->first();


        return view('student-view',['students' => $student,'department' => $department,'college' => $college]);
    }

    public function post(Request $request){
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
        return view('sign-in',['error' => "invalid"]);

    }
}