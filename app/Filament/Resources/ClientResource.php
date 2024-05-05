<?php

namespace App\Filament\Resources;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Resources\ClientResource\Pages;
use App\Filament\Resources\ClientResource\RelationManagers;
use App\Models\Client;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ClientResource extends Resource
{
    protected static ?string $model = Client::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                DatePicker::make('created_at')->native(false),
                DatePicker::make('updated_at')->native(false),
                DatePicker::make('birth_date')->native(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'), 
                TextColumn::make('first_name')->searchable()->toggleable()->sortable(),
                TextColumn::make('last_name')->searchable()->toggleable()->sortable(),
                TextColumn::make('birth_date')->date()->searchable()->toggleable()->sortable(),
                TextColumn::make('address')->searchable()->toggleable()->sortable(),
                TextColumn::make('country')->searchable()->toggleable()->sortable(),
                TextColumn::make('city')->searchable()->toggleable()->sortable(),
                TextColumn::make('status')->searchable()->toggleable()->sortable(),
                TextColumn::make('phone')->searchable()->toggleable()->sortable(),
                TextColumn::make('nationality')->searchable()->toggleable()->sortable(),
                TextColumn::make('carte_number')->searchable()->toggleable()->sortable(),
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
            'index' => Pages\ListClients::route('/'),
            'create' => Pages\CreateClient::route('/create'),
            'edit' => Pages\EditClient::route('/{record}/edit'),
        ];
    }
}
