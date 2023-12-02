<?php

namespace App\Http\Repositories;

use App\Models\Menu;

class MenuRepository
{

    public function store($request)
    {
        $data = $request->all();

        $menu = new Menu;

        $menu->titre = $data['titre'];
        $menu->lien = $data['lien'];
        $menu->afficher = $data['afficher'];
        $menu->save();

    }



    public function update($request, $menu)
    {
        $menu = Menu::find($menu->id);

        $data = $request->all();

        $menu->titre = $data['titre'];
        $menu->lien = $data['lien'];
        $menu->afficher = $data['afficher'];
        $menu->save();
    }

}
