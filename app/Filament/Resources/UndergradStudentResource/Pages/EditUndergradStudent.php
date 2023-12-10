<?php

namespace App\Filament\Resources\UndergradStudentResource\Pages;

use App\Filament\Resources\UndergradStudentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUndergradStudent extends EditRecord
{
    protected ?string $heading = 'Edit Student';
    protected static string $resource = UndergradStudentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
