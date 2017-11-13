<?php

namespace App\Http\Controllers\Admin;

use App\RoomType;
use Illuminate\Http\Request;
use App\Http\Requests\RoomTypeForm;
use App\Http\Controllers\Controller;

class RoomTypesController extends Controller
{
    public function create()
    {
        return view('admin.room_types.create');
    }

    public function store(RoomTypeForm $request)
    {
        $roomType = new RoomType();
        $roomType->create($request->all());

        flash("Catégorie créée avec succés")->success();

        return redirect()->route('rooms.index');
    }

    public function edit($id)
    {
        $roomType = RoomType::findOrFail($id);
        
        return view('admin.room_types.edit', compact('roomType'));
    }

    public function update(RoomTypeForm $request, $id)
    {
        $roomType = RoomType::findOrFail($id);
        $roomType->update($request->all());

        flash('La catégorie a été modifié')->success();

        return redirect()->route('rooms.index');
    }

    public function destroy($id)
    {
        $roomType = RoomType::findOrFail($id);

        $roomType->rooms()->delete();
        $roomType->delete();

        flash("La catégorie '{$roomType->name}' a été supprimé avec succés.");

        return redirect()->back();
    }
}
