@section('submenu')
<a href="{{url('project')}}" class="border-b-2 border-transparent hover:border-blue-200 flex items-center">
  <x-heroicon-s-plus  class="flex-shrink-0 mr-1.5 h-5 w-5 text-blue-200"/>
    New
</a>
@endsection

<div>
  <!-- List -->
  <div>
    <!-- TABS -->
    <div class="sm:hidden">
      <select class="form-select block w-full">
        <option selected>Active</option>
        <option>Archive</option>
      </select>
    </div>
    <div class="hidden sm:block">
      <nav class="flex -mb-px">
        <div  wire:click="activeFilter('active')" >
          <x-tab-item  filter="active" :active='$filter=="active"'>
            <x-heroicon-s-check class="-ml-0.5 mr-2 h-5 w-5"/>
            <span>Active</span>
          </x-tab-item>
        </div>
        <div  wire:click="activeFilter('archive')" >
          <x-tab-item filter="archive" :active='$filter=="archive"' >
            <x-heroicon-s-archive class="-ml-0.5 mr-2 h-5 w-5"/>
            <span>Archive</span>
          </x-tab-item>
        </div>
      </nav>
    </div>
    <!-- LIST  -->
    <div class="bg-white shadow overflow-hidden sm:rounded-md divide-y">
        @foreach ($projects as $key=> $project)
          <livewire:project-item :project="$project" :key="$project->id">
        @endforeach
    </div>
  </div>
</div>
