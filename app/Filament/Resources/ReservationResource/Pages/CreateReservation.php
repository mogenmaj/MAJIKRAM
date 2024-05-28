<?php

namespace App\Filament\Resources\ReservationResource\Pages;

use App\Filament\Resources\ReservationResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Models\Reservation;
use Filament\Notifications\Notification;


class CreateReservation extends CreateRecord
{
    protected static string $resource = ReservationResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function beforeCreate(): void
    {
        //dd($this->data);
        $recipient = auth()->user();
       
      

        $startDate = $this->data['start_date'];
        $endDate = $this->data['end_date'];
        $roomIds = $this->data['room_ids'];
        foreach ($roomIds as $roomId) { 

            if ($this->isRoomReserved($roomId, $startDate, $endDate)) {
               // dd('One of the rooms is already reserved for the selected period.');
             

                Notification::make()
                ->title('One of the rooms is already reserved for the selected period.')
                ->danger()
                ->send();
                $this->halt();
            }

        }
    }

    private function isRoomReserved($roomId, $startDay, $endDay)
    {
        return Reservation::whereHas('rooms', function ($query) use ($roomId, $startDay, $endDay) {
            $query->where('room_id', $roomId)
                  ->where(function ($query) use ($startDay, $endDay) {
                      $query->whereBetween('start_date', [$startDay, $endDay])
                            ->orWhereBetween('end_date', [$startDay, $endDay])
                            ->orWhereRaw('? BETWEEN start_date AND end_date', [$startDay])
                            ->orWhereRaw('? BETWEEN start_date AND end_date', [$endDay]);
                  });
        })->exists();
    }
    
}
