<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $this->validate($request,[
            'role_type' => 'required',
        ]);
        try {
            $id = Auth::id();
            $admin = \App\Models\Admin\Admin::find($id);
            $user = \App\Models\User::find($id);
            if($admin || $user){
                // dd('id : '.$id);
                $roleType = $request->input('role_type');
                $result = str_replace(' ', '_', $roleType);
                $lowercaseRoleType = Str::lower($result);
                $createRole = \App\Models\Role::create([
                    'role_type' => $lowercaseRoleType,
                    'role_created_by' => $id,
                ]);

                if($createRole){
                    return Redirect::back()->withSuccess('Role Create Successfully');
                }else {
                    // Handle the case where role creation fails
                    return Redirect::back()->withErrors('Role creation failed');
                }

            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        //
    }
}
