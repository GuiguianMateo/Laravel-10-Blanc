<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ButtonDelete extends Component
{
    /**
     * Create a new component instance.
     */

     public $label;
     public $property;
     public $model;

     public function __construct($label, $property, $model)
     {
         $this->label = $label;
         $this->property = $property;
         $this->model = $model;
     }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button-delete');
    }
}
