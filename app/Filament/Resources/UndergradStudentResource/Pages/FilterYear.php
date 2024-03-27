<?php

namespace App\Filament\Resources\UndergradStudentResource\Pages;

use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\UndergradStudentResource;

class FilterYear extends ListRecords
{
    protected static string $resource = UndergradStudentResource::class;
    public function getTabs(): array
    {
        
        return [
            'all' => Tab::make(),
            '1' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('year', '1')),
            '2' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('year', '2')),
            '3' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('year', '3')),
            '4' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('year', '4')),
                
        ];
        
    }
    
}
