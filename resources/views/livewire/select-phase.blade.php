<div >
    <div>
        <!-- Search  -->
        <div class="mt-1 relative rounded-md shadow-sm p-2 focus-within:text-blue-300 text-gray-300">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <x-heroicon-s-search  class="h-5 w-5 fill-current ml-2" />
            </div>
            <input
                wire:model.debounce.250ms="search"
                class="w-full rounded-lg pl-10 pr-5 border-gray-300 border-2 py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-300"
                id="inline-full-name"
                type="text"
                placeholder="search">

            <!-- <input id="email" class="form-input block w-full pl-10 sm:text-sm sm:leading-5 focus:border-blue-300 focus:outline-none" placeholder="project" /> -->
        </div>
    </div>

    <!-- Projects -->
    @foreach ($stacked as $key => $stack)
        <div >
            <div class="py-1">
                    <div  class="group flex items-center px-4 py-2 text-sm leading-5 text-melanzani-100">
                        <svg fill="currentColor" viewBox="0 0 20 20" class="mr-3 h-5 w-5 text-melanzani-100"><path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd"></path><path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"></path></svg>
                        {{$key}}
                    </div>
            </div>
        </div>
        <div class="border-t border-gray-100"></div>
        <div class="py-1">
            @foreach ($stack as $phase)
                <p @click="open = false"  wire:click="selectPhase({{$phase['id']}})" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900 cursor-pointer">
                    {{$phase['name']}}
                </p>
            @endforeach
        </div>
    @endforeach
</div>