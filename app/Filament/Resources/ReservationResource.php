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
use App\Models\Room;

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
    public static function getLabel(): string
    
    {
        return __('reservation');
    }
    public static function getNavigationLabel(): string
    
    {
        return __('reservation');
    }
    protected static ?string $navigationGroup= 'System Management';

    protected static ?string $navigationIcon = 'heroicon-o-pencil-square';
    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            DatePicker::make('start_date')
            ->label('Start Date')
            ->required()
            ->live()
            ->native(false),
        DatePicker::make('end_date')
            ->label('End Date')
            ->required()
            ->live()
            ->native(false),
           
             MultiSelect::make('rooms')
                ->label('Rooms')
                ->options(function (callable $get) {
                    $startDate = $get('start_date');
                    $endDate = $get('end_date');
                    $currentRecordId = request()->route('recordId');
            
                    if ($startDate && $endDate) {
                        // Fetch available rooms based on the selected date range
                        $availableRooms = Room::whereDoesntHave('reservations', function ($query) use ($startDate, $endDate) {
                            $query->where('start_date', '<', $endDate)
                                  ->where('end_date', '>', $startDate);
                        });
            
                        // Exclude the current room ID if editing
                        if ($currentRecordId) {
                            $availableRooms = $availableRooms->where('id', '!=', $currentRecordId);
                        }
            
                        $availableRooms = $availableRooms->pluck('room_number', 'id');
            
                        return $availableRooms;
                    }
            
                    return [];
                })
                ->required(),
            
           
                Select::make('client_id')
                ->label('Client')
                ->relationship('client', 'first_name')
                ->required(),

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
