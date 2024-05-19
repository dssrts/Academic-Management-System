<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\DashboardResource\Widgets\ProductsChart;
use App\Models\Appeal;
use App\Models\College;
use App\Models\Faculty;
use App\Models\Student;
use App\Models\Subject;
use App\Models\User;
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
                ->chart([1,2,2,3,3,2,4,4,3,3,4,3,4,4,3,3,3,4,3,2,1])
                ->descriptionIcon("heroicon-m-arrow-trending-up")
                ->description("This is is the number of regular students in your department")
                ->color('success'),
                Stat::make('Total College', College::count())
                ->chart([1,2,2,3,4,3,4,4,3,3,4,3,2,2,1,2,1])
                ->color('primary') 
                ->descriptionIcon("heroicon-m-arrow-trending-up"),
                Stat::make('Total Department', College::count())
                ->chart([5,4,3,3,4,2,3,3,4,4,4,2,3,3,2,2,1])
                ->color('primary') 
                ->descriptionIcon("heroicon-m-arrow-trending-up"),
                Stat::make('Total Faculties', Faculty::count())
                ->chart([1,4,4,3,3,4,3,2,3,4,3,2,1])
                ->descriptionIcon("heroicon-m-arrow-trending-up")
                ->description("This is is the number of regular students in your department")
                ->color('success'),
                Stat::make('Total Subject', Subject::count())
                ->chart([1,2,2,3,3,4,3,3,3,2,3,2,1,2,3])
                ->descriptionIcon("heroicon-m-arrow-trending-up")
                ->description("This is is the number of regular students in your department")
                ->color('success'),
                Stat::make('Total Requests', Appeal::count())
                ->chart([3,3,4,3,2,2,1,2,1,2])
                ->color('primary') 
                ->descriptionIcon("heroicon-m-arrow-trending-up"),
            ];

            }
        return [
            
            Stat::make('Number of Students in your Department', Student::where("department_id", auth()->user()->department_id)->count())
            ->chart([1,2,2,3,4,3,4,4,3,3,4,3,2,2,1,2,1])
            ->color('primary') 
            ->descriptionIcon("heroicon-m-arrow-trending-up")
            ,
            Stat::make('Regular Students', Student::where([
                ["student_type", "Regular"],
                ["department_id", auth()->user()->department_id]
            ])->count())
            ->chart([1,2,2,3,3,2,4,4,3,3,4,3,4,4,3,3,3,4,3,2,1])
            ->descriptionIcon("heroicon-m-arrow-trending-up")
            ->description("This is is the number of regular students in your department")
            ->color('success'),
            Stat::make('Irregular Students', Student::where([
                ["student_type", "Irregular"],
                ["department_id", auth()->user()->department_id]
            ])->count())
            ->chart([1,1,2,4,3,4,2,3,2,4,3,1])
            ->description("This is is the number of irregular students in your department")
            ->descriptionIcon("heroicon-m-arrow-trending-up")
            ->color('warning'),
            Stat::make('Number of Enrolled students in your department',Student::where([
                ["registration_status", "Enrolled"],
                ["department_id", auth()->user()->department_id]
            ])->count())
            ->color('primary') 
            ->chart([4,3,4,3,3,4,2,4,3,3,3,3,4,3,2,1])
            ->descriptionIcon("heroicon-m-arrow-trending-up")
            , 
            
            Stat::make('Number of students not yet enrolled in your department',Student::where([
                ["registration_status", "Not Enrolled"],
                ["department_id", auth()->user()->department_id]
            ])->count())
            ->color('primary') 
            ->chart([4,3,4,3,3,4,2,4,3,2,1])
            ->descriptionIcon("heroicon-m-arrow-trending-up")
        ];
    }

}
