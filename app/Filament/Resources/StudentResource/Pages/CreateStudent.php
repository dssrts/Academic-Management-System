<?php

namespace App\Filament\Resources\StudentResource\Pages;

use Filament\Actions;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Form;
use App\Models\Department;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Collection;
use Filament\Forms\Components\DatePicker;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\StudentResource;
use App\Models\User;

class CreateStudent extends CreateRecord
{
    protected static string $resource = StudentResource::class;

    public function form(Form $form): Form
    {
        return $form
            
                // TextInput::make('name')
                // ->required(),
                // TextInput::make('role')
                // ->required(),
                ->schema([
                    Select::make('user_id')
                        ->relationship(name:'user', titleAttribute:'name')
                        ->label('Account')
                        ->afterStateUpdated(function (Set $set, $state) {
                
                            $set('college_id', User::query()->where('id', $state)->pluck('college_id'));
                            $set('department_id', User::query()->where('id', $state)->pluck('college_id'));
                            //need to set the student number according to the user account user_code
                            $set('student_no', User::query()->where('id', $state)->pluck('user_code'));
                    })
                    ->live(),
                    
                    Select::make('college_id')
                        ->relationship(name:'college', titleAttribute:'Title')
                        ->searchable()
                        ->live()
                        ->preload()
                        ->required()
                        ->disabled()
                        
                        ->afterStateUpdated(fn (Set $set)=>$set('department_id', null)),
                        Select::make('department_id')
                        //->relationship(name:'city', titleAttribute:'name')
                        ->options(fn(Get $get): Collection => Department::query()
                            ->where('college_id', $get('college_id'))
                            ->pluck('title', 'id'))
                            ->searchable() 
                        ->searchable()
                        ->preload()
                        ->live()
                        ->required()
                        ->disabled(),
                    
                        
                    TextInput::make('student_no')
                        ->required()
                        ->disabled()
                        ->maxLength(9),
                TextInput::make('last_name')
                        ->required()
                        ->maxLength(255)
                        ->dehydrateStateUsing(fn (string $state): string => strtoupper($state)),
                TextInput::make('first_name')
                        ->required()
                        ->maxLength(255)
                        ->dehydrateStateUsing(fn (string $state): string => strtoupper($state)),
                    TextInput::make('middle_name')
                        ->maxLength(255)
                        ->dehydrateStateUsing(fn ($state) => $state !== null ? strtoupper($state) : null),
                    Select::make('biological_sex')
                        ->required()
                        ->options(['MALE'=>'MALE', 'FEMALE'=>'FEMALE']),
                    DatePicker::make('birthdate'),
                    TextInput::make('birthdate_city')
                        ->required()
                        ->maxLength(255),
                    Select::make('religion')
                        ->required()
                        ->options(['Roman Catholic'=>'Roman Catholic', 'Iglesia ni Cristo'=>'Iglesia ni Cristo']),
                    Select::make('civil_status')
                        ->required()
                        ->options(['Single'=>'Single', 'Married'=>'Married', 'Widow'=>'Widow', 'Divorced'=>'Divorced']),
                    Select::make('student_type')
                        ->required()
                        ->options(['Regular'=>'Regular', 'Irregular'=>'Irregular']),
                    Select::make('registration_status')
                        ->required()
                        ->options(['Enrolled'=>'Enrolled', 'Not Enrolled'=>'Not Enrolled']),
                    Select::make('year_level')
                        ->required()
                        ->options(['1'=>'1', '2'=>'2', '3'=>'3', '4'=>'4', '5'=>'5']),
                        Select::make('block')
                        ->required()
                        ->options(['1'=>'1', '2'=>'2', '3'=>'3', '4'=>'4']),
                    TextInput::make('academic_year')
                        ->required()
                        ->maxLength(255),
                    TextInput::make('permanent_address')
                        ->required()
                        ->maxLength(255),
                    TextInput::make('plm_email')
                        ->email()
                        ->required()
                        ->maxLength(255),
                    TextInput::make('personal_email')
                        ->email()
                        ->required()
                        ->maxLength(255),
                    TextInput::make('mobile_no')
                        ->required()
                        //->numeric()
                        ->maxLength(11),
                    TextInput::make('telephone_no')
                        ->tel()
                        ->maxLength(8),
                        // FormSec::make('Subjects')->schema([
                            
                        //     Select::make('Subjects')
                            
                        //     ->multiple()
                        //     ->options(fn(Get $get): Collection => Subject::query()
                        //         ->where('department_id', $get('department_id'))
                        //         ->pluck('subject_title'))
                        //         ->searchable()
                        //     ->relationship('subjects', 'subject_title')
                        //     // ->multiple()
                        //     ->preload()
                        // ])->hidden(!auth()->user()->is_admin()),
                ]);
                // // ...
            
    }
    
}
