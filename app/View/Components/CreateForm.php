<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CreateForm extends Component
{

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function render()
    {
        return <<<'blade'
        <form  {{$attributes}} >
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1 font-moonshiner">
                    {{ $title }}
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2 space-y-6">
                    {{ $slot }}
                </div>
            </div>
            <div class="mt-8 border-t border-gray-200 pt-5">
                <div class="flex justify-end">
                    <span class="inline-flex rounded-md shadow-sm">
                        <button wire:click="cancel" type="button" class="py-2 px-4 border border-gray-300 rounded-md text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out">
                            Cancel
                        </button>
                    </span>
                    <span class="ml-3 inline-flex rounded-md shadow-sm">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-black bg-blue-200 hover:bg-blue-100 focus:outline-none focus:border-blue-100 focus:shadow-outline-blue-200 active:bg-blue-100 transition duration-150 ease-in-out">
                            Save
                        </button>
                    </span>
                </div>
            </div>
        </form>
        blade;
    }
}
