<?php

namespace App\Http\Controllers;

use App\Models\Tape;
use Illuminate\Http\Request;

class TapeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tapes=Tape::orderBy('id')->get();
        return view('settings.tapes',compact('tapes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $material=Tape::create([
            "name"=>$request->tape_name,
            "slug"=>$request->tape_slug,
        ]);
        return redirect()->back()->with('success', 'New Tape created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tape $tape)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tape $tape)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tape $tape)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tape $tape,$id)
    {
        $tape = Tape::findOrFail($id);
        $tape->delete();
        return redirect()->route('handels')->with('success', 'Tape deleted successfully.');
    }
}
