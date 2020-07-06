<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormError extends Component
{
    public function render()
    {
        return <<<'blade'
        <span  {{$attributes->merge(['class'=> "mt-2 block text-sm font-medium font-moonshiner leading-5 text-coral-200 uppercase"])}}>
            {{ $slot }}
        </span>
blade;
    }
}
