<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;

Route::get('/', [RoomController::class, 'index'])->name('index');

Route::get('about', function (Request $request) {
    return view('about');
})->name('about');

Route::get('contact', function (Request $request) {
    return view('contact');
})->name('contact');

Route::get('rooms', function (Request $request) {
    return view('rooms');
})->name('rooms');

Route::get('restaurant', function (Request $request) {
    return view('restaurant');
})->name('restaurant');

Route::get('blog', function (Request $request) {
    return view('blog');
})->name('blog');

Route::get('room', function (Request $request) {
    return view('room');
})->name('room-single');


