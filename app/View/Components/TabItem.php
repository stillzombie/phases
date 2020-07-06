<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TabItem extends Component
{
    public $active;
    public $class;

    public function __construct($active=0)
    {
        $this->active = $active;
        $this->class= "text-grey-200 hover:text-grey-100 focus:text-grey-100" ;
        $this->class = $this->active == 1 ? "group-focus:text-melanzani-200 text-melanzani-200 focus:text-melanzani-300" : $this->class;
    }

    public function render()
    {
        return <<<'blade'
            <button class="py-4 px-1 focus:outline-none">
                <span  class="ml-8 group inline-flex items-center py-4 px-1 font-moonshiner font-medium text-sm leading-5 {{ $class }} ">
                    {{ $slot }}
                </span>
            </button>
        blade;
    }
}
