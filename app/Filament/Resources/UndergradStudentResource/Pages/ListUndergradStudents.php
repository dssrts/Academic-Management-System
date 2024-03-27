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
        'DL' => Tab::make()
            ->modifyQueryUsing(fn (Builder $query) => $query->where('gwa', '<=', 1.75)),
        'Below Retention' => Tab::make()
            ->modifyQueryUsing(fn (Builder $query) => $query->where('gwa', '>', 2.75)),
    ];
}
}
