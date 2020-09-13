<?php

namespace App\Http\Controllers;

use App\Horses;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class HorsesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $horses = Horses::orderBy('name')->get();
        return view('horses.index', compact('horses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('horses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'runs'=>'required',
            'wins'=>'required',
            'about'=>'required'
        ]);

        $horse = new Horses([
            'name'=> $request->get('name'),
            'runs'=> $request->get('runs'),
            'wins'=> $request->get('wins'),
            'about'=> $request->get('about')
        ]);

        $horse->save();

        return redirect('/horses')->with('success', 'Pridėtas naujas žirgas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Horses  $horses
     * @return \Illuminate\Http\Response
     */
    public function show(Horses $horses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Horses  $horses
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $horse = Horses::find($id);
        return view('horses.edit', compact('horse'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Horses  $horses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'runs'=>'required',
            'wins'=>'required',
            'about'=>'required'
        ]);

        $horse = Horses::find($id);

        $horse->name = $request->get('name');
        $horse->runs = $request->get('runs');
        $horse->wins = $request->get('wins');
        $horse->about = $request->get('about');

        $horse->save();

        return redirect('/horses')->with('success', 'Žirgo informacija atnaujinta!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Horses  $horses
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $horse = Horses::find($id);
            $horse->delete();
        }
        catch (QueryException $e) {
            return redirect('/horses')->with('error', 'Negali būti ištrintas! Nes turi aktyvių lažybininkų!');
        }
        return redirect('/horses')->with('success', 'Žirgas ištrintas iš sąrašo!');
    }

}