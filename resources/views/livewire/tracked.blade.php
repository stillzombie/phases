<div class=" divide-y-2" >
    @foreach( $tracks as $key => $staked )
    <div class="space-y-5">
    <x-hx value="3" class="text-melanzani-200">
        {{$key}}
    </x-hx>
    <div class="bg-white shadow overflow-hidden sm:rounded-md">
        <ul>
            @foreach($staked as $track)
            <li>
            <a href="#" class="block hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
                <div class="px-4 py-4 sm:px-6">
                <div class="flex items-center justify-between">
                    <div class="text-sm leading-5 font-medium text-blue-300 font-semibold font-moonshiner">
                        {{ $track['title'] }}
                    </div>
                    <div class="ml-2 flex-shrink-0 flex">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-grey-300 text-blue-300">
                        {{ $track['diff'] }}
                    </span>
                    </div>
                </div>
                <div class="mt-2 sm:flex sm:justify-between">
                    <div class="sm:flex">
                    <div class="mr-6 flex items-center text-sm leading-5 text-gray-500">
                        <x-heroicon-s-briefcase class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" />
                        {{ $track['project'] }}
                    </div>
                    <div class="mt-2 flex items-center text-sm leading-5 text-gray-500 sm:mt-0">
                        <x-heroicon-s-moon class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" />
                        {{ $track['phase'] }}
                    </div>
                    </div>
                    <div class="mt-2 flex items-center text-sm leading-5 text-gray-500 sm:mt-0">
                        <x-heroicon-s-clock class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" />
                        <span>
                            {{ $track['started_at'] }} -  {{ $track['ended_at'] }}
                        </span>
                    </div>
                </div>
                </div>
            </a>
            </li>
            @endforeach

        </ul>
    </div>
    @endforeach
</div>
</div>