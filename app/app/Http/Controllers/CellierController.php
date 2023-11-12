<?php

namespace App\Http\Controllers;

use App\Models\Cellier;
use Illuminate\Http\Request;

class CellierController extends Controller
{
    public static function randomIcon()
    {
        $list = [
            'cellierbrun.png',
            'cellierjaune.png',
            'cellierjaunefonc‚.png',
            'cellierrose.png',
            'cellierrouge.png',
        ];

        return $list[rand(0, count($list) - 1)];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Cellier::all();

        return view('cellier.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cellier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|max:255',
        ]);
        $validatedData['user_id'] = 1;
        $validatedData['icon'] = self::randomIcon();
        //print_r($validatedData);die();
        Cellier::create($validatedData);
        return redirect()->route('cellier.index')->with('success', 'Cellier créé avec succès!');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Cellier $cellier
     * @return \Illuminate\Http\Response
     */
    public function show(Cellier $cellier)
    {
        return view('cellier.show', compact('cellier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Cellier $cellier
     * @return \Illuminate\Http\Response
     */
    public function edit(Cellier $cellier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Cellier $cellier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cellier $cellier)
    {
        $validatedData = $request->validate([
            'nom' => 'required|max:255',
        ]);
        $validatedData['user_id'] = 1;
        $cellier->update($validatedData);
        return redirect()->route('cellier.index')->with('success', 'Cellier modifié avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Cellier $cellier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cellier $cellier)
    {
        $cellier->delete();
        return redirect()->route('cellier.index')->with('success', 'Cellier supprimé avec succès!');
    }
}
