<?php

namespace App\Filament\Resources\StudentResource\Pages;
use Filament\Forms;
use Filament\Actions;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Form;
use InteractsWithRecord;
use App\Models\Department;
use Illuminate\Support\Collection;
use Filament\Forms\Components\Select;
use Filament\Resources\Pages\EditRecord;
use Filament\Forms\Components\DatePicker;
use App\Filament\Resources\StudentResource;
use App\Filament\Resources\StudentResource\RelationManagers\SubjectsRelationManager;
    



class EditStudentInfo extends EditRecord
{
    // public function mount(int | string $record): void
    // {
    //     $this->record = $this->resolveRecord($record);
    // }
    
    protected static string $resource = StudentResource::class;
    
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('college_id')
                        ->relationship(name:'college', titleAttribute:'Title')
                        ->searchable()
                        ->live()
                        ->preload()
                        ->required()
                        
                        ->afterStateUpdated(fn (Set $set)=>$set('department_id', null)),
                        Forms\Components\Select::make('department_id')
                        ->options(fn(Get $get): Collection => Department::query()
                            ->where('college_id', $get('college_id'))
                            ->pluck('title', 'id'))
                            ->searchable() 
                        ->searchable()
                        ->preload()
                        ->live()
                        ->required(),
                    Select::make('user_id')
                        ->relationship(name:'user', titleAttribute:'name')
                        ->label('Account'),
                        
                    Forms\Components\TextInput::make('student_no')
                        ->required(),
                    Forms\Components\TextInput::make('last_name')
                        ->required()
                        ->maxLength(255)
                        ->dehydrateStateUsing(fn (string $state): string => strtoupper($state)),
                    Forms\Components\TextInput::make('first_name')
                        ->required()
                        ->maxLength(255)
                        ->dehydrateStateUsing(fn (string $state): string => strtoupper($state)),
                    Forms\Components\TextInput::make('middle_name')
                        ->maxLength(255)
                        ->dehydrateStateUsing(fn ($state) => $state !== null ? strtoupper($state) : null),
                    Forms\Components\Select::make('biological_sex')
                        ->required()
                        ->options(['MALE'=>'MALE', 'FEMALE'=>'FEMALE']),
                    DatePicker::make('birthdate'),
                    Forms\Components\TextInput::make('birthdate_city')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\Select::make('religion')
                        ->required()
                        ->options(['Roman Catholic'=>'Roman Catholic', 'Iglesia ni Cristo'=>'Iglesia ni Cristo']),
                    Forms\Components\Select::make('civil_status')
                        ->required()
                        ->options(['Single'=>'Single', 'Married'=>'Married', 'Widow'=>'Widow', 'Divorced'=>'Divorced']),
                    Forms\Components\Select::make('student_type')
                        ->required()
                        ->options(['Regular'=>'Regular', 'Irregular'=>'Irregular']),
                    Forms\Components\Select::make('registration_status')
                        ->required()
                        ->options(['Enrolled'=>'Enrolled', 'Not Enrolled'=>'Not Enrolled']),
                    Forms\Components\Select::make('year_level')
                        ->required()
                        ->options(['1'=>'1', '2'=>'2', '3'=>'3', '4'=>'4', '5'=>'5']),
                    Forms\Components\TextInput::make('academic_year')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('permanent_address')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('plm_email')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('personal_email')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('mobile_no')
                        ->required()
                        ->numeric()
                        ->maxLength(11),
                    Forms\Components\TextInput::make('telephone_no')
                        ->tel()
                        ->maxLength(8),
            ]);
    }
    public static function getRelations(): array
    {
        
        return [
            SubjectsRelationManager::class,
            
        ];
    }
}