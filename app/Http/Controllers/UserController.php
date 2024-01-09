<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return Datatables::of(User::where('id','!=',1)->get())
                ->addColumn('role', function ($row) {
                    $role = $row->roleUser->role_type;
                    return $role;
                })
                ->addColumn('created_by', function ($row) {
                    if($row->created_by == 1){
                        return 'Admin';
                    }
                    return $row->userCreatedBy->name; 
                })
                ->addColumn('action', function ($row) {

                    $actionBtn = "<a href='" . route("users.edit", $row->id) . "' class='edit btn btn-success btn-sm'><span><i class='fa-solid fa-pen-to-square'></i></span></a>";
                    $actionBtn .= '<form method="POST" action="' . route("users.destroy", $row->id) . '" class="d-inline">
                                    ' . csrf_field() . '
                                    ' . method_field('DELETE') . '
                                    <button type="submit" class="delete btn btn-danger btn-sm" onclick="return confirm(\'Are you sure?\')">
                                        <span><i class="fa-solid fa-trash"></i></span>
                                    </button>
                                </form>';
                    return $actionBtn;
                })
                ->rawColumns(['role', 'created_by', 'action'])
                ->make(true);
        }
        return view('admin.pages.users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.users.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'user_phone' => ['required', 'numeric'],
            'role' => 'required',
        ]);
        // dd($request->input());
        $id = Auth::id();

        $createUser = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'user_phone' => $request->input('user_phone'),
            'role_id' => $request->input('role'),
            'created_by' => $id,
        ]);
        if ($createUser) {
            return Redirect::route("users.index")->withSuccess('User Added Successfully');
        }
        return Redirect::route("users.index")->withError('User can not be Added');
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
        $users = User::whereId($id)->first();
        return view('admin.pages.users.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'user_phone' => ['required', 'numeric'],
            'role' => 'required',
        ]);
        // dd($request->input());

        $updateUser = User::whereId($id)->update([
            'name' => $request->input('name'),
            'user_phone' => $request->input('user_phone'),
            'role_id' => $request->input('role'),
        ]);
        if ($updateUser) {
            return Redirect::route("users.index")->withSuccess('User Updated Successfully');
        }
        return Redirect::route("users.index")->withError('User can not be Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleteWineMachine = User::destroy($id);

        if ($deleteWineMachine) {
            return Redirect::route("users.index")->withSuccess('User Deleted Successfully');
        }

        return Redirect::route("users.index")->withError('User can not be Deleted');
    }
    public function changeStatus(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $user->status = !$user->status;
        $user->save();

        return response()->json(['success' => true]);
    }

    public function updateSettings(Request $request)
    {
        $id = Auth::id();
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'user_phone' => ['required', 'numeric'],
        ]);

        $updateArray = [
            'name' => $request->input('name'),
            'user_phone' => $request->input('user_phone'),
        ];

        if($request->password) {
            $this->validate($request, [
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
            $password = Hash::make($request->input('password'));
            $updateArray['password'] = $password;

        }

        $updateUser = User::whereId($id)->update($updateArray);
        if ( $updateUser ) {
            return Redirect()->route("distributor.account")->withSuccess('Account Details Updated Successfully');
        }
        return Redirect()->route("distributor.account")->withError('Account Details can not be Updated');

    }
}
