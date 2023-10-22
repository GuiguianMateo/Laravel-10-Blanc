<?php

namespace App\Http\Controllers;

use App\Http\Repositories\PageRepository;
use App\Http\Requests\PageRequest;
use App\Models\Page;
use App\Models\SousMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    protected $pageRepository;

    public function __construct(PageRepository $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Page::all();
        return view('page.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::user()->can('page-create')) {
            $pages = Page::all();
            $sous_menus = SousMenu::all();
            return view('page.create', compact('pages','sous_menus'));
        }
        abort(401);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PageRequest $request)
    {

        $this->pageRepository->store($request);
        return redirect()->route('page.index');

/*         $data = $request->all();

        $page = new Page;

        $page->titre = $data['titre'];
        $page->message = $data['message'];
        $page->publier = $data['publier'];
        $page->sousmenu_id = $data['sousmenu_id'];
        $page->save();


        $pages = Page::all();
        return redirect()->route('page.index', compact('pages')); */
    }

    /**
     * Display the specified resource.
     */
    public function show(Page $page)
    {
        if (Auth::user()->can('page-show')) {
            return view('page.show', compact('page'));
        }
        abort(401);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page)
    {
        if (Auth::user()->can('page-edit')) {
            $sousmenus = SousMenu::all();
            return view('page.edit', compact('page', 'sousmenus'));
        }
        abort(401);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PageRequest $request, $id)
    {

        $this->pageRepository->store($request, $id);
        return redirect()->route('page.index');

       /*
        $data = $request->all();

        $page->titre = $data['titre'];
        $page->message = $data['message'];
        $page->publier = $data['publier'];
        $page->sousmenu_id = $data['sousmenu_id'];

        $page->save();
        return redirect()->route('page.index'); */

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {
        if (Auth::user()->can('page-destroy')) {
            $page->delete();
            return redirect()->route('page.index');
        }
        abort(401);
    }
}
