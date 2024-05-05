<?php

namespace App\Filament\Resources\ReceptionistResource\Pages;

use App\Filament\Resources\ReceptionistResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditReceptionist extends EditRecord
{
    protected static string $resource = ReceptionistResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
