<?php

namespace App\Filament\Widgets;

use App\Models\Student;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{

    public function getStudents(): Student{
        return Student::where("department_id", auth()->user()->department_id);
    }
    protected function getStats(): array
    {
        if (auth()->user()->is_admin()){
            return [
                Stat::make('Total Students', Student::count())
            ];

            }
        return [
            
            Stat::make('Number of Students in your Department', Student::where("department_id", auth()->user()->department_id)->count()),
            Stat::make('Regular Students', Student::where([
                ["student_type", "Regular"],
                ["department_id", auth()->user()->department_id]
            ])->count())
            ->description("This is is the number of regular students in your department")
            ->color('success'),
            Stat::make('Irregular Students', Student::where([
                ["student_type", "Irregular"],
                ["department_id", auth()->user()->department_id]
            ])->count())
            ->description("This is is the number of irregular students in your department")
            ->color('warning'),
            Stat::make('Number of Enrolled students in your department',Student::where([
                ["registration_status", "Enrolled"],
                ["department_id", auth()->user()->department_id]
            ])->count()), 
            Stat::make('Number of students not yet enrolled in your department',Student::where([
                ["registration_status", "Not Enrolled"],
                ["department_id", auth()->user()->department_id]
            ])->count())
            //Stat::make('Average time on page', '3:12'),
            //Stat::make('Total Products', $this->getPageTableQuery()->count()),
        ];
    }
}
