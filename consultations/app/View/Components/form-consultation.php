<?php

namespace App\View\Components;
use App\Models\Subject;
use App\Models\User;

use Illuminate\View\Component;

class form_consultation extends Component
{


    public $consultation;
    public $teachers = [];
    public $subjects = [];


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct( $consultation, $teachers, $subjects )
    {
        $this->consultation = $consultation;

        $this->teachers= $teachers;
        $this->subjects= $subjects;


    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {


        return view('components.form_consultation' );
    }
}
