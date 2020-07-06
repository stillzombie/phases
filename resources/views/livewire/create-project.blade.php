@section('submenu')
<a href="{{url('projects')}}" class="border-b-2 border-transparent hover:border-blue-200 flex items-center">
  <x-heroicon-s-view-list  class="flex-shrink-0 mr-1.5 h-5 w-5 text-blue-200"/>
    List
</a>
@endsection

<div>
  <!-- Create Form -->
  <div>
    <x-create-form  wire:submit.prevent="create">
      <x-slot name="title">
        <h3 class="text-lg font-medium leading-6 text-gray-900">Projects</h3>
        <p class="mt-1 text-sm leading-5 text-gray-500">
         are the base of this, after creating projects you can assign phases to them
        </p>
      </x-slot>
        <div class="grid grid-cols-3 gap-6">
          <div class="col-span-3 sm:col-span-2 text-gray-500 focus-within:text-cheddar-300">
              <x-input-with-icon  wire:model="name" icon="briefcase" class="focus:border-cheddar-300" placeholder="Project Name" />
              @error('name')
                <x-form-error>
                  {{ $message }}
                </x-form-error>
              @enderror
          </div>
        </div>

        <div class="grid grid-cols-3 gap-6">
          <div class="col-span-3 sm:col-span-2  text-gray-500  focus-within:text-cheddar-300">
              <x-input-with-icon  wire:model="client" icon="office-building" class="focus:border-cheddar-300" placeholder="Client" />
              @error('client')
                <x-form-error>
                  Client is required
                </x-form-error>
              @enderror
          </div>
        </div>

        <div class="grid grid-cols-3 gap-6">
          <div class="col-span-3 sm:col-span-2  relative  text-gray-500">
              <x-input-with-icon wire:model="phaseName" icon="moon" class="focus:border-grey-100" placeholder="Phase" />
              <div class="absolute inset-y-0 right-0 flex items-center">
                <x-input-with-icon  wire:model="phaseTime" icon="clock" type="number" min="1" class="border-none" placeholder="Estimated Hours" />
                <select wire:model="phaseBillable"class="form-select h-full py-0 pl-2 pr-7 font-moonshiner border-transparent focus:outline-none bg-transparent text-gray-500 sm:text-sm sm:leading-5">
                  <option value="true" >Billable</option>
                  <option value="false">Open</option>
                </select>
              </div>
          </div>
        </div>

    </x-create-form>
  </div>
</div>
