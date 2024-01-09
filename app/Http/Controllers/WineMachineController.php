<?php

namespace App\Http\Controllers;

use App\Models\WineMachine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\Facades\DataTables;

class WineMachineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return Datatables::of(WineMachine::all())
                ->addColumn('action', function ($row) {
                    $actionBtn = "<a href='" . route("wine-machines.edit", $row->id) . "' class='edit btn btn-success btn-sm'><span><i class='fa-solid fa-pen-to-square'></i></span></a>";
                    $actionBtn .= '<form method="POST" action="' . route("wine-machines.destroy", $row->id) . '" class="d-inline">
                                    ' . csrf_field() . '
                                    ' . method_field('DELETE') . '
                                    <button type="submit" class="delete btn btn-danger btn-sm" onclick="return confirm(\'Are you sure?\')">
                                        <span><i class="fa-solid fa-trash"></i></span>
                                    </button>
                                </form>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.pages.WineMachines.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.WineMachines.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $createWineMachine = WineMachine::create([
            'machine_sn' => $request->input('machine_sn'),
            'price' => $request->input('price'),

        ]);

        if ($createWineMachine) {
            return Redirect::route("wine-machines.index")->withSuccess('Wine Machine Added Successfully');
        }
        return Redirect::route("wine-machines.index")->withError('Wine Machine can not be Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(WineMachine $wineMachine)
    {
        dd('sdfgs'); //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WineMachine $wineMachine)
    {
        return view('admin.pages.WineMachines.edit', compact('wineMachine'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WineMachine $wineMachine)
    {
        $updateWineMachine = $wineMachine->update([
            'machine_sn' => $request->input('machine_sn'),
            'price' => $request->input('price'),
        ]);

        if ($updateWineMachine) {
            return Redirect::route("wine-machines.index")->withSuccess('Wine Machine Updated Successfully');
        }

        return Redirect::route("wine-machines.index")->withError('Wine Machine can not be Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WineMachine $wineMachine)
    {
        $deleteWineMachine = $wineMachine->delete();

        if ($deleteWineMachine) {
            return Redirect::route("wine-machines.index")->withSuccess('Wine Machine Deleted Successfully');
        }

        return Redirect::route("wine-machines.index")->withError('Wine Machine can not be Deleted');
    }

}
