<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputText extends Component
{
    /**
     * Create a new component instance.
     */

    public $property;
    public $label;
    public $maxlenght;

    public function __construct($property, $label, $maxlenght)
    {
        $this-> property = $property;
        $this-> label = $label;
        $this-> maxlenght = $maxlenght;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input-text');
    }
}
