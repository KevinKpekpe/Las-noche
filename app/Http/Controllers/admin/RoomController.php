<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RommRequest;
use App\Models\Category;
use App\Models\Room;
use App\Models\Specificity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    public function index(){
        return view('admin.index',['rooms'=>Room::paginate(5)]);
    }
    public function create(){
        $room = new Room();
        return view('admin.rooms.form',[
            'rooms'=>$room,
            'categories'=>Category::select('id','name')->get(),
            'specificities'=>Specificity::select('id','name')->get()
        ]);
    }
    public function store(RommRequest $request)
    {
        $room = Room::create($this->extractData(new Room(),$request));
        $room->specificities()->sync($request->validated('specificities'));
        return redirect()->route('admin.room.show',['slug' => $room->slug, 'room' => $room->id])->with('success',"L'article a été inseré avec succès");
    }
    private function extractData(Room $room,RommRequest $request):array
    {
        $data = $request->validated();
        /** @var UploadedFile|null $image */
        $image = $request->validated('image');
        if($image === null || $image->getError()){
            return $data;
        }
        if($room->image ){
            Storage::disk('public')->delete($room->image);
        }
        $data['image'] = $image->store('images','public');
        return $data;
    }
}
