<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientsController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients=Client::all();
        return view('clients.index',[
            'clients' => $clients
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $client = Client::create([
            'name' => $request->input('name'),
            'age'  => $request->input('age'),
            'adresse' => $request->input('adresse'),
            'sexe' => $request->input('sexe'),
            'date_rendez_vous' => $request->input('date')
        ]);
        return redirect('/client');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('clients.show',
        [
            'client'=>Client::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('clients.edit',
        [
            'client'=>Client::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $client = Client::where('id',$id)
        ->update([
            'name' => $request->input('name'),
            'age'  => $request->input('age'),
            'adresse' => $request->input('adresse'),
            'sexe' => $request->input('sexe'),
            'date_rendez_vous' => $request->input('date')
        ]);
        return redirect('/client');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Client::destroy($id);
        return redirect('/client');
    }
}
