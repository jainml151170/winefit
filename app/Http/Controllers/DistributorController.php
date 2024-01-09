<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DistributorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $authId = Auth::id();
            $users = User::where('created_by', $authId)->get();

            return Datatables::of($users)
                ->addColumn('status', function ($user) {
                    return $user->status == 1 ? '<span class="text-success">Active</span>' : '<span class="text-danger">In-Active</span>';
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = "<a href='" . route("distributors.edit", $row->id) . "' class='edit btn btn-success btn-sm'><span><i class='fa-solid fa-pen-to-square'></i></span></a>";
                    return $actionBtn;
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }

        return view('distributor.pages.users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('distributor.pages.users.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'user_phone' => ['required', 'numeric'],
        ]);

        $id = Auth::id();
        $roleId = 2;
        $createUser = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'user_phone' => $request->input('user_phone'),
            'role_id' => $roleId,
            'created_by' => $id,
        ]);

        if ($createUser) {
            return Redirect::route("distributors.index")->withSuccess('Wine Vendor Added Successfully');
        }
        return Redirect::route("distributors.index")->withError('Wine Vendor can not be Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $distributors = User::whereId($id)->first();
        return view('distributor.pages.users.edit', compact('distributors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'user_phone' => ['required', 'numeric']
        ]);
        // dd($request->input());

        $updateWineVendor = User::whereId($id)->update([
            'name' => $request->input('name'),
            'user_phone' => $request->input('user_phone')
        ]);
        if ($updateWineVendor) {
            return Redirect::route("distributors.index")->withSuccess('Wine Vendor Updated Successfully');
        }
        return Redirect::route("distributors.index")->withError('Wine Vendor can not be Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
