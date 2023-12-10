<?php

namespace App\Filament\Resources\UndergradStudentResource\Pages;

use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\UndergradStudentResource;

class ListUndergradStudents extends ListRecords
{
    protected static string $resource = UndergradStudentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
        
    }
    public function getTabs(): array
{
    return [
        'all' => Tab::make(),
        'Regular' => Tab::make()
            ->modifyQueryUsing(fn (Builder $query) => $query->where('reg_status', 'Regular')),
        'Irregular' => Tab::make()
            ->modifyQueryUsing(fn (Builder $query) => $query->where('reg_status', 'Irregular')),
    ];
}
}
