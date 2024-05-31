<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Room;
use App\Models\Reservation;
use App\Models\Roomcategory;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index(){
        $rooms = Room::take(4)->get();
        $categories = Roomcategory::all();

        return view('index', compact('rooms', 'categories'));
    }


    public function search(Request $request)
    {
        $rooms = Room::query()
            ->with('category')
            ->whereDoesntHave('reservations', fn ($query) =>
                $query->where('start_date', '<', $request->start_date)
                    ->where('end_date', '>', $request->end_date)
            )
            ->where('category_id', $request->category)
            ->get();

        return view('search', compact('rooms'));
    }


    public function all_rooms() {
        $rooms = Room::all();
        $categories = Roomcategory::all();

        return view('rooms', compact('rooms', 'categories'));
    }

    public function availableRooms(Request $request)
    {
        $startDate = $request->query('start_date');
        $endDate = $request->query('end_date');
                //dd($startDate);
        $availableRooms = Room::whereDoesntHave('reservations', function ($query) use ($startDate, $endDate) {
            $query->where(function ($query) use ($startDate, $endDate) {
                $query->where('start_date', '<', $endDate)
                      ->where('end_date', '>', $startDate);
            });
        })->get();
        return response()->json($availableRooms->pluck('room_number', 'id'));
    }
}
