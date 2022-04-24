<?php

namespace App\View\Components;

use Illuminate\View\Component;

class form_consultation extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($profesor, $materia, $horario, $lugar)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form_consultation');
    }
}
