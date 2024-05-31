<?php

namespace App\Filament\Resources;
use Filament\Forms;
use Filament\Tables;
use App\Models\Invoice;
use Filament\Forms\Form;
use App\Enums\PaymentType;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\InvoiceResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\Action;
use App\Filament\Resources\InvoiceResource\RelationManagers;

class InvoiceResource extends Resource
{
    protected static ?string $model = Invoice::class;
    public static function getLabel(): string
    {
        return __('invoice');
    }
    public static function getNavigationLabel(): string
    {
        return __('invoice');
    }
    protected static ?string $navigationGroup= 'System Management';

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('amount')->required()->numeric()->suffix('MAD'),
                                Forms\Components\ToggleButtons::make('payment_type')->inline()->options(PaymentType::class),
                                Select::make('reservation_id')
                                ->label('reservation')
                                ->relationship('reservation','start_date'), 
                            ]);
                                
    }

    public static function table(Table $table): Table
    {
        return $table
        ->groups(['payment_type'])
            ->columns([
                TextColumn::make('id'), 
                TextColumn::make('amount')->searchable()->toggleable()->sortable(),
                TextColumn::make('payment_type')->badge()->searchable()->toggleable()->sortable(),
                           ])
            ->filters([
                //
            ])
            ->actions([
                Action::make('exportPDF')
                    ->label('Export PDF')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->action(function($record){
                        $pdfPath = $record->path;
                        $pdfFilename = basename($pdfPath);

                        return response()->download(storage_path('app/' . $pdfPath), $pdfFilename);
                                      }),
                
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),               
                Tables\Actions\ViewAction::make(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInvoices::route('/'),
            'create' => Pages\CreateInvoice::route('/create'),
            'edit' => Pages\EditInvoice::route('/{record}/edit'),
        ];
    }
}
