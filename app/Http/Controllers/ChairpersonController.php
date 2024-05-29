<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class ChairpersonController extends Controller
{
    public function dashboard(Request $request)
    {
        $btns = [
            'dashboard' => true,
            'information' => false,
            'grades' => false,
            'process' => false,
            'inbox' => false,
            'classroom' => false,
        ];
        
        return view('Chairperson.cp-dashboard', compact('btns'));
    }

    public function viewStudents(Request $request)
    {
        $students = Student::all();
        
        $btns = [
            'dashboard' => false,
            'information' => true,
            'grades' => false,
            'process' => false,
            'inbox' => false,
            'classroom' => false,
        ];
        
        return view('Chairperson.cp-view-students', compact('students', 'btns'));
    }
}
