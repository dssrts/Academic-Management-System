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
use App\Services\FacultiesExportService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL; 
use App\Services\SchedulesExportService;
use Filament\Notifications\Collection as NotificationsCollection;
use Filament\Tables\Actions\BulkAction;
use Illuminate\Support\Facades\Response;
use PhpParser\ErrorHandler\Collecting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Livewire\Attributes\Title;

class FacultyResource extends Resource
{
    protected static ?string $model = Faculty::class;
    protected static ?string $recordTitleAttribute = 'first_name';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Chairperson Controls';

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'Faculty Name' => $record->first_name.' '.$record->middle_name.' '.$record->last_name,
            'College' => $record->college ? $record->college->Title : 'No College',
        ];
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('college_id')
                ->options(function () {
                    if (auth()->user()->hasRole('admin')) {
                        return \App\Models\College::all()->pluck('Title', 'id');
                    } else {
                        $userCollegeId = auth()->user()->college_id;
                        return \App\Models\College::where('id', $userCollegeId)->pluck('Title', 'id');
                    }
                })
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
                Tables\Actions\EditAction::make()
                ->icon('heroicon-o-document-text')
                ->label("Edit Information")
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
                            $exportService = new FacultiesExportService();
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
   
    public static function getNavigationBadge(): ?string
    {
        if(auth()->user()->hasRole('admin')) {
            return number_format(static::getModel()::count());
        }
        else{
        $count = static::getModel()::where('college_id', auth()->user()->college_id)->count();
        return number_format($count);
        }
    }
    
}
