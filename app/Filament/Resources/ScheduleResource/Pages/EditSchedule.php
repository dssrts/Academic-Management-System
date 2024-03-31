<?php

namespace App\Filament\Resources\ScheduleResource\Pages;

use App\Filament\Resources\ScheduleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSchedule extends EditRecord
{
    protected static string $resource = ScheduleResource::class;

    // protected function getHeaderActions(): array
    // {
    //     if(auth()->user()->hasRole('admin'))
    //         {
    //             return [Actions\DeleteAction::make()];
    //         }
        
    // }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        if (($data['status'])) {
            $data['status'] = 'Taken';
        }
        return $data;
    }
}
