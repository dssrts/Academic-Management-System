<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Faculty;
use App\Models\Subject;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Form;
use App\Models\Department;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Collection;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\SubjectResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SubjectResource\RelationManagers;
use App\Filament\Resources\SubjectResource\RelationManagers\FacultyRelationManager;
use App\Filament\Resources\SubjectResource\RelationManagers\FacultiesRelationManager;
use Filament\Tables\Filters\SelectFilter;

class SubjectResource extends Resource
{
    protected static ?string $model = Subject::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Chairperson Controls';
    
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
                    
                    
                Forms\Components\TextInput::make('subject_code')
                    ->required()
                    ->maxLength(255)
                    ->dehydrateStateUsing(fn (string $state): string => strtoupper($state)),
                Forms\Components\TextInput::make('subject_title')
                    ->required()
                    ->maxLength(255)
                    ->dehydrateStateUsing(fn (string $state): string => strtoupper($state)),
                Forms\Components\Select::make('units')
                    ->options(['1'=>'1', '2'=>'2', '3'=>'3']),
                Forms\Components\Select::make('year')
                    ->options(['1'=>'1', '2'=>'2', '3'=>'3', '4'=>'4']),
                Section::make('Faculties')->schema([
                    Select::make('faculties')
                    //->relationship('faculties', 'last_name')
                    ->multiple()
                    ->preload()
                    // ->options(fn(Get $get): Collection => Faculty::query()
                    //     ->where('college_id', $get('college_id'))
                    //     ->pluck('last_name'))
                    //     ->searchable()
                    ->searchable()
                    ->options(function (Get $get): array {
                        if (auth()->user()->is_admin()){
                            
                            return Faculty::all()->pluck('last_name')->all();
                        }
                        return Faculty::query()
                            ->where('college_id', $get('college_id'))
                            ->pluck('last_name')
                            ->all();
                    })
                
                    // ->options(function (Get $get, $label) {
                    //     if (auth()->user()->is_admin()){
                    //         return Faculty::all();
                    // } else{
                    //     return Faculty::query()
                    //     ->where('college_id', $get('college_id'))
                    //     ->pluck('last_name')
                    //     ->searchable();
                    //     //->relationship('faculties', 'last_name');
                    // }
                    // else {
                    //     return Faculty::query()
                    //     ->where('college_id', $get('college_id'))
                    //     ->pluck('last_name'))
                    //     ->searchable();
                    //->relationship('faculties', 'last_name')
                    // })
                    
                ])
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('department.title')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('subject_code')
                    ->searchable(),
                    
                Tables\Columns\TextColumn::make('subject_title')
                    ->searchable(),
                    
                Tables\Columns\TextColumn::make('units'),
                // Tables\Columns\TextColumn::make('created_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
                // Tables\Columns\TextColumn::make('updated_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('college')
                ->relationship('college', 'Title'), 
                SelectFilter::make('department')
                ->relationship('department', 'title'), 
                SelectFilter::make('year')
                ->options([
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5',
                ]), 
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ])
            
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //FacultyRelationManager::class,
            //FacultiesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSubjects::route('/'),
            'create' => Pages\CreateSubject::route('/create'),
            'edit' => Pages\EditSubject::route('/{record}/edit'),
        ];
    }
    public static function getEloquentQuery(): Builder
    {
        if(auth()->user()->hasRole('admin')) {
            return parent::getEloquentQuery();
            
        } else{
            return parent::getEloquentQuery()->where('department_id', auth()->user()->department_id);
        }

    }

    public static function getNavigationBadge(): ?string
    {
        return number_format(static::getModel()::count());
    }
}
