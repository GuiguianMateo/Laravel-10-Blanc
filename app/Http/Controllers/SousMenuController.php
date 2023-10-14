<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\SousMenu;
use Illuminate\Http\Request;

class SousMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sous_menus = SousMenu::all();
        return view('sousmenu.index', compact('sous_menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menus = Menu::all();
        $sous_menus = SousMenu::all();
        return view('sousmenu.create', compact('sous_menus', 'menus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $sousmenu = new SousMenu;

        $sousmenu->titre = $data['titre'];
        $sousmenu->lien = $data['lien'];
        $sousmenu->afficher = $data['afficher'];
        $sousmenu->menu_id = $data['menu_id'];
        $sousmenu->save();

        $sous_menus = SousMenu::all();
        return redirect()->route('sousmenu.index', compact('sous_menus'));
    }

    /**
     * Display the specified resource.
     */
    public function show(SousMenu $sousmenu)
    {
        return view('sousmenu.show', compact('sousmenu'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SousMenu $sousmenu)
    {
        $menus = Menu::all();
        return view('sousmenu.edit', compact('sousmenu', 'menus'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SousMenu $sousmenu)
    {
        $data = $request->all();

        $sousmenu->titre = $data['titre'];
        $sousmenu->lien = $data['lien'];
        $sousmenu->afficher = $data['afficher'];
        $sousmenu->menu_id = $data['menu_id'];
        $sousmenu->save();

        return redirect()->route('sousmenu.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SousMenu $sousmenu)
    {
        $sousmenu->delete();
        return redirect()->route('sousmenu.index');
    }
}
