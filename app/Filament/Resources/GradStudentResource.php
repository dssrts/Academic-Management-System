<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Form;
use App\Models\Department;
use Filament\Tables\Table;
use App\Models\GradStudent;
use Filament\Resources\Resource;
use Illuminate\Support\Collection;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\GradStudentResource\Pages;
use App\Filament\Resources\GradStudentResource\RelationManagers;

class GradStudentResource extends Resource
{
    protected static ?string $model = GradStudent::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')
                ->label('Account')
                //->relationship('user', 'name')
                ->options(fn(Get $get): Collection => User::query()
                    ->where('account_type', 'Student')
                    ->pluck('name')) 
                ->searchable()
                
                ->preload()
                ->unique(),
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
                Forms\Components\TextInput::make('student_num')
                    ->required()
                    ->maxLength(9),

                Forms\Components\TextInput::make('first_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('middle_name')
                    ->maxLength(255),
                Forms\Components\TextInput::make('last_name')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Tables\Columns\TextColumn::make('user_id')
                //     ->numeric()
                //     ->sortable(),
                Tables\Columns\TextColumn::make('student_num')
                    ->searchable(),
                Tables\Columns\TextColumn::make('first_name')
                    ->searchable(),
                // Tables\Columns\TextColumn::make('middle_name')
                //     ->searchable(),
                Tables\Columns\TextColumn::make('last_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('college.Title')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('department.title')
                    ->numeric()
                    ->sortable(),
                
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
            'index' => Pages\ListGradStudents::route('/'),
            'create' => Pages\CreateGradStudent::route('/create'),
            'edit' => Pages\EditGradStudent::route('/{record}/edit'),
        ];
    }
}
