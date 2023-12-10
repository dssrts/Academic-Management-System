<?php

namespace App\Filament\Resources\GradStudentResource\Pages;

use App\Filament\Resources\GradStudentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGradStudents extends ListRecords
{
    protected static string $resource = GradStudentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
