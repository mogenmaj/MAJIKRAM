<?php

namespace App\Filament\Resources;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Resources\RoomcategoryResource\Pages;
use App\Filament\Resources\RoomcategoryResource\RelationManagers;
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

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
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
            'index' => Pages\ListRoomcategories::route('/'),
            'create' => Pages\CreateRoomcategory::route('/create'),
            'edit' => Pages\EditRoomcategory::route('/{record}/edit'),
        ];
    }
}
