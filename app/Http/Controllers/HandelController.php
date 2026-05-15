<?php

namespace App\Http\Controllers;

use App\Models\Handel;
use Illuminate\Http\Request;

class HandelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $handels=Handel::orderBy('id')->get();
       return view('settings.handels',compact('handels'));
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
        $handel=Handel::create([
            "name"=>$request->handel_name,
            "slug"=>$request->handel_slug,
        ]);
        return redirect()->back()->with('success', 'New Handel created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Handel $handel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Handel $handel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Handel $handel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Handel $handel,$id)
    {
        $handels = Handel::findOrFail($id);
        $handels->delete();
        return redirect()->route('handels')->with('success', 'Handel deleted successfully.');
    }
}
