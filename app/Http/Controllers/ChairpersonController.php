<?php

namespace App\Http\Controllers;

use App\Models\Appeal;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\StudentRecord;
use Illuminate\Support\Facades\Auth;

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
        ];
        $user = Auth::user();
        return view('Chairperson.cp-dashboard', compact('btns', 'user'));
    }

    public function viewStudents(Request $request)
    {
        // Fetch students with pagination (20 per page)
        $query = Student::query();

        if ($request->filled('student_no')) {
            $query->where('student_no', 'like', '%' . $request->input('student_no') . '%');
        }

        // Fetch students with pagination (20 per page)
        $students = $query->paginate(15);
        
        $btns = [
            'dashboard' => false,
            'information' => true,
            'grades' => false,
            'process' => false,
            'inbox' => false,
            'classroom' => false,
        ];
        $user = Auth::user();
        return view('Chairperson.cp-view-students', compact('students', 'btns', 'user'));
    }
    public function viewStudent(Student $student)
    {
        $user = Auth::user();
        $studentRecords = StudentRecord::where('student_id', $student->id)->get();
        return view('Chairperson.cp-view-student-info', compact('student', 'studentRecords', 'user'));
    }
    public function viewAppeals(Request $request)
    {
        // Fetch appeals with pagination (20 per page)
        $appeals = Appeal::paginate(20);
        
        $btns = [
            'dashboard' => false,
            'information' => false,
            'grades' => false,
            'process' => false,
            'inbox' => false,
            'classroom' => false,
            'appeals' => true,
        ];
        $user = Auth::user();
        return view('Chairperson.cp-view-appeals', compact('appeals', 'btns', 'user'));
    }

}
