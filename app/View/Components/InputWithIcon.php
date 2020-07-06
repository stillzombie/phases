<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Blade;
use Illuminate\View\Component;

class InputWithIcon extends Component
{
    public $icon;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($icon)
    {
        $this->icon ="blade-icons::components.heroicons.heroicon-s-$icon";
    }

    public function render()
    {
        return <<<'blade'
            <div class="mt-1 relative rounded-md shadow-sm font-bold  font-moonshiner" >
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <div  class="h-5 w-5">
                        @include($icon)
                    </div>
                </div>
                <input
                    {{$attributes->merge(['class'=> "w-full rounded-lg pl-10 pr-5 border-grey-200 border-2 py-2 px-4 leading-tight focus:outline-none focus:bg-white"])}}
                    {{$attributes}} />
            </div>
        blade;
    }
}
