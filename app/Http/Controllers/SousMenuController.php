<?php

namespace App\Http\Controllers;

use App\Http\Repositories\SousMenuRepository;
use App\Http\Requests\SousMenuRequest;
use App\Models\Menu;
use App\Models\Page;
use App\Models\SousMenu;
use Illuminate\Http\Request;

class SousMenuController extends Controller
{

    protected $sousMenuRepository;

    public function __construct(SousMenuRepository $sousMenuRepository)
    {
        $this->sousMenuRepository = $sousMenuRepository;
    }


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
    public function store(SousMenuRequest $request)
    {

        $this->sousMenuRepository->store($request);
        return redirect()->route('sousmenu.index');

       /*  $data = $request->all();

        $sousmenu = new SousMenu;

        $sousmenu->titre = $data['titre'];
        $sousmenu->lien = $data['lien'];
        $sousmenu->afficher = $data['afficher'];
        $sousmenu->menu_id = $data['menu_id'];
        $sousmenu->save();

        $sous_menus = SousMenu::all();
        return redirect()->route('sousmenu.index', compact('sous_menus')); */
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
    public function update(SousMenuRequest $request, $id)
    {

        $this->sousMenuRepository->update($request, $id);
        return redirect()->route('sousmenu.index');


       /*  $data = $request->all();

        $sousmenu->titre = $data['titre'];
        $sousmenu->lien = $data['lien'];
        $sousmenu->afficher = $data['afficher'];
        $sousmenu->menu_id = $data['menu_id'];
        $sousmenu->save();

        return redirect()->route('sousmenu.index'); */
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SousMenu $sousmenu)
    {
        $pages = Page::where('sousmenu_id', $sousmenu->id)->get();
        foreach ($pages as $page) {
            $page->delete();
        }
        $sousmenu->delete();

        return redirect()->route('sousmenu.index');

    }
}
