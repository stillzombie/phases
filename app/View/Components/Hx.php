<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Hx extends Component
{
    public $value;
    public $size;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($value = 1)
    {
        $this->value = $value;
        switch ($value) {
            case 2: $this->size = 'text-2xl'; break;
            case 3: $this->size = 'text-xl'; break;
            default: $this->size = 'text-3xl'; break;
        }
    }

    public function render()
    {
        return <<<'blade'
        <h{{$value}} {{$attributes->merge(['class'=> "font-moonshiner font-black {$size} uppercase"])}}>
            {{ $slot }}
        </h{{$value}}>
blade;
    }
}
