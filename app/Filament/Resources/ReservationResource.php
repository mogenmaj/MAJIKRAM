<?php

namespace App\Filament\Resources;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Multiselect;

use App\Filament\Resources\ReservationResource\Pages;
use App\Filament\Resources\ReservationResource\RelationManagers;
use App\Models\Reservation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReservationResource extends Resource
{
    protected static ?string $model = Reservation::class;
    public static function getNavigationLabel(): string
    {
        return __('reservation');
    }

    protected static ?string $navigationIcon = 'heroicon-o-pencil-square';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('client_id')
                ->label('client')
                ->relationship('client','first_name')
                ->required(),
                Multiselect::make('room_ids')
                ->label('rooms')
                ->relationship('rooms','room_number'),
                DatePicker::make('start_date')->native(false),
                DatePicker::make('end_date')->native(false),
                    ]);
    }

    public static function table(Table $table): Table
    {

        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('Client.first_name')->label('client') ,
                TextColumn::make('start_date')->date()->searchable()->toggleable()->sortable(),
                TextColumn::make('end_date')->date()->searchable()->toggleable()->sortable(),
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
            'index' => Pages\ListReservations::route('/'),
            'create' => Pages\CreateReservation::route('/create'),
            'edit' => Pages\EditReservation::route('/{record}/edit'),
        ];
    }
}
