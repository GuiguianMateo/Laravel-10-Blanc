<?php

namespace App\View\Components;

use App\Models\SousMenu;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputSelectPage extends Component
{
    public $sous_menus;
    public $property;
    public $label;

    public function __construct(SousMenu $sous_menus, $property, $label)
    {
        $this->sous_menus = $sous_menus;
        $this->property = $property;
        $this->label = $label;
    }

    /**
     * Récupère la vue ou le contenu qui représente le composant.
     */
    public function render(): View|Closure|string
    {
        return view('components.input-select-page');
    }
}
