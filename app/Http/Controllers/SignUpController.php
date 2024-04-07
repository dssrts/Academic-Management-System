<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\College;
use App\Models\Department;
use App\Models\Grade; // Import the Grade model

class SignUpController extends Controller
{
    public function get(Request $request){
        Auth::logout(); // Logs the user out
        $request->session()->invalidate(); // Invalidates the session
        $request->session()->regenerateToken(); // Regenerate the CSRF token
        return view('sign-in');
    }

    // public function studentemail(Request $request, $student_no)
    // {
    //     // Create me a function that emails then
    // }

    public function studentview(Request $request, $student_no)
    {
        $student = Student::where('student_no', $student_no)->first();

        $btns = [
            'information' => false,
            'grades' => false,
            'process' => false,
            'classroom' => false,
            'services' => false,
        ];

        if ($request->has('buttons')) {
            // If 'buttons' parameter exists in the request
            $requestedButton = $request->input('buttons');
            if (array_key_exists($requestedButton, $btns)) {
                // If the requested button exists in the $btns array
                $btns[$requestedButton] = true;
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
        ]);
    }
        
    
    public function post(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password, 'account_type' => "Student"])) {
            $userId = Auth::id(); // Get the authenticated user's ID
            $student_no = Student::where('user_id', $userId)->first()->student_no;
            return redirect(route('student-view.get', $student_no))->with("success", "Credentials are valid");
        }

        return redirect(route('sign-in.get'))->with("error", "Login Credentials are not Valid");
    }
}
