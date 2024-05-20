<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Appeal;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class BarChart extends ChartWidget
{
    protected static ?string $heading = 'Appeals Over Time';
    protected static?int $sort = 1;

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getData(): array
    {
        // Determine if the user is an admin
        $user = Auth::user();
        $query = Appeal::selectRaw('DATE(created_at) as date, COUNT(*) as count');

        if ($user->hasRole('admin')) {
            // Admins get all appeals
            $appeals = $query
                ->groupBy('date')
                ->orderBy('date')
                ->get();
        } else {
            // Non-admins get only their appeals
            $appeals = $query
                ->where('user_id', $user->id)
                ->groupBy('date')
                ->orderBy('date')
                ->get();
        }

        $labels = $appeals->pluck('date')->map(function ($date) {
            return Carbon::parse($date)->format('Y-m-d');
        })->toArray();

        $data = $appeals->pluck('count')->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Number of Appeals',
                    'data' => $data,
                    'backgroundColor' => 'rgba(244, 146, 0, 0.5)',
                    'borderColor' => 'rgba(244, 146, 0, 1)',
                    'borderWidth' => 1,
                ],
            ],
            'labels' => $labels,
        ];
    }
}
