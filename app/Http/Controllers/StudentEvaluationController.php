<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentEvaluationController extends Controller
{
    public function get(Request $request)
    {
        $userId = Auth::id(); // Get the authenticated user's ID
        $user = Auth::user();
        
        // Fetch the SFE records for the student
        $sfeRecords = DB::table('course_sfe_students')
            ->where('student_no', $userId)
            ->get();

        // Prepare data for each SFE record
        $sfeData = $sfeRecords->map(function ($sfe) {
            // Get course details
            $course = DB::table('courses')
                ->where('id', $sfe->course_id)
                ->first();
                
            // Get the class entry for the course
            $class = DB::table('classes')
                ->where('course_id', $sfe->course_id)
                ->first();
                
            // Get the instructor for the class
            $instructor = DB::table('class_faculty')
                ->where('class_id', $class->id)
                ->join('instructors', 'class_faculty.instructor_id', '=', 'instructors.id')
                ->select('instructors.first_name', 'instructors.last_name')
                ->first();
                
            // Prepare the status
            $status = $sfe->status == 1 ? 'Completed' : 'Incomplete';
            $statusClass = $sfe->status == 1 ? 'text-green-500' : 'text-red-500';

            // Prepare the data to pass to the view
            return [
                'professor' => $instructor ? $instructor->first_name . ' ' . $instructor->last_name : 'N/A',
                'course_subject' => $course ? $course->subject_title : 'N/A',
                'course_id' => $course ? $course->subject_code : 'N/A',
                'status' => $status,
                'status_class' => $statusClass,
            ];
        });

        return view('Student.student-evaluation', [
            'sfeData' => $sfeData
        ]);    
    }
}
