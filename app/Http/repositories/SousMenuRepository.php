<?php

namespace App\Http\Repositories;

use App\Models\SousMenu;

class SousMenuRepository
{

    public function store($request)
    {
        $data = $request->all();

        $sousmenu = new SousMenu();

        $sousmenu->titre = $data['titre'];
        $sousmenu->lien = $data['lien'];
        $sousmenu->afficher = $data['afficher'];
        $sousmenu->menu_id = $data['menu_id'];
        $sousmenu->save();

    }



    public function update($request, $id)
    {

        $sousmenu = SousMenu::find($id);

        $data = $request->all();

        $sousmenu->titre = $data['titre'];
        $sousmenu->lien = $data['lien'];
        $sousmenu->afficher = $data['afficher'];
        $sousmenu->menu_id = $data['menu_id'];
        $sousmenu->save();
    }

}
