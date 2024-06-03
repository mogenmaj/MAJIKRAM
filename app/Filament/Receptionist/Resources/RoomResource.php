<?php

namespace App\Filament\Receptionist\Resources;
use Filament\Forms;
use Pages\EditRoom;
use App\Models\Room;
use Filament\Tables;
use Pages\ListRooms;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Actions\DeleteAction;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Receptionist\Resources\RoomResource\Pages;
use App\Filament\Receptionist\Resources\RoomResource\RelationManagers;

class RoomResource extends Resource
{
    protected static ?string $model = Room::class;
    public static function getLabel(): string
    {
        return __('room');
    }
     public static function getNavigationLabel(): string
    {
        return __('room');
    }
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('room_number')
                    ->required()
                    ->label('Numéro de chambre')
                    ->reactive()
                    ->afterStateUpdated(function (callable $set, $state) {
                        if ($state < 10) {
                            $floorNumber = 1;
                        } elseif ($state > 10 && $state <= 20) {
                            $floorNumber = 2;
                        } elseif ($state > 20) {
                            $floorNumber = 3;
                        } else {
                            $floorNumber = 1; // Par défaut, au cas où
                        }
                        $set('floor_number', $floorNumber);
                    }),
                
                TextInput::make('floor_number')
                    ->required()
                    ->label('Numéro d\'étage')
                    ->disabled()
                    ->id('floor_number'), // Ajoutez un identifiant ici 
                
            TextInput::make('price')
                ->required()
                ->label('Price'),
            Select::make('category_id')
                ->relationship('category', 'label')
                ->label('Category')
                ->required(),
            ]);
        
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('room_number'),
                TextColumn::make('floor_number'),
                TextColumn::make('category_id'),
                TextColumn::make('price'),
                TextColumn::make('created_at')->date(),
                TextColumn::make('updated_at')->date(),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                ViewAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
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
            'index' => Pages\ListRooms::route('/'),
            'edit' => Pages\EditRoom::route('/{record}/edit'),
        ];
    }
}
