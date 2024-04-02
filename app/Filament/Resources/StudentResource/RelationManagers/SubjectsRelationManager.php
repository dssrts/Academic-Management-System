<?php

namespace App\Filament\Resources\StudentResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

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
            ])
            ;
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
                // Filter::make('Year 1')
                // ->label("1st Year")
                // ->query(fn (Builder $query): Builder => $query->where('subjects.year', '1')),
                SelectFilter::make('Year')
                    ->options(['1'=>'1', '2'=>'2', '3'=>'3','4'=>'4' ])
                    //->query(fn (Builder $query): Builder => $query->where('subjects.year', '1'))
                //    ->attribute('subjects.year')
                    //->searchable()
                    ->preload(),
                
            ])
                    
            ->headerActions([
                //
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
    // public static function getEloquentQuery(): Builder
    // {
    //     if(auth()->user()->hasRole('admin')) {
    //         return parent::getEloquentQuery();
            
    //     } else{
    //         return parent::getEloquentQuery()->where('college_id', auth()->user()->college_id);
    //     }

    // }
}
