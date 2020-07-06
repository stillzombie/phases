<div x-data="{ edit: false }">
  <!-- DISPLAY -->
  <div x-show="edit == false" >
    <a href="#" class="block hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out"  @click.prevent="edit = true" >
      <div class="px-4 py-4 sm:px-6 font-moonshiner">
        <div class="flex items-center justify-between">
          <div class="text-sm leading-5 font-medium text-cheddar-300  font-bold">
            {{ $project->name }}
          </div>
          @if($project->has_tracks)
            <div class="ml-2 flex-shrink-0 flex">
              <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                recent
              </span>
            </div>
          @endif
        </div>
        <div class="mt-2 sm:flex sm:justify-between">
          <div class="sm:flex md:space-x-6">
            <div class="flex items-center text-sm leading-5 text-gray-500 sm:mt-0">
              <x-heroicon-s-moon class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-500" />
              {{ $project->phases()->count() }}
            </div>
            <div class="flex items-center text-sm leading-5 text-gray-500">
              <x-heroicon-s-office-building class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-500" />
              {{ $project->client }}
            </div>
          </div>
          @if($project->has_tracks && $project->archive == false)
            <div class="mt-2 flex items-center text-sm leading-5 text-gray-500 sm:mt-0">
              <x-heroicon-s-calendar class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-500" />
              <span>
                Last Activity
                <span>{{ $project->last_activity_at }}</span>
              </span>
            </div>
          @endif
          @if($project->archive)
            <div>
              <button wire:click="activate" class="flex items-center text-grey-200 hover:text-blue-200 focus:outline-none focus:text-blue-200">
                <x-heroicon-s-check class="w-8 h-8" />
              </button>
            </div>
          @endif
        </div>
      </div>
    </a>
  </div>
  <!-- EDIT MODE -->
  <div x-show="edit" @click.away="edit = false" class="block hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out" >
    <div class="px-4 py-4 sm:px-6 font-moonshiner">
      <div class="mt-2 sm:flex sm:justify-between">
        <div class="sm:flex">
          <div class="mr-6 flex items-center text-sm leading-5 text-gray-500">
            <div class="text-cheddar-300 focus-within:text-cheddar-300">
              <x-input-with-icon  wire:model.lazy="name" icon="briefcase" class="focus:border-cheddar-300" placeholder="Project Name" />
            </div>
          </div>
          <div class="mr-6 flex items-center text-sm leading-5 text-gray-500">
            <div>
              <x-input-with-icon  wire:model.lazy="client" icon="office-building" class="focus:border-grey-100" placeholder="Client" />
            </div>
          </div>
        </div>
        <!-- Actions  -->
        @if($project->archive == false)
        <div>
          <button wire:click="archive" @click.prevent="edit = false" class="flex items-center text-grey-200  hover:text-coral-200 focus:outline-none focus:text-coral-200">
            <x-heroicon-s-archive class="w-8 h-8" />
          </button>
        </div>
        @endif
      </div>
      <!-- Phases -->
      @if($project->phases()->count())
        <div class="flex items-center text-sm pt-8 leading-5 text-gray-500 sm:mt-0">
          <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" class="w-8 h-8">
              <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
          </svg>
          Phases
        </div>
        <div class="space-y-2 py-2">
          @foreach($project->phases as $phase)
            <div class="flex items-center text-sm leading-5 text-gray-500 sm:mt-0">
              <div class="flex-shrink-0 mr-1.5 h-5 w-5 text-white">
              </div>
              {{$phase->name}}
            </div>
          @endforeach
        </div>
      @endif

    </div>
  </div>

</div>