<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class SalesChart extends ChartWidget
{
    protected static?int $sort = 1;
    protected static ?string $heading = 'Number of Students in Department';

    protected function getType(): string
    {
        return 'line';
    }

    protected function getData(): array
    {
        $registrations = $this->getStudentRegistrations();
        $labels = $this->getLabels($registrations);
        $data = $this->getRegistrationCounts($registrations, $labels);

        return [
            'datasets' => [
                [
                    'label' => 'Registrations',
                    'data' => $data,
                    'borderColor' => 'rgba(46, 52, 154, 0.6)',
                    'backgroundColor' => 'rgba(46, 52, 154, 0.5)',
                    'fill' => false,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getStudentRegistrations()
    {
        $user = Auth::user();
        $query = DB::table('students')
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'));

        if ($user->hasRole('admin')) {
            // Admins get all student registrations
            $registrations = $query
                ->groupBy('date')
                ->orderBy('date')
                ->get();
        } else {
            // Non-admins get student registrations for their department
            $registrations = $query
                ->where('department_id', $user->department_id)
                ->groupBy('date')
                ->orderBy('date')
                ->get();
        }

        return $registrations;
    }

    protected function getLabels($registrations): array
    {
        return $registrations->pluck('date')->map(function ($date) {
            return Carbon::parse($date)->format('F d, Y');
        })->toArray();
    }

    protected function getRegistrationCounts($registrations, $labels): array
    {
        $counts = array_fill(0, count($labels), 0);
        foreach ($registrations as $index => $registration) {
            $counts[$index] = $registration->count;
        }
        return $counts;
    }
}
