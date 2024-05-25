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



    public function search(Request $request){

        
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $category = $request->category;

        
        // Parse the date using Carbon to ensure proper formatting
        $parsed_start_date = Carbon::parse($start_date)->startOfDay();
        $parsed_end_date = Carbon::parse($end_date)->endOfDay();


        $reservations = Reservation::with(['rooms.category'])
            ->where('start_date', '>=', $parsed_start_date)
            ->where('end_date', '<=', $parsed_end_date)
            ->whereHas('rooms', function ($query) use ($category) {
                $query->where('category_id', $category);
        })
            ->get();

        // dd($reservations);
        
        return view('search', compact('reservations') );


    }


    public function all_rooms() {
        $rooms = Room::all();
        $categories = Roomcategory::all();

        return view('rooms', compact('rooms', 'categories'));
    }
}
