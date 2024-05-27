<?php

namespace App\Filament\Resources;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Resources\RoomResource\Pages;
use App\Models\Room;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\BulkActionGroup;

class RoomResource extends Resource
{
    protected static ?string $model = Room::class;

    public static function getNavigationLabel(): string
    {
        return __('room');
    }

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'System Management';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            TextInput::make('room_number')
                ->required()
                ->label('Room Number'),
            TextInput::make('floor_number')
                ->required()
                ->label('Floor Number')
                ->default(1), // Définir une valeur par défaut pour floor_number
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
                TextColumn::make('category.label'),
                TextColumn::make('price'),
                TextColumn::make('created_at')->date(),
                TextColumn::make('updated_at')->date(),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
                ViewAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
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
            'create' => Pages\CreateRoom::route('/create'),
            'edit' => Pages\EditRoom::route('/{record}/edit'),
        ];
    }
}
