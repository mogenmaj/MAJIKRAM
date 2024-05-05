<?php

namespace App\Filament\Resources\RoomcategoryResource\Pages;

use App\Filament\Resources\RoomcategoryResource;
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
