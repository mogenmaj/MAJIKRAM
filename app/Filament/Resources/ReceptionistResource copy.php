<?php

namespace App\Filament\Resources;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Select;
use App\Filament\Resources\ReceptionistResource\Pages;
use App\Filament\Resources\ReceptionistResource\RelationManagers;
use App\Models\Receptionist;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReceptionistResource extends Resource
{
    protected static ?string $model = Receptionist::class;
    public static function getNavigationLabel(): string
    {
        return __('receptionist');
    }
    protected static ?string $navigationGroup= 'Employee Management';
    protected static ?string $navigationIcon = 'heroicon-o-users';
    public static function form(Form $form): Form
    {
        return $form
                    ->schema([
                        TextInput::make('first_name')->required()->label('First Name'),
TextInput::make('last_name')->required()->label('Last Name'),
Select::make('user_id')
    ->options(function (): array {
        return User::all()->pluck('name', 'id')->all();
    }),
DatePicker::make('birth_date')->required()->label('Date of Birth'),
TextInput::make('phone')->required()->label('Phone'),
TextInput::make('email')->required()->label('Email'),
TextInput::make('address')->required()->label('Address'),
DatePicker::make('hire_date')->required()->label('Hire Date'),
ToggleButtons::make('employment_status')->inline()->options([
    'full_time' => 'Full Time',
    'part_time' => 'Part Time',
])->label('Employment Status'),
                        
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'), 
                TextColumn::make('user_id')->searchable()->toggleable()->sortable(),
                TextColumn::make('first_name')->searchable()->toggleable()->sortable(),
                TextColumn::make('last_name')->searchable()->toggleable()->sortable(),
                TextColumn::make('birth_date')->searchable()->toggleable()->sortable(),
                TextColumn::make('phone')->searchable()->toggleable()->sortable(),
                TextColumn::make('email')->searchable()->toggleable()->sortable(),
                TextColumn::make('address')->searchable()->toggleable()->sortable(),
                TextColumn::make('hire_date')->searchable()->toggleable()->sortable(),
                TextColumn::make('employment_status')->searchable()->toggleable()->sortable(),
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
            'index' => Pages\ListReceptionists::route('/'),
            'create' => Pages\CreateReceptionist::route('/create'),
            'edit' => Pages\EditReceptionist::route('/{record}/edit'),
        ];
    }
}
