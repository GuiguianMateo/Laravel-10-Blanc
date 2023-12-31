<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SousMenu extends Model
{
    use HasFactory;

    function page()
    {
        return $this->hasMany(Page::class);
    }

    function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
