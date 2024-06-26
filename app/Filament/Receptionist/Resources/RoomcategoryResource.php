<?php

namespace App\Filament\Receptionist\Resources;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Receptionist\Resources\RoomcategoryResource\Pages;
use App\Filament\Receptionist\Resources\RoomcategoryResource\RelationManagers;
use App\Models\Roomcategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RoomcategoryResource extends Resource
{
    protected static ?string $model = Roomcategory::class;
    public static function getLabel(): string
    {
        return __('roomcategory');
    }
    public static function getNavigationLabel(): string
    {
        return __('roomcategory');
    }

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('label'),
                TextColumn::make('created_at')->date(),
                TextColumn::make('updated_at')->date(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
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
            'index' => Pages\ListRoomcategories::route('/'),
            'create' => Pages\CreateRoomcategory::route('/create'),
            'edit' => Pages\EditRoomcategory::route('/{record}/edit'),
        ];
    }
}
