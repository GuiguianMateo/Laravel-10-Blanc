<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputSelectPage extends Component
{
    public $sousmenu;
    public $property;
    public $label;

    public function __construct($sousmenu, $property, $label)
    {
        $this->sousmenu = $sousmenu;
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
