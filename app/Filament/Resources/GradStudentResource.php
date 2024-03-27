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
use App\Models\GradStudent;
use Filament\Resources\Resource;
use Filament\Resources\Pages\Page;
use Illuminate\Support\Collection;
use Filament\Tables\Actions\Action;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Pages\CreateRecord;
use Filament\Forms\Components\CheckboxList;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\GradStudentResource\Pages;
use App\Filament\Resources\GradStudentResource\RelationManagers;
use App\Filament\Resources\GradStudentResource\RelationManagers\SubjectsRelationManager;

class GradStudentResource extends Resource
{
    protected static ?string $model = GradStudent::class;


    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';


    protected static ?string $recordTitleAttribute = 'student_num';
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
                
                ->preload()
                ,
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
                Forms\Components\Select::make('block')
                    ->options(['1'=>'1', '2'=>'2', '3'=>'3']),
                Forms\Components\TextInput::make('student_num')
                    ->required()
                    ->maxLength(9),

                Forms\Components\TextInput::make('first_name')
                    ->required()
                    ->maxLength(255)
                    ->dehydrateStateUsing(fn (string $state): string => strtoupper($state)),
                Forms\Components\TextInput::make('middle_name')
                    ->maxLength(255)
                    ,
                Forms\Components\TextInput::make('last_name')
                    ->required()
                    ->maxLength(255)
                    ->dehydrateStateUsing(fn (string $state): string => strtoupper($state)),
                TextInput::make('GWA')
                    ->label('GWA'),
                    Section::make('Subjects')->schema([
                        CheckboxList::make('Subjects')
                        ->options(fn(Get $get): Collection => Subject::query()
                            ->where('department_id', $get('department_id'))
                            ->pluck('subject_title'))
                            ->searchable()
                        ->relationship('subjects', 'subject_title')
                    ]),
                    
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
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('department.title')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('GWA')
                ->label('GWA'),
                
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
                Filter::make('Below Retention Grade')
                    ->query(fn (Builder $query): Builder => $query->where('GWA','>', '2.75')),
                Filter::make('Dean Lister')
                    ->query(fn (Builder $query): Builder => $query->where('GWA','<=', '1.75')),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->headerActions([
                Action::make('Blocks')
                ->icon('heroicon-o-users')
                ->url('/ams/grad-students/blocks')
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
            'index' => Pages\ListGradStudents::route('/'),
            'create' => Pages\CreateGradStudent::route('/create'),
            'edit' => Pages\EditGradStudent::route('/{record}/edit'),
            'view_blocks'=>Pages\FilterBlocks::route('/blocks'),
        ];
    }
}
