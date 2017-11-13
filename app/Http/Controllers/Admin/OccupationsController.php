<?php

namespace App\Http\Controllers\Admin;

use App\Room;
use App\Client;
use App\Occupation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\OccupationForm;

class OccupationsController extends Controller
{
    public function index()
    {
        return view('admin.occupations.index', [
            'occupations' => Occupation::with('client', 'room.type')->get()
        ]);
    }

    public function create()
    {
        return view('admin.occupations.create', [
            'rooms' => Room::with('type')->get()->sortBy('room_type_id'),
            'clients' => Client::latest()->get()
        ]);
    }

    public function store(OccupationForm $request)
    {
        $occupation = new Occupation;
        $occupation->create($request->all());

        $room = Room::find($request['room_id']);
        $client = Client::find($request['client_id']);

        flash("Ajout occupation de la chambre <b>{$room->fullName()}</b> par <u><b>{$client->fullName()}</b></u>");

        return redirect()->route('occupations.index');
    }

    public function show($id)
    {
        return Occupation::findOrFail($id);
    }

    public function edit($id)
    {
        $occupation = Occupation::findOrFail($id);

        return view('admin.occupations.edit', [
            'occupation' => $occupation,
            'clients'    => Client::all(),
            'rooms'      => Room::all()->load('type')
        ]);
    }

    public function update(OccupationForm $request, $id)
    {
        $occupation = Occupation::findOrFail($id);
        $occupation->update($request->all());

        return redirect()->route('occupations.index');
    }

    public function destroy($id)
    {
        $occupation = Occupation::findOrFail($id);
        $occupation->update([
            'to_date' => now(),
            'active' => 0
        ]);

        flash("Occupation de la chambre <b>{$occupation->room->fullName()}</b> stoppée.")->warning();

        return redirect()->back();
    }
}
