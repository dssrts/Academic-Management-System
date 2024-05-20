<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class DoughnutChart extends ChartWidget
{
    protected static ?string $heading = 'Regular vs Irregular Students';
    protected static ?int $sort = 4;

    protected function getType(): string
    {
        return 'doughnut';
    }

    protected function getData(): array
    {
        $user = Auth::user();
        if ($user->hasRole('admin')) {
            $regularCount = Student::where('student_type', 'regular')->count();
            $irregularCount = Student::where('student_type', 'irregular')->count();
        } else {
            // Admins count regular vs irregular students in their department
            $regularCount = Student::where('student_type', 'regular')
                ->where('department_id', $user->department_id)
                ->count();
            $irregularCount = Student::where('student_type', 'irregular')
                ->where('department_id', $user->department_id)
                ->count();            
        }

        return [
            'datasets' => [
                [
                    'data' => [$regularCount, $irregularCount],
                    'backgroundColor' => [
                        'rgba(46, 52, 154, 0.5)',   // Custom color for regular students
                        'rgba(244, 146, 0, 0.5)'    // Custom color for irregular students
                    ],
                    'borderColor' => [
                        'rgba(46, 52, 154, 0.5)',   // Custom border color for regular students
                        'rgba(244, 146, 0, 0.5)'    // Custom border color for irregular students
                    ],
                    'borderWidth' => 1,
                ],
            ],
            'labels' => ['Regular', 'Irregular'],
        ];
    }
}
