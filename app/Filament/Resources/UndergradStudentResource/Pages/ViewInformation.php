<?php

namespace App\Filament\Resources\UndergradStudentResource\Pages;

use App\Filament\Resources\UndergradStudentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ViewInformation extends ListRecords
{
    protected static string $resource = UndergradStudentResource::class;
    protected static string $view = 'filament.resources.undergrad-student-resource.pages.view-information';
}
