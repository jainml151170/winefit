<?php

namespace App\Http\Controllers;

use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }

    public function updateSettings(Request $request)
    {
        $id = Auth::id();
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'user_phone' => ['required', 'numeric'],
        ]);

        $updateArrayForAdminTable = [
            'name' => $request->input('name'),
            'admin_phone' => $request->input('user_phone'),
        ];

        $updateArrayForuserTable = [
            'name' => $request->input('name'),
            'user_phone' => $request->input('user_phone'),
        ];

        if($request->password) {
            $this->validate($request, [
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
            $password = Hash::make($request->input('password'));
            $updateArrayForAdminTable['password'] = $password;
            $updateArrayForuserTable['password'] = $password;

        }
        // dd($request->input());

        $updateUser = User::whereId($id)->update($updateArrayForuserTable);
        $updateUserInAdminTable = Admin::whereId($id)->update($updateArrayForAdminTable);
        if ($updateUserInAdminTable && $updateUser ) {
            return Redirect::route("admin.account")->withSuccess('Account Details Updated Successfully');
        }
        return Redirect::route("admin.account")->withError('Account Details can not be Updated');

    }
}
