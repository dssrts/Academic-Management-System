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
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL; 
use App\Services\SchedulesExportService;
use App\Services\StudentsExportService;
use App\Services\SubjectsExportService;
use Filament\Notifications\Collection as NotificationsCollection;
use Filament\Tables\Actions\BulkAction;
use Illuminate\Support\Facades\Response;
use PhpParser\ErrorHandler\Collecting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;


class SubjectResource extends Resource
{
    protected static ?string $model = Subject::class;
    protected static ?string $recordTitleAttribute = 'subject_code';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Chairperson Controls';

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'Subject Code' => $record->subject_code,
            'Title' => $record->subject_title,
            'Faculty' => $record->faculty,
        ];
    }

    
    public static function form(Form $form): Form
    {
        
        return $form
        
            ->schema([
                Forms\Components\Select::make('college_id')
                ->relationship(name: 'college', titleAttribute: 'Title')
                ->options(function () {
                    if (auth()->user()->hasRole('admin')) {
                        return \App\Models\College::all()->pluck('Title', 'id');
                    } else {
                        $userCollegeId = auth()->user()->college_id;
                        return \App\Models\College::where('id', $userCollegeId)->pluck('Title', 'id');
                    }
                })
                ->searchable()
                ->live()
                ->preload()
                ->required()
                ->afterStateUpdated(fn (Set $set) => $set('department_id', null)),
                
                Forms\Components\Select::make('department_id')
                ->options(function (Get $get) {
                    $collegeId = $get('college_id');
                    
                    if (auth()->user()->hasRole('admin')) {
                        return \App\Models\Department::where('college_id', $collegeId)->pluck('title', 'id');
                    } else {
                        $userCollegeId = auth()->user()->college_id;
                        $userDepartmentId = auth()->user()->department_id;
                        return \App\Models\Department::where('college_id', $userCollegeId)
                            ->where('id', $userDepartmentId)
                            ->pluck('title', 'id');
                    }
                })
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
                Tables\Actions\EditAction::make()
                ->label("Edit Information")
                ->icon('heroicon-o-document-text')
                ->color('warning'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make(array_filter([
                    Auth::check() && Auth::user()->hasRole('admin') ? Tables\Actions\DeleteBulkAction::make() : null,
                    BulkAction::make('export')
                        ->label('Export to Excel')
                        ->icon('heroicon-o-arrow-down-tray')
                        ->color('success') // Set the color to green
                        ->action(function (Collection $records) {
                            $ids = $records->pluck('id')->toArray();
                            $exportService = new SubjectsExportService();
                            $fileName = $exportService->export($ids);
                            $filePath = storage_path('app/' . $fileName);
                            return Response::download($filePath)->deleteFileAfterSend(true);
                        }),
                ])), // Use array_filter to remove null values
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
        if(auth()->user()->hasRole('admin')) {
            return number_format(static::getModel()::count());
        }
        else{
        $count = static::getModel()::where('department_id', auth()->user()->department_id)->count();
        return number_format($count);
        }
    }
}
