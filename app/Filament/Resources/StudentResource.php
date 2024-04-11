<?php

namespace App\Filament\Resources;
use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Student;
use App\Models\Subject;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Form;
use App\Models\Department;
use Filament\Tables\Table;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Resources\Pages\Page;
// use Filament\Forms\Components\Section;
use Illuminate\Support\Collection;
use Filament\Tables\Actions\Action;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\Select;
use PHPUnit\Util\Filter as UtilFilter;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Columns\SelectColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Support\Htmlable;
use DeepCopy\Filter\Filter as FilterFilter;
use Filament\Forms\Components\CheckboxList;
use Filament\Infolists\Components\TextEntry;
use App\Filament\Resources\StudentResource\Pages;
use Filament\Forms\Components\Section as FormSec;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Filters\Filter as FiltersFilter;
use Filament\Infolists\Components\Section as InfoSec;
use App\Filament\Resources\StudentResource\RelationManagers;
use App\Filament\Resources\StudentResource\Pages\EditStudentInfo;
use App\Filament\Resources\StudentResource\RelationManagers\SubjectsRelationManager;


class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $recordTitleAttribute = 'student_no';
    
    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'Student Number' => $record->student_no,
            'Last Name' => $record->last_name,
        ];
    }
    public static function canAccess(): bool
    {
        return auth()->user()->hasRole('admin');
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Forms\Components\Select::make('college_id')
                //     ->relationship(name:'college', titleAttribute:'Title')
                //     ->searchable()
                //     ->live()
                //     ->preload()
                //     ->required()
                //     ->afterStateUpdated(fn (Set $set)=>$set('department_id', null)),
                //     Forms\Components\Select::make('department_id')
                //     //->relationship(name:'city', titleAttribute:'name')
                //     ->options(fn(Get $get): Collection => Department::query()
                //         ->where('college_id', $get('college_id'))
                //         ->pluck('title', 'id'))
                //         ->searchable() 
                //     ->searchable()
                //     ->preload()
                //     ->live()
                //     ->required(),
                // Select::make('user_id')
                //     ->relationship(name:'user', titleAttribute:'name')
                //     ->label('Account'),
                    
                // Forms\Components\TextInput::make('student_no')
                //     ->required()
                //     ->maxLength(9),
                // Forms\Components\TextInput::make('last_name')
                //     ->required()
                //     ->maxLength(255)
                //     ->dehydrateStateUsing(fn (string $state): string => strtoupper($state)),
                // Forms\Components\TextInput::make('first_name')
                //     ->required()
                //     ->maxLength(255)
                //     ->dehydrateStateUsing(fn (string $state): string => strtoupper($state)),
                // Forms\Components\TextInput::make('middle_name')
                //     ->maxLength(255)
                //     ->dehydrateStateUsing(fn ($state) => $state !== null ? strtoupper($state) : null),
                // Forms\Components\Select::make('biological_sex')
                //     ->required()
                //     ->options(['MALE'=>'MALE', 'FEMALE'=>'FEMALE']),
                // DatePicker::make('birthdate'),
                // Forms\Components\TextInput::make('birthdate_city')
                //     ->required()
                //     ->maxLength(255),
                // Forms\Components\Select::make('religion')
                //     ->required()
                //     ->options(['Roman Catholic'=>'Roman Catholic', 'Iglesia ni Cristo'=>'Iglesia ni Cristo']),
                // Forms\Components\Select::make('civil_status')
                //     ->required()
                //     ->options(['Single'=>'Single', 'Married'=>'Married', 'Widow'=>'Widow', 'Divorced'=>'Divorced']),
                // Forms\Components\Select::make('student_type')
                //     ->required()
                //     ->options(['Regular'=>'Regular', 'Irregular'=>'Irregular']),
                // Forms\Components\Select::make('registration_status')
                //     ->required()
                //     ->options(['Enrolled'=>'Enrolled', 'Not Enrolled'=>'Not Enrolled']),
                // Forms\Components\Select::make('year_level')
                //     ->required()
                //     ->options(['1'=>'1', '2'=>'2', '3'=>'3', '4'=>'4', '5'=>'5']),
                // Forms\Components\TextInput::make('academic_year')
                //     ->required()
                //     ->maxLength(255),
                // Forms\Components\TextInput::make('permanent_address')
                //     ->required()
                //     ->maxLength(255),
                // Forms\Components\TextInput::make('plm_email')
                //     ->email()
                //     ->required()
                //     ->maxLength(255),
                // Forms\Components\TextInput::make('personal_email')
                //     ->email()
                //     ->required()
                //     ->maxLength(255),
                // Forms\Components\TextInput::make('mobile_no')
                //     ->required()
                //     ->numeric()
                //     ->maxLength(11),
                // Forms\Components\TextInput::make('telephone_no')
                //     ->tel()
                //     ->maxLength(8),
                    FormSec::make('Subjects')->schema([
                        
                        Select::make('Subjects')
                        
                        ->multiple()
                        ->options(fn(Get $get): Collection => Subject::query()
                            ->where('department_id', $get('department_id'))
                            ->pluck('subject_title'))
                            ->searchable()
                        ->relationship('subjects', 'subject_title')
                        // ->multiple()
                        ->preload()
                    ])//->hidden(!auth()->user()->is_admin()),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Tables\Columns\TextColumn::make('user_id')
                //     ->label("User Id")
                //     ->sortable(),
                Tables\Columns\TextColumn::make('student_no')
                    ->label("Student Number")
                    ->sortable(),
                Tables\Columns\TextColumn::make('last_name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('first_name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('college.Code')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('department.code')
                    ->numeric()
                    ->sortable(),
                SelectColumn::make('block')
                    ->options([
                        '1' => '1',
                        '2' => '2',
                        '3' => '3',
                        '4' => '4',
                        '5' => '5',
                    ])
                // Tables\Columns\TextColumn::make('middle_name')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('biological_sex')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('birthdate')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('birthdate_city')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('religion')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('civil_status')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('student_type')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('registration_status')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('year_level')
                //     ->numeric()
                //     ->sortable(),
                // Tables\Columns\TextColumn::make('academic_year')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('permanent_address')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('plm_email')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('personal_email')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('mobile_no')
                //     ->numeric()
                //     ->sortable(),
                // Tables\Columns\TextColumn::make('telephone_no')
                //     ->numeric()
                //     ->sortable(),
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
                // Tables\Filters\SelectFilter::make('College')
                // ->options([
                //     'CET' => 'College of Engineering and Technology',
                //     'CAUP' => 'College of Architecture & Urban Planning',
                //     'CISTM' => 'College of Information and System Managament',
                //     'CAE' => 'College of Accountancy & Economics',
                //     'CS'  => 'College of Science',
                //     'CPT'  => 'College of Physical Therapy',
                // ]),
                
                Tables\Filters\SelectFilter::make('student_type')
                ->options([
                    'Regular' => 'Regular Student',
                    'Irregular' => 'Irregular Student',
                ]),
                Tables\Filters\SelectFilter::make('block')
                ->options([
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                ]),
                Tables\Filters\SelectFilter::make('year_level')
                ->options([
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5',
                ]),

                // Tables\Filters\SelectFilter::make('Sex')
                // ->options([
                //     'Male' => 'Male',
                //     'Female' => 'Female',
                // ]),
            ])
            ->actions([
                // -- you can  actually use this to  return forms 
                //eto yung keywords sa filament "Filling the form with existing data"
                Tables\Actions\ViewAction::make()

                ->label("View Info"),
                Action::make('edit-info')
                ->icon("heroicon-o-pencil-square")
                ->hidden(!auth()->user()->is_admin())
                ->url(fn (Model $record): string => StudentResource::getUrl('edit-info', ['record' => $record])),
                
                    
                
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }


    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                InfoSec::make("General Information")
                    ->schema([
                        TextEntry::make('student_no')->label('Student Number:')->weight('bold'),
                        TextEntry::make('last_name')->label('Last Name:')->weight('bold'),
                        TextEntry::make('first_name')->label('First Name:')->weight('bold'),
                        TextEntry::make('middle_name')->label('Middle Name:')->weight('bold'),
                        TextEntry::make('biological_sex')->label('Sex:')->weight('bold'),
                        TextEntry::make('birthdate')->label('Birthdate:')->weight('bold'),
                        TextEntry::make('birthdate')->label('Sex:')->weight('bold'),
                        TextEntry::make('birthdate_city')->label('Birthplace:')->weight('bold'),
                        TextEntry::make('religion')->label('Religion:')->weight('bold'),
                        TextEntry::make('civil_status')->label('Civil Status:')->weight('bold'),
                        TextEntry::make('student_type')->label('Student Status:')->weight('bold'),
                        TextEntry::make('registration_status')->label('Registration Status:')->weight('bold'),
                        TextEntry::make('year_level')->label('Year Level:')->weight('bold'),

                    ])->columns(2),
                    InfoSec::make('Student Information')
                    ->schema([
                        TextEntry::make('college.Title')->label('College:')->weight('bold'),
                        TextEntry::make('department.title')->label('Department:')->weight('bold'),
                        TextEntry::make('academic_year')->label('Academic Year:')->weight('bold'),
                        TextEntry::make('permanent_address')->label('Address:')->weight('bold'),
                        TextEntry::make('plm_email')->label('PLM Email:')->weight('bold'),
                        TextEntry::make('personal_email')->label('Personal Email:')->weight('bold'),
                        TextEntry::make('mobile_no')->label('Mobile Number:')->weight('bold'),
                        TextEntry::make('telephone_no')->label('Telephone Number:')->weight('bold'),

                    ])->columns(2)
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
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
            'edit-info' => Pages\EditStudentInfo::route('/{record}/edit/student'),
            
            
        ];
    }
    // public static function getRecordSubNavigation(Page $page): array
    // {
    //     return $page->generateNavigationItems([
    //         // ...
    //         Pages\EditStudentInfo::class,
    //     ]);
    // }

//     public static function getWidgets(): array
// {
//     return [
//         StudentResource\Widgets\StudentsOverview::class,
//     ];
// }
    public static function getEloquentQuery(): Builder
    {
        if(auth()->user()->hasRole('admin')) {
            return parent::getEloquentQuery();
            
        } else{
            return parent::getEloquentQuery()->where('department_id', auth()->user()->department_id);
        }

    }
    // protected function getHeaderWidgets(): array
    // {
    //     return [
    //         StudentResource\Widgets\StudentsOverview::class,
    //     ];
    // }
}
