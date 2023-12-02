<?php

namespace App\Http\Controllers;

use App\Http\Repositories\SousMenuRepository;
use App\Http\Requests\SousMenuRequest;
use App\Mail\MailCreateSousMenu;
use App\Mail\MailUpdateSousMenu;
use App\Models\Menu;
use App\Models\Page;
use App\Models\SousMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
        if (Auth::user()->can('sousmenu-create')) {
            $menus = Menu::all();
            $sous_menus = SousMenu::all();
            return view('sousmenu.create', compact('sous_menus', 'menus'));
        }
        abort(401);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, SousMenu $sousmenu)
    {

        $this->sousMenuRepository->store($request);
        Mail::to(Auth::user()->email)->send(new MailCreateSousMenu($sousmenu));


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
        if (Auth::user()->can('sousmenu-show')) {
            return view('sousmenu.show', compact('sousmenu'));
        }
        abort(401);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SousMenu $sousmenu)
    {
        if (Auth::user()->can('sousmenu-edit')) {
            $menus = Menu::all();
            return view('sousmenu.edit', compact('sousmenu', 'menus'));
        }
        abort(401);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SousMenu $sousmenu)
    {

        $this->sousMenuRepository->update($request, $sousmenu);
        Mail::to(Auth::user()->email)->send(new MailUpdateSousMenu($sousmenu));


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
        if (Auth::user()->can('sousmenu-delete')) {
            $pages = Page::where('sousmenu_id', $sousmenu->id)->get();
            foreach ($pages as $page) {
                $page->delete();
            }
            $sousmenu->delete();

            return redirect()->route('sousmenu.index');
        }
        abort(401);
    }
}
