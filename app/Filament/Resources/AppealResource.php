<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AppealResource\Pages;
use App\Filament\Resources\AppealResource\RelationManagers;
use App\Models\Appeal;
use Filament\Actions\EditAction;
use Filament\Forms;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\TextInput;
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
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Actions\EditAction as UseEdit;







class AppealResource extends Resource
{
    protected static ?string $model = Appeal::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('remarks')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordClasses(fn (Appeal $record) => match ($record->viewed) {
                'read' => 'opacity-60 ',
                'unread' => 'border-s-2 border-orange-600 dark:border-orange-300',
                default => null,
            })
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
                Action::make('Remarks')
                ->form([
                    TextInput::make('remarks')->required(), // sa form baby eto pag inenter na sasave sa $data na array 
                    // tapos papasa mo dun sa action
                ])
                ->action(function (Appeal $appeal, array $data): void{
                    $appeal->remarks = $data['remarks']; // tapos inaccess ko lang yung model ko na column remarks tapos 
                                                        // pinasa yung napasok sa form tapos save
                    $appeal->save();
                    return;
                }),
                Tables\Actions\ViewAction::make()
                ->label("View"),

                Action::make("Mark as read")
                ->label(fn(Appeal $appeal): string => match ($appeal->viewed){
                    'unread' => 'Mark as Read',
                    'read' => 'Mark as Unread',
                })
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
            // 'edit' => Pages\EditAppeal::route('/{record}/edit'),
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

    public static function getNavigationBadge(): ?string
    {
        if(auth()->user()->hasRole('admin')) {
            return number_format(static::getModel()::count());
        }
        else{
        $count = static::getModel()::where('user_id', auth()->id())->count();
        return number_format($count);
        }
    }
}

