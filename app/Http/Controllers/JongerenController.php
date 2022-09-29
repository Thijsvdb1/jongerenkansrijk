<?php

namespace App\Http\Controllers;

use App\Models\Jongeren;
use Illuminate\Http\Request;

class JongerenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jongeren = jongeren::orderByDesc('start')->paginate(5);

        return view('jongeren.index')->with('jongeren', $jongeren);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jongeren.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $time = new Jongeren([
            'voornaam' => $request->get('voornaam'),
            'tussenvoegsel' => $request->get('tussenvoegsel'),
            'achternaam' => $request->get('achternaam'),

        ]);
        $time->save();

        return redirect('/jongeren')->with('succes', 'Jongeren opgeslagen');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Jongeren $jongeren
     * @return \Illuminate\Http\Response
     */
    public function show(Jongeren $jongeren)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Jongeren $jongeren
     * @return \Illuminate\Http\Response
     */
    public function edit(Jongeren $jongeren)
    {
        return view('jongeren.edit')->with('jongeren', $jongeren);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Jongeren $jongeren
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jongeren $jongeren)
    {
        $jongeren->start = $request->input('voornaam');
        $jongeren->start = $request->input('tussenvoegsel');
        $jongeren->end = $request->input('achternaam');
        $jongeren->save();

        return redirect('/jongeren')->with('succes', 'Jongeren geupdaet!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jongeren = Jongeren::find($id);
        $jongeren->delete();

        return redirect('/jongeren')->with('success', 'Jongeren verwijderd!');
    }
}
