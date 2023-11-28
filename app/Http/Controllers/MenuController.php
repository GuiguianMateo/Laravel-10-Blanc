<?php

namespace App\Http\Controllers;

use App\Http\Repositories\MenuRepository;
use App\Http\Requests\MenuRequest;
use App\Mail\InfoMail;
use App\Models\Menu;
use App\Models\Page;
use App\Models\SousMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MenuController extends Controller
{

    protected $menuRepository;

    public function __construct(MenuRepository $menuRepository)
    {
        $this->menuRepository = $menuRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::all();
        return view('menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::user()->can('menu-create')) {
            $menus = Menu::all();
            return view('menu.create', compact('menus'));
        }
        abort(401);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuRequest $request, Menu $menu)
    {

        $this->menuRepository->store($request, $menu);
        Mail::to(Auth::user()->email)->send(new InfoMail($menu));

        return redirect()->route('menu.index');


       /*  $data = $request->all();

        $menu = new Menu;

        $menu->titre = $data['titre'];
        $menu->lien = $data['lien'];
        $menu->afficher = $data['afficher'];
        $menu->save();
        return redirect()->route('menu.index'); */
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        if (Auth::user()->can('menu-show')) {
            return view('menu.show', compact('menu'));
        }
        abort(401);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        if (Auth::user()->can('menu-edit')) {
            return view('menu.edit', compact('menu'));
        }
        abort(401);
    }

    /**
     * Update the specified resource in storage.
     */


    //public function update(Request $request, Menu $menu)
    public function update(MenuRequest $request, Menu $menu)
    {

        $this->menuRepository->store($request, $menu);
        Mail::to(Auth::user()->email)->send(new InfoMail($menu));

        return redirect()->route('menu.index');

/*         $data = $request->all();

        $menu->titre = $data['titre'];
        $menu->lien = $data['lien'];
        $menu->afficher = $data['afficher'];
        $menu->save();
        return redirect()->route('menu.index'); */
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu, SousMenu $sousmenu)
    {
        if (Auth::user()->can('menu-delete')) {

            $sousmenus = SousMenu::where('menu_id', $menu->id)->get();
            foreach ($sousmenus as $sousmenu) {
                $pages = Page::where('sousmenu_id', $sousmenu->id)->get();
                foreach ($pages as $page) {
                    $page->delete();
                }
                $sousmenu->delete();
            }
            $menu->delete();
            return redirect()->route('menu.index');
        }
        abort(401);
    }
}
