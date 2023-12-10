<?php

namespace App\Filament\Resources\GradStudentResource\Pages;

use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\GradStudentResource;

class FilterBlocks extends ListRecords
{
    protected static string $resource = GradStudentResource::class;
    public function getTabs(): array
    {
        return [
            'all' => Tab::make(),
            'Block 1' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('block', '1')),
            'Block 2' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('block', '2')),
            'Block 3' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('block', '3')),
        ];
    }
}
