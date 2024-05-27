<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;

Route::get('/generate-pdf', [PdfController::class, 'generatePdf']);

Route::get('/', [RoomController::class, 'index'])->name('index');

Route::get('about', function (Request $request) {
    return view('about');
})->name('about');

Route::get('contact', function (Request $request) {
    return view('contact');
})->name('contact');


Route::get('rooms', [RoomController::class, 'all_rooms'])->name('rooms');


Route::get('restaurant', function (Request $request) {
    return view('restaurant');
})->name('restaurant');

Route::get('blog', function (Request $request) {
    return view('blog');
})->name('blog');

Route::get('room', function (Request $request) {
    return view('room');
})->name('room-single');


Route::post('search', [RoomController::class, 'search'])->name('search');