<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentSchedulesController extends Controller
{
    public function get(Request $request)
    {
        $userId = Auth::id(); // Get the authenticated user's ID

        // Determine the current semester based on the current month
        $currentMonth = date('m');
        if ($currentMonth >= 1 && $currentMonth <= 6) {
            $semester = 1;
        } else {
            $semester = 2;
        }
        $academicYear = 2024; // Set the academic year to 2024

        // Fetch the class IDs from the students_classes table
        $classIds = DB::table('student_classes')->where('student_no', $userId)->pluck('class_id');

        // Fetch the course details, professor names, class times, and building details from the related tables
        $schedules = DB::table('classes')
            ->join('courses', 'classes.course_id', '=', 'courses.id')
            ->leftJoin('class_faculty', 'classes.id', '=', 'class_faculty.class_id')
            ->leftJoin('instructors', 'class_faculty.instructor_id', '=', 'instructors.id')
            ->leftJoin('class_schedules', 'classes.id', '=', 'class_schedules.class_id')
            ->leftJoin('rooms', 'class_schedules.room_id', '=', 'rooms.id')
            ->leftJoin('buildings', 'rooms.building_id', '=', 'buildings.id')
            ->leftJoin('aysems', 'classes.aysem_id', '=', 'aysems.id')
            ->whereIn('classes.id', $classIds)
            ->where('aysems.semester', $semester)
            ->where('aysems.academic_year', $academicYear)
            ->select('courses.subject_title', 'courses.subject_code', 
                     DB::raw("CONCAT(instructors.first_name, ' ', instructors.last_name) as professor_name"),
                     DB::raw("DATE_FORMAT(class_schedules.start_time, '%h:%i %p') as start_time"), 
                     DB::raw("DATE_FORMAT(class_schedules.end_time, '%h:%i %p') as end_time"),
                     DB::raw("CONCAT(buildings.building_code, ' ', rooms.room_number) as building"))
            ->get();

        // Format the schedules with concatenated start_time and end_time
        $schedules = $schedules->map(function($schedule) {
            $schedule->time = $schedule->start_time . ' - ' . $schedule->end_time;
            return $schedule;
        });

        // Remove duplicate course subjects
        $uniqueSchedules = $schedules->unique('subject_title');

        return view('Student.student-schedules', [
            'schedules' => $uniqueSchedules->values()
        ]);
    }
}
