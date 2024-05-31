<?php

namespace App\Http\Controllers;

use App\Models\Appeal;
use App\Models\ClassModel;
use App\Models\College;
use App\Models\Professor;
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
            'professors' => true,
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
            'professors' => true,
        ];
        $user = Auth::user();
        return view('Chairperson.cp-view-students', compact('students', 'btns', 'user'));
    }
    public function viewStudent(Student $student)
    {
        $user = Auth::user();
        $studentRecords = StudentRecord::where('student_id', $student->id)->get();
        $classes = ClassModel::whereHas('studentRecord', function ($query) use ($student) {
            $query->where('student_id', $student->id);
        })->with('professor')->get();
        return view('Chairperson.cp-view-student-info', compact('student', 'studentRecords', 'classes', 'user'));
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
            'professors' => true,
        ];
        $user = Auth::user();
        return view('Chairperson.cp-view-appeals', compact('appeals', 'btns', 'user'));
    }
    public function viewProfessors(Request $request)
{
    $query = Professor::query();

    if ($request->filled('search')) {
        $search = $request->input('search');
        $query->where('last_name', 'like', '%' . $search . '%')
            ->orWhere('first_name', 'like', '%' . $search . '%')
            ->orWhere('middle_name', 'like', '%' . $search . '%')
            ->orWhere('plm_email', 'like', '%' . $search . '%');
    }

    $professors = $query->paginate(15);
    $colleges = College::all();

    $btns = [
        'dashboard' => false,
        'information' => false,
        'grades' => false,
        'process' => false,
        'inbox' => false,
        'classroom' => false,
        'appeals' => false,
        'professors' => true,
        'classes' => false,
    ];
    $user = Auth::user();
    return view('Chairperson.cp-view-professors', compact('professors', 'colleges', 'btns', 'user'));
}
    public function viewClasses(Request $request)
{
    $query = ClassModel::with('professor');

    if ($request->filled('search')) {
        $search = $request->input('search');
        $query->where('code', 'like', '%' . $search . '%')
            ->orWhere('name', 'like', '%' . $search . '%')
            ->orWhere('description', 'like', '%' . $search . '%');
    }

    $classes = $query->paginate(15);
    $professors = Professor::all();

    $btns = [
        'dashboard' => false,
        'information' => false,
        'grades' => false,
        'process' => false,
        'inbox' => false,
        'classroom' => false,
        'appeals' => false,
        'professors' => false,
        'classes' => true,
    ];
    $user = Auth::user();
    return view('Chairperson.cp-view-classes', compact('classes', 'professors', 'btns', 'user'));
}

    public function updateClassProfessor(Request $request, ClassModel $class)
{
    $class->professor_id = $request->professor_id;
    $class->save();

    return redirect()->route('view-classes')->with('success', 'Professor updated successfully.');
}
public function createProfessor(Request $request)
{
    $request->validate([
        'college_id' => 'required|exists:colleges,id',
        'last_name' => 'required|string|max:45',
        'first_name' => 'required|string|max:45',
        'middle_name' => 'nullable|string|max:45',
        'pronouns' => 'nullable|string|max:45',
        'plm_email' => 'required|string|email|max:255|unique:professors,plm_email',
    ]);

    Professor::create($request->all());

    return redirect()->route('view-professors')->with('success', 'Professor added successfully.');
}
}


