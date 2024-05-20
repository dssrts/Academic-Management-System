<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class PieChart extends ChartWidget
{
    protected static ?string $heading = 'Enrolled vs Unenrolled Students';
    protected static ?int $sort = 4;

    protected function getType(): string
    {
        return 'pie';
    }

    protected function getData(): array
    {
        $user = Auth::user();

        if ($user->hasRole('admin')) {
            // Non-admins count all enrolled vs unenrolled students
            $enrolledCount = Student::where('registration_status', 'Enrolled')->count();
            $unenrolledCount = Student::where('registration_status', 'Unenrolled')->count();
        } else {
            $enrolledCount = Student::where('registration_status', 'Enrolled')
            ->where('department_id', $user->department_id)
            ->count();
            $unenrolledCount = Student::where('registration_status', 'Unenrolled')
            ->where('department_id', $user->department_id)
            ->count();
        }

        return [
            'datasets' => [
                [
                    'data' => [$enrolledCount, $unenrolledCount],
                    'backgroundColor' => [
                        'rgba(46, 52, 154, 0.5)',   // Custom color for enrolled students
                        'rgba(244, 146, 0, 0.5)'    // Custom color for unenrolled students
                    ],
                    'borderColor' => [
                        'rgba(46, 52, 154, 0.75)',   // Custom border color for enrolled students
                        'rgba(244, 146, 0, 0.75)'    // Custom border color for unenrolled students
                    ],
                    'borderWidth' => 1,
                ],
            ],
            'labels' => ['Enrolled', 'Unenrolled'],
        ];
    }
}
