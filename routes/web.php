<?php

use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/',[RoomController::class,'index']);
Route::get('/room/{slug}-{room}',[RoomController::class,'show'])->where([
    "room" => '[0-9]+',
    "slug" => '[a-z0-9\-]+'
])->name('show');
Route::get('/room/reservation/{slug}-{room}',[RoomController::class,'makereservation'])->where([
    "room" => '[0-9]+',
    "slug" => '[a-z0-9\-]+'
])->name('reservation');