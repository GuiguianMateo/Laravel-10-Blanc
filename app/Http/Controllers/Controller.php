<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\SousMenu;
use App\Models\Page;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function index(){

        $menus = Menu::all();
        $sousmenus = SousMenu::all();
        $pages = Page::all();

        return view('index', compact('menus', 'sousmenus', 'pages'));
    }
}
