<?php

namespace App\Filament\Resources\ReservationResource\Pages;

use App\Models\Room;
use Filament\Actions;
use App\Models\Invoice;
use App\Models\Reservation;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\ReservationResource;
use Illuminate\Support\Facades\Redirect;


class CreateReservation extends CreateRecord
{
    protected static string $resource = ReservationResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function handleRecordCreation(array $data): Reservation
    {
        $reservation = Reservation::create($data);
        
        // Calculate the total amount
        $startDate = new \DateTime($reservation->start_date);
        $endDate = new \DateTime($reservation->end_date);
        $interval = $startDate->diff($endDate);
        $days = $interval->days;

        $totalAmount = 0;

        // Query rooms and calculate the total amount
        $rooms = Room::whereIn('id', $data['rooms'])->get();
        foreach ($rooms as $room) {
            $totalAmount += $days * $room->price;
        }
        $invoice=Invoice::create(["reservation_id"=>$reservation->id, "amount"=>$totalAmount ]);

      // Generate the PDF
      $pdf = Pdf::loadView('pdf_template', compact('invoice'));

      // Save the PDF to storage
      $pdfPath = 'invoices/invoice_' . $invoice->id . '.pdf';
      Storage::put($pdfPath, $pdf->output());
      $invoice=Invoice::where('id',$invoice->id)->update( ["path"=>$pdfPath ]);
      return $reservation;
    }
   
    protected function beforeCreate(): void
    {
        //dd($this->data);
        $recipient = auth()->user();
       
      
        $startDate = $this->data['start_date'];
        $endDate = $this->data['end_date'];
        $roomIds = $this->data['rooms'];
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
