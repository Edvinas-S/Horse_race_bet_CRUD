<?php

namespace App\Http\Controllers;

use App\Betters;
use Illuminate\Http\Request;

class BettersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $betters = Betters::orderBy('bet', 'DESC')->get();
        return view('betters.index', compact('betters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $horses = \App\Horses::orderBy('name')->get();

        return view('betters.create', compact('horses'));
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
            'surname'=>'required',
            'bet'=>'required',
            'horse_id'=>'required'
        ]);

        $better = new Betters([
            'name'=> $request->get('name'),
            'surname'=> $request->get('surname'),
            'bet'=> $request->get('bet'),
            'horse_id'=> $request->get('horse_id')
        ]);

        $better->save();

        return redirect('/betters')->with('success', 'Pridėtas naujas lažybininkas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Betters  $betters
     * @return \Illuminate\Http\Response
     */
    public function show(Betters $betters)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Betters  $betters
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $horses = \App\Horses::orderBy('name')->get();

        $better = Betters::find($id);
        return view('betters.edit', compact('better'), compact('horses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Betters  $betters
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'surname'=>'required',
            'bet'=>'required',
            'horse_id'=>'required'
        ]);

        $better = Betters::find($id);

        $better->name = $request->get('name');
        $better->surname = $request->get('surname');
        $better->bet = $request->get('bet');
        $better->horse_id = $request->get('horse_id');

        $better->save();

        return redirect('/betters')->with('success', 'Lažybininko informacija atnaujinta!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Betters  $betters
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $better = Betters::find($id);
        $better->delete();

        return redirect('/betters')->with('success', 'Lažybininkas ištrintas iš sąrašo!');
    }

}
