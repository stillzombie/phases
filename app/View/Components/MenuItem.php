<?php

namespace App\View\Components;

use Illuminate\Support\Str;
use Illuminate\View\Component;

class MenuItem extends Component
{
    public $key;
    public $active = '';
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($key)
    {
        $this->key = $key;
        $uri = Str::afterLast(request()->route()->uri(), '/');
        if ($uri == $key || $uri == Str::singular($key)) {
            $this->active = "bg-melanzani-200";
        }
    }

    public function render()
    {
        return <<<'blade'
            <a href="{{url($key)}}" class="ml-4 px-3 py-2 {{$active}} font-moonshiner rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-melanzani-100 focus:outline-none focus:text-white focus:bg-melanzani-100">
                {{ $slot }}
            </a>
blade;
    }
}
