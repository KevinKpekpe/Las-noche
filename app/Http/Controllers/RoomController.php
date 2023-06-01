<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['only'=>['makereservation','confirmreservation']]);
    }
    public function index()
    {
        $rooms = Room::paginate(6);
        return view('index',['rooms' => $rooms]);
    }
    public function show(string $slug,Room $room)	
    {
        $rooms = Room::query()->where('category_id','=',$room->category_id)->get();
        return view('show',['room'=>$room,'rooms'=>$rooms]);
    }
    public function makereservation(string $slug,Room $room){
        return view('reservation',['room'=>$room]);
    }
    public function confirmreservation(Request $request)
    {
        $authed_user = auth()->user();
        $amount = $request->price;
        $authed_user->charge(
            $request->price, $request->payment_method
        );
        $room = $authed_user->reservations()->create(
            [
                'room_id' => $request->room_id,
                'arrivaltime' => $request->arrivaltime,
                'departuretime' => $request->departuretime,
            ]
        );
        return redirect()->route('index')->with('success','reservation reussie');
    }
}
