<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departments;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments=Departments::orderBy('id')->get();
        return view('departments',compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $departments=Departments::create([
            "name"=>$request->department_name,
            "slug"=>$request->department_slug,
        ]);
        return redirect()->back()->with('success', 'New Departments created successfully.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Departments $departments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Departments $departments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDepartmentsRequest $request, Departments $departments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Departments $departments,$id)
    {
        $departments = Departments::findOrFail($id);
        $departments->delete();
        return redirect()->route('departments')->with('success', 'Department deleted successfully.');
        //
    }
}
