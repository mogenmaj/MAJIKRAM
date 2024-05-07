<?php

namespace App\Filament\Receptionist\Resources\RoomcategoryResource\Pages;

use App\Filament\Receptionist\Resources\RoomcategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRoomcategories extends ListRecords
{
    protected static string $resource = RoomcategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
