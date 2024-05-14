<?php

namespace App\Filament\Resources;
use App\Enums\PaymentType;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Resources\InvoiceResource\Pages;
use App\Filament\Resources\InvoiceResource\RelationManagers;
use App\Models\Invoice;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InvoiceResource extends Resource
{
    protected static ?string $model = Invoice::class;
    public static function getNavigationLabel(): string
    {
        return __('invoice');
    }
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('amount')->required()->numeric()->suffix('MAD'),
                                Forms\Components\ToggleButtons::make('payment_type')->inline()->options(PaymentType::class),
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
