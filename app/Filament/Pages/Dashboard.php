<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use App\Filament\Widgets\SalesChart;
use App\Filament\Widgets\PieChart;
use App\Filament\Widgets\StatsOverview;

class Dashboard extends BaseDashboard
{
    public function getColumns(): array
    {
        return [
            'sm' => 1, // 1 column on small screens
            'md' => 2, // 2 columns on medium screens
            'lg' => 2, // 2 columns on large screens
            'xl' => 2, // 2 columns on extra-large screens
        ];
    }

    public function getWidgets(): array
    {
        return [
            SalesChart::class => [
                'columnSpan' => 1, // Each widget spans 1 column
            ],
            PieChart::class => [
                'columnSpan' => 1, // Each widget spans 1 column
            ],
            StatsOverview::class => [
                'columnSpan' => 2, // This widget spans 2 columns (for full width)
            ],
        ];
    }
}
