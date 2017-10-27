<?php

namespace App\Http\Controllers\Admin;

use App\Room;
use App\RoomType;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRoom;
use App\Http\Requests\UpdateRoom;
use App\Http\Controllers\Controller;

class RoomsController extends Controller
{
    public function index()
    {
        $room_types = RoomType::with('rooms')->latest()->get();
        
        return view('admin.rooms.index', compact('room_types'));
    }

    public function create()
    {
        $room_type_id = request('categorie');
        $room_types   = RoomType::latest()->get();
        
        return view('admin.rooms.create', compact('room_type_id', 'room_types'));
    }

    public function store(StoreRoom $request)
    {
        $room = new Room();
        $room->create($request->all());
        
        return redirect()->route('rooms.index');
    }

    public function edit($id)
    {
        $room = Room::findOrFail($id);
        $room_types = RoomType::latest()->get();

        return view('admin.rooms.edit', compact('room', 'room_types'));
    }

    public function update(UpdateRoom $request, $id)
    {
        $room = Room::findOrFail($id);
        $room->update($request->all());

        return redirect()->route('rooms.index');
    }

    public function destroy($id)
    {
        // (Room::findOrFail($id))->delete();

        $room = Room::findOrFail($id);
        $room->delete();

        flash("La chambre <b>{$room->name}</b> a été supprimé avec succés.");

        return redirect()->route('rooms.index');
    }
}
