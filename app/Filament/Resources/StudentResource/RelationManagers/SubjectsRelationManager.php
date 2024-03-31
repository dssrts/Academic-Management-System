<?php

namespace App\Filament\Resources\StudentResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SubjectsRelationManager extends RelationManager
{
    protected static string $relationship = 'subjects';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('subject_title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('grade')
                    ->options(['1'=>'1', '1.25'=> '1.25', '1.5'=>'1.5', '1.75'=> '1.75', '2'=>'2', '2.25'=> '2.25', '2.5'=>'2.5', '2.75'=> '2.75', '3'=>'3', 'INC'=>'INC', 'FAILED'=>'FAILED']),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('subject_title')
            ->columns([
                Tables\Columns\TextColumn::make('subject_title'),
                Tables\Columns\TextColumn::make('grade'),

            ])
            ->filters([
                //
            ])
            ->headerActions([
                // Tables\Actions\AttachAction::make(),
            ])
            ->actions([
                Tables\Actions\DetachAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
