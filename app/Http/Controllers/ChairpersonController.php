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
        $userId = Auth::id();
    
        // Validate the request inputs
        $request->validate([
            'start_date' => 'nullable|date_format:Y-m-d',
            'remarks' => 'nullable|in:remarked,not_done',
        ]);
    
        // Apply filters if present
        $appealsQuery = Appeal::where('user_id', $userId);
    
        if ($request->has('start_date') && $request->start_date) {
            // Convert start_date to a Carbon instance for better compatibility
            $startDate = \Carbon\Carbon::createFromFormat('Y-m-d', $request->start_date)->startOfDay();
            $appealsQuery->where('created_at', '>=', $startDate);
        }
    
        if ($request->has('remarks') && $request->remarks) {
            if ($request->remarks == 'remarked') {
                $appealsQuery->whereNotNull('remarks');
            } elseif ($request->remarks == 'not_done') {
                $appealsQuery->whereNull('remarks');
            }
        }
    
        $appeals = $appealsQuery->with(['student' => function($query) {
            $query->select('id', 'plm_email');
        }])->paginate(20);
    
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

    public function saveRemarks(Request $request)
{
    $request->validate([
        'appeal_id' => 'required|exists:appeals,id',
        'remarks' => 'nullable|string'
    ]);

    $appeal = Appeal::find($request->appeal_id);
    $appeal->remarks = $request->remarks;
    $appeal->save();

    return response()->json(['success' => true]);
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
public function createClass(Request $request)
{
    $request->validate([
        'code' => 'required|string|max:45',
        'section' => 'required|integer',
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'units' => 'required|integer',
        'day' => 'required|string|max:45',
        'start_time' => 'required',
        'end_time' => 'required',
        'building' => 'required|string|max:45',
        'room' => 'required|string|max:45',
        'type' => 'required|string|max:56',
        'professor_id' => 'nullable|exists:professors,id',
    ]);

    ClassModel::create([
        'code' => $request->code,
        'section' => $request->section,
        'name' => $request->name,
        'description' => $request->description,
        'units' => $request->units,
        'day' => $request->day,
        'start_time' => $request->start_time,
        'end_time' => $request->end_time,
        'building' => $request->building,
        'room' => $request->room,
        'type' => $request->type,
        'professor_id' => $request->professor_id,
    ]);

    return redirect()->route('view-classes')->with('success', 'Class added successfully!');
}
public function editClass(ClassModel $class)
{
    $user = Auth::user();
    $professors = Professor::where('college_id', $user->college_id)->get();
    return view('Chairperson.cp-edit-class', compact('class', 'professors', 'user'));
}

public function updateClass(Request $request, ClassModel $class)
{
    $request->validate([
        'code' => 'required|string|max:45',
        'section' => 'required|integer',
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'units' => 'required|integer',
        'day' => 'required|string|max:45',
        'start_time' => 'required',
        'end_time' => 'required',
        'building' => 'required|string|max:45',
        'room' => 'required|string|max:45',
        'type' => 'required|string|max:56',
        'professor_id' => 'nullable|exists:professors,id',
    ]);

    $class->update([
        'code' => $request->code,
        'section' => $request->section,
        'name' => $request->name,
        'description' => $request->description,
        'units' => $request->units,
        'day' => $request->day,
        'start_time' => $request->start_time,
        'end_time' => $request->end_time,
        'building' => $request->building,
        'room' => $request->room,
        'type' => $request->type,
        'professor_id' => $request->professor_id,
    ]);

    return redirect()->route('view-classes')->with('success', 'Class updated successfully!');
}
}



