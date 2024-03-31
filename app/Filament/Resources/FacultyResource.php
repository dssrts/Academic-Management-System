<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Faculty;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\FacultyResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\FacultyResource\RelationManagers;
use App\Filament\Resources\FacultyResource\RelationManagers\SubjectsRelationManager;

class FacultyResource extends Resource
{
    protected static ?string $model = Faculty::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Dean Controls';
    

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('college_id')
                    ->relationship('college', 'Title')
                    ->required(),
                
                Forms\Components\TextInput::make('first_name')
                    ->required()
                    ->maxLength(255)
                    ->dehydrateStateUsing(fn (string $state): string => strtoupper($state)),
                Forms\Components\TextInput::make('middle_name')
                // ->dehydrateStateUsing(fn (string $state): string => strtoupper($state))
                    ->maxLength(255),
                Forms\Components\TextInput::make('last_name')
                    ->required()
                    ->maxLength(255)
                    ->dehydrateStateUsing(fn (string $state): string => strtoupper($state)),
                // Section::make('Subjects')->schema([
                //     Select::make('subjects')
                //     ->relationship('subjects', 'subject_title')
                //     ->multiple()
                //     ->preload()
                // ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('college.Title')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('first_name')
                    ->searchable(),
                // Tables\Columns\TextColumn::make('middle_name')
                //     ->searchable(),
                Tables\Columns\TextColumn::make('last_name')
                    ->searchable(),
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
            //SubjectsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFaculties::route('/'),
            'create' => Pages\CreateFaculty::route('/create'),
            'edit' => Pages\EditFaculty::route('/{record}/edit'),
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
