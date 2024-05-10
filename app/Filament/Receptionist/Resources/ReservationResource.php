<?php

namespace App\Filament\Receptionist\Resources;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Receptionist\Resources\ReservationResource\Pages;
use App\Filament\Receptionist\Resources\ReservationResource\RelationManagers;
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
                DatePicker::make('start_date')->native(false),
                DatePicker::make('end_date')->native(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'), 
                TextColumn::make('start_date')->date()->searchable()->toggleable()->sortable(),
                TextColumn::make('end_date')->date()->searchable()->toggleable()->sortable(),
                TextColumn::make('created_at')->date()->searchable()->toggleable()->sortable(),
                TextColumn::make('updated_at')->date()->searchable()->toggleable()->sortable(),
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
