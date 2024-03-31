<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GradeResource\Pages;
use App\Filament\Resources\GradeResource\RelationManagers;
use App\Models\Grade;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GradeResource extends Resource
{
    protected static ?string $model = Grade::class;

    protected static ?string $navigationIcon = 'heroicon-o-calculator';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('undergrad_student_id')
                ->relationship('undergradStudent', 'last_name')
                    ->required(),
                Forms\Components\Select::make('subject_id')
                ->relationship('subject', 'subject_title')
                    ->required(),
                    
                Forms\Components\Select::make('grade')
                ->options(['1'=>'1', '1.25'=> '1.25', '1.5'=>'1.5', '1.75'=> '1.75', '2'=>'2', '2.25'=> '2.25', '2.5'=>'2.5', '2.75'=> '2.75', '3'=>'3', 'INC'=>'INC', 'FAILED'=>'FAILED']),
                Forms\Components\Select::make('completion_grade')

                ->options(['1'=>'1', '1.25'=> '1.25', '1.5'=>'1.5', '1.75'=> '1.75', '2'=>'2', '2.25'=> '2.25', '2.5'=>'2.5', '2.75'=> '2.75', '3'=>'3', 'INC'=>'INC', 'FAILED'=>'FAILED']),
                Forms\Components\Select::make('remarks')
                ->options([ 'PASSED'=>'PASSED', 'FAILED'=>'FAILED']),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('undergradStudent.first_name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('subject.subject_title'),
                    
                Tables\Columns\TextColumn::make('grade')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('completion_grade')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('remarks')
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGrades::route('/'),
            'create' => Pages\CreateGrade::route('/create'),
            'edit' => Pages\EditGrade::route('/{record}/edit'),
        ];
    }   
    public static function getEloquentQuery(): Builder
{
    if(auth()->user()->hasRole('admin')) {
        return parent::getEloquentQuery();
    } else {
        return parent::getEloquentQuery()->whereHas('undergradStudent', function ($query) {
            $query->where('college_id', auth()->user()->college_id);
        });
    }
}
}
