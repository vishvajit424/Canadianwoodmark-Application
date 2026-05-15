<?php

namespace App\Http\Controllers;

use App\Models\FinishingMaterial;
use Illuminate\Http\Request;

class FinishingMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $finishing_materials=FinishingMaterial::orderBy('id')->get();
        return view('settings.finishing-materials',compact('finishing_materials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $finishing_materials=FinishingMaterial::create([
            "name"=>$request->name,
            "slug"=>$request->slug,
        ]);
        return redirect()->back()->with('success', 'New Finishing Material created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(FinishingMaterial $finishingMaterial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FinishingMaterial $finishingMaterial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FinishingMaterial $finishingMaterial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FinishingMaterial $finishingMaterial,$id)
    {
         $finishing_materials = FinishingMaterial::findOrFail($id);
        $finishing_materials->delete();
        return redirect()->route('finishing.material')->with('success', 'Finishing Material deleted successfully.');
    }
}
