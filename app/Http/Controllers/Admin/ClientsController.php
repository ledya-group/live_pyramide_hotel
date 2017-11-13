<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use Illuminate\Http\Request;
use App\Http\Requests\ClientForm;
use App\Http\Controllers\Controller;

class ClientsController extends Controller
{
    protected $titles;
    
    public function __construct()
    {
        $this->titles = [ 'M.', 'Mme.', 'Mr.', 'Jr.', 'Dr.', 'Prof.' ];
    }

    public function index()
    {
        return view('admin.clients.index', ['clients' => Client::all()]);
    }

    public function create()
    {
        return view('admin.clients.create', [ 'titles' => $this->titles ]);
    }

    public function store(Request $request)
    {
        return $request;
    }

    public function show($id)
    {
        return Client::find($id);
    }

    public function edit($id)
    {
        return view('admin.clients.edit', [
            'client' => Client::findOrFail($id),
            'titles' => $this->titles
        ]);
    }

    public function update(ClientForm $request, $id)
    {
        try {
            $client = Client::findOrFail($id);
            $client->update($request->all());

            flash("Nouvelles données enregistées pour le Client <b>#{$client->id}</b>.")->success();
        } catch (Exception $e) {
            flash('Une erreur est survenue.')->danger();
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Client::find($id);
    }
}
