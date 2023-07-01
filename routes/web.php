<?php

use App\Http\Controllers\admin\RoomController as AdminRoomController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;

Route::get('/admin',[AdminRoomController::class,'index'])->name('admin.home');
Route::get('/admin/room/form',[AdminRoomController::class,'create'])->name('admin.room.create');
Route::post('/admin/room/create',[AdminRoomController::class,'store'])->name('admin.room.store');
Route::get('/admin/room/edit/{room}',[AdminRoomController::class,'edit'])->name('admin.room.edit');
Route::put('/admin/room/update',[AdminRoomController::class,'update'])->name('admin.room.update');
Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin/room/edit/{slug}-{room}',[RoomController::class,'edit'])->where([
    "room" => '[0-9]+',
    "slug" => '[a-z0-9\-]+'
])->name('admin.room.edit');
Route::get('/room',[RoomController::class,'index'])->name('welcome');
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
