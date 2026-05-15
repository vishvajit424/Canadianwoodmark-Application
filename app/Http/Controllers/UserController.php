<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetails;
use App\Models\Roles;
use App\Models\Departments;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //
    public function index()
    {
        $users=User::with('userdetails')->get();

        return view('users',compact('users'));
    }
    public function create(Request $request)
    {
        $departments=Departments::orderBy('id')->get();
        $roles=Roles::orderBy('id')->get();
        return view('createUser',compact('departments','roles'));
    }
    public function store(Request $request)
    {
       // dd($request);
        $email = $request->first_name.'@gmail.com';
        $validated = $request->validate([
        'username'   => 'required|string|max:50',
        'first_name' => 'required|string|max:50',
        'last_name'  => 'required|string|max:50',
        //'email'      => 'required|email|max:255',
        'phone_no'   => 'required|string|min:10|max:15',
        'department' => 'required',
        'role_id' => 'required',
        'bio'     => 'nullable|string|max:1000',
    ]);

         $user=New User();
         $user->name = $request->first_name;
         $user->email = $email;
         $user->password = Hash::make('123456789');
         $user->save();
         $lastSubmission = $user->latest()->first();
         $UserDetails=New UserDetails();
         $UserDetails->user_id = $lastSubmission->id;
         $UserDetails->first_name= $request->first_name;
         $UserDetails->last_name= $request->last_name;
         $UserDetails->phone= $request->phone_no;
         $UserDetails->department_id= $request->department;
         $UserDetails->role_id= $request->role_id;
         $UserDetails->status= '1';
         $user->UserDetails()->save($UserDetails);
         return redirect()->route('create.employee')->with('success', 'New User created successfully.');
    }
    public function update(Request $request){
      dd($request);die();
    }
    public function destroy(string $id){
      $user = User::findOrFail($id);

        $user->UserDetails()->delete(); // delete user_details
        $user->delete();
      return redirect()->route('employees')->with('success', 'User is deleted successfully.');
    }

    public function resetPassword(Request $request, $userId)
   {
    $request->validate([
        'password' => 'required|min:8|confirmed',
    ]);

    $user = User::findOrFail($userId);

    $user->update([
        'password' => Hash::make($request->password),
    ]);

    return  redirect()->route('employees')->with('success', 'User password updated successfully');
    }

}
