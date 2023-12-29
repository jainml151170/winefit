<?php

namespace App\Http\Controllers;

use App\Models\WineMachine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class WineMachineController extends Controller
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
        $createWineMachine = \App\Models\WineMachine::create([
            'machine_sn' => $request->input('machine_sn'),
            'price' => $request->input('price'),
            
        ]);
        
        if($createWineMachine){
            return Redirect::back()->withSuccess('Wine Machine Added Successfully');
        }
        return Redirect::back()->withError('Wine Machine can not be Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(WineMachine $wineMachine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WineMachine $wineMachine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WineMachine $wineMachine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WineMachine $wineMachine)
    {
        //
    }
}
