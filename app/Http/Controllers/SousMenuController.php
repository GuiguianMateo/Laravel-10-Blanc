<?php

namespace App\Http\Controllers;

use App\Models\SousMenu;
use Illuminate\Http\Request;

class SousMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sousmenus = SousMenu::all();
        return view('sousmenu.index', compact('sousmenus'));
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
    public function show(SousMenu $sousMenu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SousMenu $sousMenu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SousMenu $sousMenu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SousMenu $sousMenu)
    {
        //
    }
}
