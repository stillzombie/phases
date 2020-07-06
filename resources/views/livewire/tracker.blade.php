<div>
    <div class="mt-5 md:mt-0 md:col-span-2">
        <!-- CREATE LIVE TRACK  -->
        <div class="grid grid-cols-8 gap-6 border-b-2 border-gray-100 focus-within:border-blue-300">
           <!-- WHAT WILL YOU DO ? -->
           <div class="col-span-3">
                <input wire:model.debounce.250ms="title" class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="What will you do?" aria-label="Full name">
            </div>

            <div class="col-span-3 mt-1 text-sm leading-5 text-melanzani-200">
                @if ($this->phase)
                    <div class="flex items-center">
                    <svg fill="currentColor" viewBox="0 0 20 20" class="mr-3 h-5 w-5 text-melanzani-100"><path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd"></path><path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"></path></svg>
                    {{ optional($this->phase)->name }}
                    </div>
                @endif
            </div>

            @if (! $this->liveTrack)
            <!-- PROJECTS -->
            <div class="col-span-1">
                <div x-data="{ open: false }" @keydown.escape="open = false" @click.away="open = false"
                    class="relative inline-block text-left">
                    <div>
                        <button @click="open = !open" class="flex items-center text-grey-200  hover:text-melanzani-200 focus:outline-none focus:text-melanzani-200">
                            <svg fill="currentColor" viewBox="0 0 20 20" class="w-8 h-8"><path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"></path></svg>
                        </button>
                    </div>
                    <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95"
                        class="origin-top-right absolute right-0 mt-2 w-56">
                        <div class="rounded-md bg-white shadow-xs">
                            <livewire:select-phase>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-span-1">
                <button wire:click="start" class="flex items-center text-gray-400 text-melanzani-100 hover:text-melanzani-200">
                    <svg fill="currentColor" viewBox="0 0 20 20" class="w-8 h-8"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
            @else

        </div>
        <div class="h-full">
            <div class="mr-4 flex h-5 bg-gray-200 mt-15 rounded shadow-inner">
                @foreach ($graph as $item)
                    <x-gauge :active='$item["active"]' :value='$item["value"]' :last='$loop->last' />
                @endforeach
            </div>
        </div>


        <div class="flex justify-end w-full mt-12 pr-5 space-x-3">
        @if ( $onBreak )
            <button  wire:click="finishBreak" type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-coral-200 hover:bg-coral-300 focus:outline-none focus:border-coral-300 focus:shadow-outline-coral-100 active:bg-coral-200 transition ease-in-out duration-150">
                <x-heroicon-s-desktop-computer class="-ml-0.5 mr-2 h-5 w-5"/>
                Back to Work !
            </button>
        @else


            <div>
                <span class="relative z-0 inline-flex shadow-sm">
                    <button type="button"  wire:click="break"  class="relative inline-flex items-center px-4 py-2 rounded-l-md border border-gray-300 bg-white text-sm leading-5 font-medium text-gray-700 hover:text-melanzani-200 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                        <x-heroicon-s-sun class="-ml-0.5 mr-2 h-5 w-5"/>
                        Break
                    </button>
                    <span class="-ml-px relative block" x-data="{isOpen:false}">
                        <button type="button" @click="isOpen = !isOpen" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-melanzani-200 text-sm leading-5 font-medium text-white focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </button>

                        <div
                            class="origin-top-right absolute right-0 mt-2 -mr-1 w-56 rounded-md shadow-lg"
                            x-show="isOpen"
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                        >
                            <div class="rounded-md bg-white shadow-xs">
                                <div class="py-1">
                                <a wire:click.prevent="fixedBreak(60)" class="cursor-pointer block px-4  py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900">
                                    Lunch
                                </a>
                                <a wire:click.prevent="fixedBreak(1)"  class="cursor-pointer block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900">
                                    Coffee
                                </a>
                                </div>
                            </div>
                        </div>
                    </span>
                </span>
            </div>

            <button  wire:click="end" type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-melanzani-200 hover:bg-melanzani-100 focus:outline-none focus:border-melanzani-100 focus:shadow-outline-indigo active:bg-melanzani-200 transition ease-in-out duration-150">
                End
            </button>
        @endif
        </div>









    </svg>
  </div>

  <div wire:poll.1000ms="tick">

  @endif
  </div>
