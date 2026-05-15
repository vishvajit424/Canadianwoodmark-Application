<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request,$user_id)
    {
        
         $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name'  => 'nullable|string|max:255',
        'phone'      => 'nullable|string|max:20',
        'address'    => 'nullable|string|max:255',
        'department' => 'nullable|string|max:100',
        'bio'        => 'nullable|string',
        ]);
        $user = User::find($user_id);
        $user->update([
            'email' => $request->email, 
        ]);
        $UserDetails = UserDetails::where('user_id', $user_id)->firstOrFail();
        $UserDetails->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'address' => $request->address,
            'department' => $request->department,
            'bio' => $request->bio,
        ]);
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
    public function updateImage(Request $request,$user_id)
    {

        $request->validate([
        'profile_image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
      
        // Store image
        $path = $request->file('profile_image')->store('profiles', 'public');
        $UserDetails = UserDetails::where('user_id', $user_id)->firstOrFail();
        // Save path to DB (example)
        $UserDetails->update([ 
            'profile_image' => $path,
        ]);
       
        return back()->with('success', 'Image uploaded successfully.');
    }
    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
