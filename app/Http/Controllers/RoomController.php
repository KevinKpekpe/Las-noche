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
        $rooms = Room::where('etat', 1)
                    ->paginate(10);
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
        $amount = intval($request->price) * 100;
        $authed_user->charge(
            $amount, $request->payment_method
        );
        $room = $authed_user->reservations()->create(
            [
                'room_id' => $request->room_id,
                'arrivaltime' => $request->arrivaltime,
                'departuretime' => $request->departuretime,
            ]
        );
        $roomid = Room::find($request->room_id);
        $roomid->update(['etat'=> 0]);
        return redirect()->route('welcome')->with('success','reservation reussie');
    }
}
