<?php

namespace App\Filament\Resources\ReceptionistResource\Pages;

use App\Filament\Resources\ReceptionistResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListReceptionists extends ListRecords
{
    protected static string $resource = ReceptionistResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
