<?php

namespace App\Filament\Resources\StudentResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use App\Models\Student;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Model;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;
use App\Filament\Resources\StudentResource\RelationManagers\SubjectsRelationManager as SubRelManager;

class SubjectsRelationManager extends RelationManager
{
    protected static string $relationship = 'subjects';
    // protected function mutateFormDataBeforeSave(array $data): array
    // {
    //     //$data['remarks'] = auth()->id();
    //     if ($data['grade'] == "INC") {
                            
    //         $data['remarks'] = 'INC';
    //     } elseif ($data['grade'] <= 3) {
            
    //         $data['remarks'] = 'Passed';
    //     } else {
            
    //         // Modify the remarks field if grade is greater than 3
    //         $data['remarks'] = 'Failed';
    //     }
     
    //     return $data;
    // }
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('subject_title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('grade')
                    ->options(['1'=>'1', '1.25'=> '1.25', '1.5'=>'1.5', '1.75'=> '1.75', '2'=>'2', '2.25'=> '2.25', '2.5'=>'2.5', '2.75'=> '2.75', '3'=>'3', 'INC'=>'INC', 'FAILED'=>'FAILED']),
                Forms\Components\Select::make('remarks')
                    ->options(['PASSED'=>'PASSED', 'FAILED'=> 'FAILED', 'INC'=>'INC']),
                    
                    // ->beforeStateUpdated(function ($record, $state) {
                    //     // Runs before the state is saved to the database.
                    //     if ($record->grade == "INC") {
                            
                    //         $state->remarks = 'INC';
                    //     } elseif ($record->grade <= 3) {
                            
                    //         $record->remarks = 'Passed';
                    //     } else {
                            
                    //         // Modify the remarks field if grade is greater than 3
                    //         $state->remarks = 'Failed';
                    //     }
                    // })

            ])//->hiddenOn(SubRelManager::class)
            ;
    }

    public function table(Table $table): Table
    {
        // if(auth()->user()->is_admin()){
        //     return $table;
        // }

        return $table
            ->recordTitleAttribute('subject_title')
            ->columns([
                Tables\Columns\TextColumn::make('subject_title'),
                Tables\Columns\TextColumn::make('grade'),
                Tables\Columns\TextColumn::make('remarks')
                //->badge()
                
                // ->afterStateUpdated(function ($record, $state) {
                //     // Runs after the state is saved to the database.
                // }),

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
    public static function canViewForRecord(Model $ownerRecord, string $pageClass): bool
    {
        return true;
        //return !auth()->user()->is_admin();
    }
    
}
