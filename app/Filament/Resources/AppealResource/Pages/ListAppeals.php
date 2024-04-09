<?php

namespace App\Filament\Resources\AppealResource\Pages;

use App\Filament\Resources\AppealResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;
class ListAppeals extends ListRecords
{
    protected static string $resource = AppealResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return[
            'All' => Tab::make(),
            'Unread' => Tab::make()->modifyQueryUsing(function(Builder $query){
                $query->where('viewed','unread');
            }),
            'Read' => Tab::make()->modifyQueryUsing(function(Builder $query){
                $query->where('viewed','read');
            }),
        ];
    }
}
