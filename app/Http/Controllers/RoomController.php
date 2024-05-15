<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Roomcategory;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index(){
        $rooms = Room::all();
        $categories = Roomcategory::all();

        return view('index', compact('rooms', 'categories'));
    }
}
