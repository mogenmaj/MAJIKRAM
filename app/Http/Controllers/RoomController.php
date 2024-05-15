<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Reservation;
use App\Models\Roomcategory;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index(){
        $rooms = Room::all();
        $categories = Roomcategory::all();

        return view('index', compact('rooms', 'categories'));
    }



    public function search(Request $request){

        $query = Reservation::with('rooms');

        if ($request->has('start_date')) {
            $query->where('start_date', '>=', $request->input('start_date'));
        }
    
        if ($request->has('end_date')) {
            $query->where('end_date', '<=', $request->input('end_date'));
        }
    
        if ($request->has('category')) {

            $query->whereHas('rooms', function ($q) use ($request) {
                $q->where('category_id', $request->input('category'));
            });
        }
    
        $reservations = $query->get();

        dd($reservations);
    }
}
