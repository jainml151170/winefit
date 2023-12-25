<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CreateUserController extends Controller
{
    //

    public function createUser(Request $request)
    {
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'user_phone' => ['required', 'numeric'],
            'status' => 'required',
            'role' => 'required',
        ]);
        // dd($request->input());
        $id = Auth::id();

        $createUser = \App\Models\User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => \Illuminate\Support\Facades\Hash::make($request->input('password')),
            'user_phone' => $request->input('user_phone'),
            'roll_id' => $request->input('role'),
            'status' => $request->input('status'),
            'created_by' => $id,    
        ]);
        
        if($createUser){
            return Redirect::back()->withSuccess('User Create Successfully');
        }
        
    }
}
