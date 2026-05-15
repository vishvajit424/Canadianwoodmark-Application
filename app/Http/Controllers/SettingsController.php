<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $settings=Settings::findorfail('1');
        return view('settings',compact('settings'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Settings $settings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Settings $settings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Settings $settings,$id)
    {
        //
        $settings = $settings::findOrFail($id);
        $request->validate([
            'title'        => 'required|string|max:255',
            'short_title'  => 'required|string|max:255',
            'site_email'        => 'required|email',
        ]);
        $settings->update([
            'title' => $request->title,
            'short_title' =>$request->short_title,
            'email'=>$request->site_email,

        ]);
        if ($request->hasFile('profile_image')) {

                if ($settings->profile_image) {
                    Storage::disk('public')->delete($user->profile_image);
                }

                $path = $request->file('profile_image')->store('profiles', 'public');

                $settings->update(['logo' => $path]);
            }
        return redirect()->back()->with('success', 'Settings updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Settings $settings)
    {
        //
    }
}
