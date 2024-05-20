<?php

namespace App\Filament\Resources;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
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
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL; // Add this at the top of your file
use App\Services\AppealsExportService;
use Filament\Notifications\Collection as NotificationsCollection;
use Filament\Tables\Actions\BulkAction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Response;
use PhpParser\ErrorHandler\Collecting;

class AppealResource extends Resource
{
    protected static ?string $model = Appeal::class;
    protected static ?string $recordTitleAttribute = 'subject';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'Subject' => $record->subject,
            'Message' => $record->message,
            'Time' => $record->created_at,
        ];
    }


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
            ->recordClasses(fn (?Appeal $record) => match ($record?->viewed) {
                'read' => 'opacity-60',
                'unread' => 'border-s-2 border-orange-600 dark:border-orange-300',
                default => null,
            })
            ->columns([
                Tables\Columns\TextColumn::make('student.student_no')
                    ->label("Student Number")->badge()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('student.plm_email')
                    ->label("PLM Email")
                    ->sortable()
                    ->searchable()
                    ->wrap(),
                Tables\Columns\TextColumn::make('subject')
                    ->sortable()
                    ->searchable()
                    ->wrap(),
                Tables\Columns\TextColumn::make('filepath')
                    ->label("File")
                    ->formatStateUsing(fn (?Appeal $record) => $record && $record->filepath ? 'Attachment' : null)
                    ->icon(fn (?Appeal $record) => $record && $record->filepath ? 'heroicon-o-paper-clip' : null)
                    ->color(fn (?Appeal $record) => $record && $record->filepath ? 'primary' : null)
                    ->url(fn (?Appeal $record) => $record && $record->filepath ? URL::to(Storage::url(ltrim($record->filepath, '/storage/'))) : null)
                    ->openUrlInNewTab()
                    ->extraAttributes([
                        'class' => 'text-blue-500',
                ]),
                Tables\Columns\TextColumn::make('viewed')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color(fn (?string $state): string => match ($state) {
                        'unread' => 'warning',
                        'read' => 'success',
                    }),
                    Tables\Columns\TextColumn::make('created_at')
                    ->sortable()
                    ->searchable()
                    ->date('Y-m-d')
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
                        TextInput::make('remarks')->required(),
                    ])
                    ->icon('heroicon-o-chat-bubble-left')
                    ->action(function (Appeal $appeal, array $data): void {
                        $appeal->remarks = $data['remarks'];
                        $appeal->save();
                    }),
                    Tables\Actions\ViewAction::make()
                    ->label('View')
                    ->color('warning'),
                Action::make("Mark as read")
                    ->label(fn (Appeal $appeal): string => match ($appeal->viewed) {
                        'unread' => 'Read',
                        'read' => 'Unread',
                    })
                    ->icon('heroicon-o-document-check')
                    ->color('black')
                    ->action(function (Appeal $appeal, array $data): void {
                        if ($appeal->viewed == "read") {
                            $appeal->viewed = "unread";
                        } else {
                            $appeal->viewed = "read";
                        }
                        $appeal->save();
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make(array_filter([
                    // Conditionally add the delete action
                    Auth::check() && Auth::user()->hasRole('admin') ? Tables\Actions\DeleteBulkAction::make() : null,
    
                    BulkAction::make('export')
                        ->label('Export to Excel')
                        ->color('success')
                        ->icon('heroicon-o-arrow-down-tray')
                        ->action(function (Collection $records) {
                            $ids = $records->pluck('id')->toArray();
                            $exportService = new AppealsExportService();
                            $fileName = $exportService->export($ids);
                            $filePath = storage_path('app/' . $fileName);
                            return Response::download($filePath)->deleteFileAfterSend(true);
                        }),
                ])), // Use array_filter to remove null values
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
                    ])->columns(1),
                InfoSec::make('Attachment')
                    ->schema([
                        TextEntry::make('filepath')
                            ->label('File Attachment')
                            ->url(fn (?Appeal $record) => $record && $record->filepath ? URL::to(Storage::url(ltrim($record->filepath, '/storage/'))) : null)
                            ->openUrlInNewTab()
                            ->hidden(fn (?Appeal $record) => $record === null || empty($record->filepath)),
                    ])->columns(1),
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

