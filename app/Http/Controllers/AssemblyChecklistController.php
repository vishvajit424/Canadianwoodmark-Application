<?php

namespace App\Http\Controllers;

use App\Models\AssemblyChecklist;
use Illuminate\Http\Request;

class AssemblyChecklistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assembly_checklists=AssemblyChecklist::orderBy('id')->get();
        return view('settings.assembly-checklist',compact('assembly_checklists'));
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
        $assembly_checklists=AssemblyChecklist::create([
            "name"=>$request->name,
            "slug"=>$request->slug,
        ]);
        return redirect()->back()->with('success', 'New Assembly Checklist created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(AssemblyChecklist $assemblyChecklist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AssemblyChecklist $assemblyChecklist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AssemblyChecklist $assemblyChecklist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AssemblyChecklist $assemblyChecklist,$id)
    {
        $assembly_checklists = AssemblyChecklist::findOrFail($id);
        $assembly_checklists->delete();
        return redirect()->route('assembly.checklist')->with('success', 'Assembly Checklist deleted successfully.');
    }
}
