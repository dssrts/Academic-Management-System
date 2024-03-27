<?php

namespace App\Filament\Resources\ScheduleResource\Pages;

use Filament\Actions;

use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ScheduleResource;

class ListSchedules extends ListRecords
{
    protected static string $resource = ScheduleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];

        
    }
    public function getTabs(): array
    {
        return [
            'all' => Tab::make("All"),
            'Taken' => Tab::make("Taken")->modifyQueryUsing(function (Builder $query) {
                $query->where('status','Taken');
            }),
            'Not Taken' => Tab::make("Available")->modifyQueryUsing(function (Builder $query) {
                $query->where('status','Available');
            }),

        ];
    }
}
