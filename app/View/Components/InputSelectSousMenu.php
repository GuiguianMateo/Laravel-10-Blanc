<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputSelect extends Component
{
    public $menus;
    public $property;
    public $label;

    public function __construct($menus, $property, $label)
    {
        $this->menus = $menus;
        $this->property = $property;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input-select-sous-menu');
    }
}
