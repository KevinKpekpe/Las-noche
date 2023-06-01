<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/room',[RoomController::class,'index']);
Route::get('/room/{slug}-{room}',[RoomController::class,'show'])->where([
    "room" => '[0-9]+',
    "slug" => '[a-z0-9\-]+'
])->name('show');
Route::get('/room/reservation/{slug}-{room}',[RoomController::class,'makereservation'])->where([
    "room" => '[0-9]+',
    "slug" => '[a-z0-9\-]+'
])->name('reservation');
Route::post('/room/reservation',[RoomController::class,'confirmreservation'])->name('validatereservation');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
