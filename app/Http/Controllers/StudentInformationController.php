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


class StudentInformationController extends Controller
{
    public function get(Request $request){
        $userId = Auth::id(); // Get the authenticated user's ID
        $user = Auth::user();
        $student = Student::where('student_no', $userId)->first();
        $studentTerms = DB::table('student_terms')->where('student_no', $student->student_no)->first();
        $program = DB::table('programs')->where('id', $studentTerms->program_id)->first();
        $college = DB::table('colleges')->where('id', $program->college_id)->first();
    
        // Fetch all grades for the student
        $grades = DB::table('grades')->where('student_no', $student->student_no)->pluck('grade');
    
        // Calculate the General Weighted Average (GWA)
        $totalGrades = $grades->sum();
        $numGrades = $grades->count();
        $gwa = $numGrades ? round($totalGrades / $numGrades, 3) : 0;
        return view('Student.student-information', [
            'student' => $student,
            'studentTerms' => $studentTerms,
            'program' => $program,
            'college' => $college,
            'grades' => $grades,
            'gwa' => $gwa
        ]);
    }
}
