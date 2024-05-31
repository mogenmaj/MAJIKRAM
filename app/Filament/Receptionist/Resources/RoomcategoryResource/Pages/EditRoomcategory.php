<?php

namespace App\Filament\Receptionist\Resources\RoomcategoryResource\Pages;

use App\Filament\Receptionist\Resources\RoomcategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRoomcategory extends EditRecord
{
    protected static string $resource = RoomcategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }
}
