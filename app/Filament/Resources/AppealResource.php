<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AppealResource\Pages;
use App\Filament\Resources\AppealResource\RelationManagers;
use App\Models\Appeal;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\Section as InfoSec;
use Filament\Infolists\Infolist;
use Illuminate\Support\Facades\DB;
use Filament\Tables\Actions\Action;
use Filament\Tables\Filters\Filter;






class AppealResource extends Resource
{
    protected static ?string $model = Appeal::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('student.student_no')
                ->label("Student Number")->badge()
                ->searchable(),
                Tables\Columns\TextColumn::make('student.plm_email')
                ->label("PLM Email")
                ->searchable(),
                Tables\Columns\TextColumn::make('user.email')
                ->label("Recipient")
                ->searchable(),
                Tables\Columns\TextColumn::make('subject')
                ->searchable(),
                Tables\Columns\TextColumn::make('viewed')
                ->searchable()
                ->badge()
                ->color(fn(string $state): string => match ($state){
                    'unread' => 'warning',
                    'read' => 'success',
                })
            ])
            ->filters([
                Filter::make('Read')
                ->query(fn (Builder $query): Builder => $query->where('viewed', 'read')),

                Filter::make('Unread')
                ->query(fn (Builder $query): Builder => $query->where('viewed', 'unread')),
            ])
            ->actions([
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make()
                ->label("View"),

                Action::make("Mark as read")
                ->action(function (Appeal $appeal, array $data): void{
                    if($appeal->viewed == "read"){
                        $appeal->viewed = "unread";
                        $appeal->save();
                        return;
                    }

                    if($appeal->viewed == "unread"){
                        $appeal->viewed = "read";
                        $appeal->save();
                        return;
                    }
                }),
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
                InfoSec::make("About")
                    ->schema([
                        TextEntry::make('subject'),
                    ])->columns(1),
                    InfoSec::make('Message')
                    ->schema([
                        TextEntry::make('message')
                    ])->columns(1)
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
            'index' => Pages\ListAppeals::route('/'),
            'edit' => Pages\EditAppeal::route('/{record}/edit'),
        ];
    }


    public static function getEloquentQuery(): Builder
    {
        if(auth()->user()->hasRole('admin')) {
            return parent::getEloquentQuery();
            
        } else{
            return parent::getEloquentQuery()->where('user_id', auth()->user()->id);
        }

    }

    public static function canCreate(): bool
    {
       return false;
    }
}

