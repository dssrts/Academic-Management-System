<?php

namespace App\Filament\Resources\WidgetsResource\Widgets;

use Filament\Widgets\ChartWidget;

class ProductsChart extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                'label' => "Blog Post Created",
                'data' => [1,2,3,4,5,6,7,8]
                ]
            ],
            'labels' => ['Jan','Feb','Mar','Apr']
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
