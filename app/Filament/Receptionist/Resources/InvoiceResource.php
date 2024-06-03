<?php

namespace App\Filament\Receptionist\Resources;
use App\Enums\PaymentType;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Filament\Receptionist\Resources\InvoiceResource\Pages;
use App\Filament\Receptionist\Resources\InvoiceResource\RelationManagers;
use App\Models\Invoice;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;

use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

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

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                DatePicker::make('created_at')->native(false),
                DatePicker::make('updated_at')->native(false),
                TextInput::make('amount')->required()->label('Amount'),
                TextInput::make('payment_type')->required()->label('Payment_type'),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'), 
                TextColumn::make('amount')->searchable()->toggleable()->sortable(),
                TextColumn::make('payment_type')->badge()->searchable()->toggleable()->sortable(),
                TextColumn::make('created_at')->date()->searchable()->toggleable()->sortable(),
                TextColumn::make('updated_at')->date()->searchable()->toggleable()->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Action::make('exportPDF')
                ->label('Export PDF')
                ->icon('heroicon-o-arrow-down-tray')
                ->action(function($record){

                    $reservation = $record->reservation;
                    // Calculate the total amount
    $startDate = new \DateTime($reservation->start_date);
    $endDate = new \DateTime($reservation->end_date);
    $interval = $startDate->diff($endDate);
    $days = $interval->days;

    $totalAmount = 0;

    // Query rooms and calculate the total amount
    //$rooms = Room::whereIn('id', $data['rooms'])->get();
    //foreach ($rooms as $room) {
     //   $totalAmount += $days * $room->price;
    //}

  // Generate the PDF
  $pdf = PDF::loadView('pdf_template', [
    'invoice' => $record,
]);
  return response()->streamDownload(function () use ($pdf) {
    echo $pdf->stream();
    }, 'name.pdf');

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
        ];
    }
}
