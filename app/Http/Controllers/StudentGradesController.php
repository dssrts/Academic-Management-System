<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StudentGradesController extends Controller
{
    public function get(Request $request)
    {
        $userId = Auth::id(); // Get the authenticated user's ID

        // Get the 'aysem' value from the request or default to the current year and semester 1
        $aysem = $request->input('aysem', Carbon::now()->year . '1');

        // Parse the aysem input to get the year and semester
        $academicYear = substr($aysem, 0, 4);
        $semester = substr($aysem, 4, 1);

        // Fetch grades data based on the aysem filter
        $gradesData = DB::table('grades')
            ->join('classes', 'grades.class_id', '=', 'classes.id')
            ->join('aysems', 'classes.aysem_id', '=', 'aysems.id')
            ->where('grades.student_no', $userId)
            ->where(function ($query) use ($academicYear, $semester) {
                $query->where('aysems.academic_year', '>', $academicYear)
                    ->orWhere(function ($query) use ($academicYear, $semester) {
                        $query->where('aysems.academic_year', '=', $academicYear)
                            ->where('aysems.semester', '>=', $semester);
                    });
            })
            ->select(
                'aysems.academic_year', 
                'aysems.semester', 
                DB::raw('AVG(grades.grade) as gwa')
            )
            ->groupBy('aysems.academic_year', 'aysems.semester')
            ->orderBy('aysems.academic_year')
            ->orderBy('aysems.semester')
            ->get();

        // Format the labels
        $labels = $gradesData->map(function ($item) {
            return $item->academic_year . ' (' . $item->semester . ')';
        });

        // Format the GWA to 3 decimal places
        $gwaData = $gradesData->map(function ($item) {
            return round($item->gwa, 3);
        });

        // Calculate overall average GWA and format to 3 decimal places
        $overallAverageGwa = round($gradesData->avg('gwa'), 3);

        return view('Student.student-grades', [
            'gradesData' => $gwaData,
            'labels' => $labels,
            'selectedAysem' => $aysem,
            'overallAverageGwa' => $overallAverageGwa
        ]);
    }
}