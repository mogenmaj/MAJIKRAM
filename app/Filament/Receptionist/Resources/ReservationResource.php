<?php

namespace App\Filament\Receptionist\Resources;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Reservation;
use Filament\Resources\Resource;
use App\Models\Room;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\MultiSelect;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Receptionist\Resources\ReservationResource\Pages;
use App\Filament\Receptionist\Resources\ReservationResource\RelationManagers;

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

    protected static ?string $navigationIcon = 'heroicon-o-pencil-square';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            
                    Select::make('client_id')
                        ->label('Client')
                        ->relationship('client', 'first_name')
                        ->required(),
                    MultiSelect::make('rooms')
                        ->label('Rooms')
                        ->options(function (callable $get) {
                            $startDate = $get('start_date');
                            $endDate = $get('end_date');
        
                            if ($startDate && $endDate) {
                                // Fetch available rooms based on the selected date range
                                $availableRooms = Room::whereDoesntHave('reservations', function ($query) use ($startDate, $endDate) {
                                    $query->where('start_date', '<', $endDate)
                                          ->where('end_date', '>', $startDate);
                                })->pluck('room_number', 'id');
        
                             
        
                                return $availableRooms;
                            }
        
                            return [];
                        })
                        ->required(),
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
