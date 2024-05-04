<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Schedule;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use App\Filament\Resources\ScheduleResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ScheduleResource\RelationManagers;

class ScheduleResource extends Resource
{
    protected static ?string $model = Schedule::class;

    protected static ?string $navigationIcon = 'heroicon-o-clock';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('subject_id')
                ->label('Subject Code')
                ->searchable()
                ->preload()
                ->relationship(name:'subject',titleAttribute:'subject_code'),

                Forms\Components\Select::make('status')
                ->label('Status')
                ->options(['Available'=>'Available', 'Taken'=>'Taken'])
                //->placeholder('Taken')
                ->required(),

                Forms\Components\Select::make('building')
                ->options([
                    'GV' => 'Gusaling Villegas',
                    'GK' => 'Gusaling Katipunan',
                    'GCA' => 'Gusaling Corazon Aquino',
                    'GEE' => 'Gusaling Emilio Ejercito',
                    'GL'  => 'Gusaling Lacson',
                ])
                    ->required()
                    ->visible(auth()->user()->hasRole('admin')),
                    
                Forms\Components\TextInput::make('room_number')
                    ->required()
                    ->maxLength(255)
                    ->visible(auth()->user()->hasRole('admin')),
                Forms\Components\Select::make('type')
                    ->options(['LAB'=>'LAB', 'LEC'=>'LEC'])
                    ->required()
                    ->visible(auth()->user()->hasRole('admin')),
                    
                Forms\Components\Select::make('day')
                ->options([
                    'Monday' => 'Monday',
                    'Tuesday' => 'Tuesday',
                    'Wednesday' => 'Wednesday',
                    'Thursday' => 'Thursday',
                    'Friday' => 'Friday',
                    'Saturday' => 'Saturday',
                    'Sunday' => 'Sunday'
                ])
                    ->required()
                    ->visible(auth()->user()->hasRole('admin')),
                Forms\Components\TextInput::make('time')
                    ->required()
                    ->maxLength(255)
                    ->visible(auth()->user()->hasRole('admin')),
                
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('building')
                ->searchable()
                ->sortable(),
                Tables\Columns\TextColumn::make('room_number')
                ->searchable()
                ->sortable(),
                Tables\Columns\TextColumn::make('type')
                ->searchable()
                ->sortable(),
                Tables\Columns\TextColumn::make('day')
                ->searchable()
                ->sortable(),
                Tables\Columns\TextColumn::make('time')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('subject.subject_title')
                ->sortable()
                ->searchable()
                ->formatStateUsing(function ($state, $record) {
                    return $record->status == 'Available' ? '' : $state;
                }),
                Tables\Columns\TextColumn::make('subject.subject_code')
                ->sortable()
                ->label('Code')
                ->searchable()
                ->formatStateUsing(function ($state, $record) {
                    return $record->status == 'Available' ? '' : $state;
                }),
                Tables\Columns\TextColumn::make('status')
                ->sortable()
                ->searchable()
                ->badge()
                ->color(fn(string $state): string => match ($state){
                    'Taken' => 'warning',
                    'Available' => 'success',
                })
            ])
            ->filters([
                Filter::make('Taken')
                ->query(fn (Builder $query): Builder => $query->where('status', 'Taken')),

                Filter::make('Available')
                ->query(fn (Builder $query): Builder => $query->where('status', 'Available')),
                
                Tables\Filters\SelectFilter::make('Building')
                ->options([
                    'GV' => 'Gusaling Villegas',
                    'GK' => 'Gusaling Katipunan',
                    'GCA' => 'Gusaling Corazon Aquino',
                    'GEE' => 'Gusaling Emilio Ejercito',
                    'GL'  => 'Gusaling Lacson',
                ]),

                Tables\Filters\SelectFilter::make('type')
                ->options([
                    'Lab' => 'Laboratory',
                    'Lec' => 'Lecture'
                ]),

                Tables\Filters\SelectFilter::make('day')
                ->options([
                    'Monday' => 'Monday',
                    'Tuesday' => 'Tuesday',
                    'Wednesday' => 'Wednesday',
                    'Thursday' => 'Thursday',
                    'Friday' => 'Friday',
                    'Saturday' => 'Saturday',
                    'Sunday' => 'Sunday'
                ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                ->label("Schedule")
                ->visible(auth()->user()=="admin"),

                Tables\Actions\ViewAction::make()
                ->label("Details")
                ->visible(fn ($record) => $record->status == 'Taken'),
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
                Section::make('Schedule Information')
                    ->schema([
                        TextEntry::make('building')->label('Building:')->weight('bold'),
                        TextEntry::make('room_number')->label('Number:')->weight('bold'),
                        TextEntry::make('day')->label('Day:')->weight('bold'),
                        TextEntry::make('time')->label('Time:')->weight('bold'),
                    ])->columns(2),
                    Section::make('Course Information')
                    ->schema([
                        TextEntry::make('subject.subject_code')->label('Course Code:')->weight('bold'),
                        TextEntry::make('subject.units')->label('Subject Unit:')->weight('bold'),
                    ])->columns(2)
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
            'index' => Pages\ListSchedules::route('/'),
            // 'create' => Pages\CreateSchedule::route('/create'),
            // 'edit' => Pages\EditSchedule::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        if(auth()->user()->hasRole('admin'))
        {
            return true;
        }
       return false;
    }

    public static function getNavigationBadge(): ?string
    {
        return number_format(static::getModel()::count());
    }
    
}
