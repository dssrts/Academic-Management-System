<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class ChairpersonController extends Controller
{
    public function dashboard()
    {
        return view('Chairperson.cp-dashboard');
    }

    public function viewStudents()
    {
        // Fetch all students from the database
        $students = Student::all();

        // Pass the students to the view
        return view('Chairperson.cp-view-students', compact('students'));
    }
}