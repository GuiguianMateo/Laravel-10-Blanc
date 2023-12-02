<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    function sousmenu()
    {
        return $this->hasMany(SousMenu::class);
    }

    public function page()
    {
        return $this->hasManyThrough(Page::class, SousMenu::class);
    }
}
