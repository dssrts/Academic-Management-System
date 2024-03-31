<?php

namespace App\Filament\Resources;
use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Student;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Form;
use App\Models\Department;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Collection;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\StudentResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\StudentResource\RelationManagers;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
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
                    //->relationship(name:'city', titleAttribute:'name')
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
                    ->required()
                    ->maxLength(9),
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
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('personal_email')
                    ->email()
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

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('college.Title')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('department.title')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user_id'),
                    
                Tables\Columns\TextColumn::make('student_no')
                    
                    ->sortable(),
                Tables\Columns\TextColumn::make('last_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('first_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('middle_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('biological_sex')
                    ->searchable(),
                Tables\Columns\TextColumn::make('birthdate')
                    ->searchable(),
                Tables\Columns\TextColumn::make('birthdate_city')
                    ->searchable(),
                Tables\Columns\TextColumn::make('religion')
                    ->searchable(),
                Tables\Columns\TextColumn::make('civil_status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('student_type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('registration_status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('year_level')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('academic_year')
                    ->searchable(),
                Tables\Columns\TextColumn::make('permanent_address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('plm_email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('personal_email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('mobile_no')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('telephone_no')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }
}