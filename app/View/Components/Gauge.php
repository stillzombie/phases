<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Gauge extends Component
{
    public $active;
    public $value;
    public $color;
    public $last;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($active, $value, $last)
    {
        $this->active = $active;
        $this->value = $value;
        $this->last = $last;
        $this->color  = $last ? 'bg-blue-200' : 'bg-blue-300';
        $this->color = $this->active ? $this->color : 'bg-gray-200';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */

    // Dont Compose Classes be aware of purge css will not read it
    // <div class="rounded {{ $color }} h-full" style="width: {{ $value }}%"></div>
    public function render()
    {
        return <<<'blade'
            <div class="rounded {{$color}}  h-full" style="width: {{ $value }}%"></div>
blade;
    }
}
