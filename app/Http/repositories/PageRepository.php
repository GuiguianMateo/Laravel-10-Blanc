<?php

namespace App\Http\Repositories;

use App\Models\Page;

class PageRepository
{

    public function store($request)
    {
        $data = $request->all();

        $page = new Page;

        $page->titre = $data['titre'];
        $page->message = $data['message'];
        $page->publier = $data['publier'];
        $page->sousmenu_id = $data['sousmenu_id'];

        $page->save();

    }



    public function update($request, $id)
    {

        $page = Page::find($id);

        $data = $request->all();

        $page->titre = $data['titre'];
        $page->message = $data['message'];
        $page->publier = $data['publier'];
        $page->sousmenu_id = $data['sousmenu_id'];

        $page->save();
    }

}
