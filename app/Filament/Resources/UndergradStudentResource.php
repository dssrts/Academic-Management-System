<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Subject;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Form;
use App\Models\Department;
use Filament\Tables\Table;
use App\Models\UndergradStudent;
use Filament\Resources\Resource;
use Filament\Resources\Pages\Page;
use Illuminate\Support\Collection;
use Filament\Tables\Actions\Action;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Pages\CreateRecord;
use Filament\Forms\Components\CheckboxList;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UndergradStudentResource\Pages;
use App\Filament\Resources\UndergradStudentResource\RelationManagers;
use App\Filament\Resources\UndergradStudentResource\RelationManagers\SubjectsRelationManager;

class UndergradStudentResource extends Resource
{
    protected static ?string $model = UndergradStudent::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $recordTitleAttribute = 'student_number';
    public static function getGlobalSearchResultDetails(Model $record): array
{
    return [
        'Last Name' => $record->last_name,
        'Department' => $record->department->title,
        
    ];
}

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')
                ->label('Account')
                // ->relationship('user', 'name')
                ->options(fn(Get $get): Collection => User::query()
                    ->where('account_type', 'Student')
                    ->pluck('name')) 
                ->searchable()
                    ->dehydrated(fn ($state) => filled($state))
                    ->required(fn (Page $livewire) => ($livewire instanceof CreateRecord))

                ->preload(),
                // ->unique(),
                
                TextInput::make('student_number')
                ->required()
                ->maxLength(9),
                TextInput::make('first_name')
                ->required(),
                TextInput::make('middle_name')
                ,
                TextInput::make('last_name')
                ->required(),

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
                    
                Select::make('reg_status')
                ->options(['Regular'=> "Regular", "Irregular"=> "Irregular"])
                ->required(),
                Select::make('enrollment_status')
                    ->options(['Enrolled'=> "Enrolled", "Not Enrolled"=> "Not Enrolled"])
                    ->required(),
                Section::make('Subjects')->schema([
                    CheckboxList::make('Subjects')
                    ->options(fn(Get $get): Collection => Subject::query()
                        ->where('department_id', $get('department_id'))
                        ->pluck('subject_title'))
                        ->searchable()
                    ->relationship('subjects', 'subject_title')
                    // ->multiple()
                    // ->preload()
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
    return $table
            ->columns([
                // Tables\Columns\TextColumn::make('user.user_code')
                //     ->label('Student Number')
                //     ->sortable(),
                Tables\Columns\TextColumn::make('student_number')
                    ->label('Student Number')
                    ->sortable(),
                    Tables\Columns\TextColumn::make('first_name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('last_name')
                    ->searchable()
                    ->sortable(),
                    Tables\Columns\TextColumn::make('college.Title')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('department.title')
                    ->numeric()
                    ->sortable(),
                
                
                Tables\Columns\TextColumn::make('reg_status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        
                        'Irregular' => 'warning',
                        'Regular' => 'success',
                        
                    }),
                Tables\Columns\TextColumn::make('enrollment_status')
                    ->searchable(),
                
            ])
            ->filters([
                Filter::make('Enrolled')
                    ->query(fn (Builder $query): Builder => $query->where('enrollment_status', 'Enrolled'))
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->headerActions([
                Action::make('Grades')
                ->icon('heroicon-o-calculator')
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
            SubjectsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUndergradStudents::route('/'),
            'create' => Pages\CreateUndergradStudent::route('/create'),
            'edit' => Pages\EditUndergradStudent::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        if(auth()->user()->hasRole('admin')) {
            return parent::getEloquentQuery();
            
        } else{
            return parent::getEloquentQuery()->where('college_id', auth()->user()->college_id);
        }

    }
}
