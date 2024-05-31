<?php

namespace App\Filament\Resources;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
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
    public static function getLabel(): string
    {
        return __('client');
    }
    public static function getNavigationLabel(): string
    {
        return __('client');
    }
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('first_name')->required()->label('First Name'),
                TextInput::make('last_name')->required()->label('Last Name'),
                DatePicker::make('birth_date')->required()->label('Date of Birth'),
                TextInput::make('address')->required()->label('Address'),
                TextInput::make('country')->required()->label('Country'),
                TextInput::make('city')->required()->label('City'),
                ToggleButtons::make('status')->inline()->options([
                    'active' => 'Active',
                    'inactive' => 'Inactive',
                ])->label('Status'),
                TextInput::make('phone')->required()->label('Phone'),
                TextInput::make('nationality')->required()->label('Nationality'),
                TextInput::make('carte_number')->required()->label('Carte Number'),
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
protected static ?string $navigationGroup= 'System Management';
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
