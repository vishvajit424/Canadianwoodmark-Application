<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materials=Material::orderBy('id')->get();
       return view('settings.materials',compact('materials'));
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
       $material=Material::create([
            "name"=>$request->material_name,
            "slug"=>$request->material_slug,
        ]);
        return redirect()->back()->with('success', 'New Material created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Material $material)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Material $material)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Material $material)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Material $material,$id)
    {
        $materials = Material::findOrFail($id);
        $materials->delete();
        return redirect()->route('materials')->with('success', 'Material deleted successfully.');
    }
}
