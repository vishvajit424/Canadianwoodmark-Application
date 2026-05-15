<x-app-layout>
  <div x-data="{ pageName: `Single Task`}">
  <div class="flex flex-wrap items-center justify-between gap-3 pb-6 mb-6">
  <h2 class="text-xl font-semibold text-gray-800 dark:text-white/90" x-text="pageName">Task</h2>
  <nav>
    <ol class="flex items-center gap-1.5">
      <li>
        <a class="inline-flex items-center gap-1.5 text-sm text-gray-500 dark:text-gray-400" href="/">
          Home
          <svg class="stroke-current" width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M6.0765 12.667L10.2432 8.50033L6.0765 4.33366" stroke="" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path>
          </svg>
        </a>
      </li>
      <li class="text-sm text-gray-800 dark:text-white/90" x-text="pageName">List</li>
    </ol>
  </nav>
</div>
</div>

<div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
              <!-- Task header Start -->
<div class="max-w-5xl mx-auto bg-white shadow rounded-xl p-6">

  <!-- Header -->
  <div class="mb-6">
    <h2 class="text-xl font-semibold">{{$task->title}}</h2>
    <p class="text-sm text-gray-500">Client: {{$designing->name ?? "" }} </p> 
  </div>

  <!-- Progress Bar -->
  <div class="flex items-center mb-6">
    <div class="flex-1 h-2 bg-gray-500 rounded"></div>
    <div class="flex-1 h-2 bg-blue-500"></div>
    <div class="flex-1 h-2 bg-purple-500"></div>
    <div class="flex-1 h-2 bg-orange-500"></div>
    <div class="flex-1 h-2 bg-teal-500"></div>
    <div class="flex-1 h-2 bg-green-500"></div>
  </div>
 
@php
    $department = auth()->user()->userdetails->department; 
    if ($department->slug === 'admin') {
        $opening_tab = $task->status;
    } else {
        $opening_tab =  $department->slug;
    } 
@endphp

  <!-- Steps -->
  <div class="space-y-4">
  <div x-data="{ active: '{{ $opening_tab }}' }" class="max-w-5xl mx-auto bg-white rounded-xl shadow divide-y">
<!-- ================= MEASUREMENTS ================= -->
<div>
  <h2 id="accordion-card-heading-1">
  <button @click="active='measurements'" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-body rounded-base shadow-xs border border-default hover:text-heading hover:bg-neutral-secondary-medium gap-3 [&[aria-expanded='true']]:rounded-b-none [&[aria-expanded='true']]:shadow-none bg-gray-500 accordion-btn">
    <span class="font-semibold text-gray-800">
    Measurements
  </span>
      <span class="text-sm text-gray-500 flex items-center gap-2">
    <span class="px-2 py-0.5 rounded bg-blue-600 text-white text-sm">

     @if(isset($measurement)) @if ($measurement->status === 'completed') Completed @endif @else  Pending  @endif 
    </span>
    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M9 5l7 7-7 7" />
    </svg>
  </span>
  </button>
</h2>
@php
    $measurementTab = $task->status === 'measurements' ? '' : 'display:none;';
    $designingTab   = $task->status === 'designings' ? '' : 'display:none;';
    $cncTab         = $task->status === 'cnc' ? '' : 'display:none;';
    $edgeBenderTab  = $task->status === 'edge_bender' ? '' : 'display:none;';
@endphp
  <!-- <div x-show="active==='measurements'" x-transition class="accordion-body" class="hidden border border-t-0 border-default rounded-b-base shadow-xs"> -->
    <div x-show="active==='measurements'" x-transition  class="accordion-body" class="hidden border border-t-0 border-default rounded-b-base shadow-xs">
    <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6 dark:border-gray-800">
      @if(in_array(auth()->user()->userDetails->role->name, ['Admin','Employees']))
       @if(in_array(auth()->user()->userDetails->department->slug, ['measurements','designings', 'admin']))
        {{-- ✅ IF IMAGES EXIST → SHOW CONTENT --}}

            @if(request('edit-measurement'))

                @include('tasks.sections.measurements-form',['measurement' => $measurement])

            @else

              @if(isset($measurement) && $measurement->images->count())

                 @include('tasks.sections.measurements-data', ['measurement' => $measurement])

              {{-- ELSE → SHOW UPLOAD FORM --}}
              @else
                  @include('tasks.sections.measurements-form')
              @endif

            @endif

       @else
<p>You Don't have Access to this Section. Please connect to Admin</p>
@endif
@else
<p>You Can't Access to this Section.only Employee can Access. Please connect to Admin</p>
@endif
  </div>
  </div>
</div>

<!-- ================= DESIGNING ================= -->
<div class="">
  <h2 id="accordion-card-heading-2">
  <button @click="active='designings'" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-body rounded-base shadow-xs border border-default hover:text-heading hover:bg-neutral-secondary-medium gap-3 [&[aria-expanded='true']]:rounded-b-none [&[aria-expanded='true']]:shadow-none bg-blue-500 accordion-btn">
    
    <span class="font-semibold text-gray-800">
    Designings
  </span> 
   <!-- RIGHT -->
  <span class="flex items-center gap-2">
    <span class="px-2 py-0.5 rounded bg-green-600 text-white text-sm">
      @if(isset($designing)) 
       @if($designing->status === 'completed') Completed  @else  Pending  @endif
       @else  Pending  @endif 
      
    </span>

    <svg class="w-4 h-4 text-white bg-gray-400 rounded-full p-0.5"
         fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M9 5l7 7-7 7" />
    </svg>
  </span>
  </button>
</h2>

  <div x-show="active==='designings'" x-transition class="accordion-body">
     <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6 dark:border-gray-800">
      
               @if(request('edit-designing'))

                      @include('tasks.sections.designing-form',['designing' => $designing])

                  @else
                    @if(isset($designing))

                       @include('tasks.sections.designing-data',['designing' => $designing])

                    @else
                        @include('tasks.sections.designing-form')
                    @endif
                    

                  @endif

     

     </div>

</div>

<!-- ================= CNC ================= -->
<div x-data="{ start:null, total:0, running:false }" class="">
  <h2 id="accordion-card-heading-3">
  <button @click="active='cnc'" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-body rounded-base shadow-xs border border-default hover:text-heading hover:bg-neutral-secondary-medium gap-3 [&[aria-expanded='true']]:rounded-b-none [&[aria-expanded='true']]:shadow-none bg-purple-500 accordion-btn">
   <span class="font-semibold text-gray-800">
    CNC
  </span>

     <!-- RIGHT -->
  <span class="flex items-center gap-2">
    <span class="px-2 py-0.5 rounded bg-green-600 text-white text-sm">
       @if(isset($cnc)) 
       @if ($cnc->status === 'completed') Completed  @else  Pending  @endif
       @else  Pending  @endif 
     
    </span>

    <svg class="w-4 h-4 text-white bg-gray-400 rounded-full p-0.5"
         fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M9 5l7 7-7 7" />
    </svg>
  </span>
  </button>
</h2>
 <div x-show="active==='cnc'" x-transition class="accordion-body">
    <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6 dark:border-gray-800">
      @if(request('edit-cnc'))

          @include('tasks.sections.cnc-form',['cnc' => $cnc])

      @else
        @if($cnc->status == 'completed')
          @include('tasks.sections.cnc-data',['cnc' => $cnc])
      
        @else
        
            @include('tasks.sections.cnc-form',['cnc' => $cnc])
        @endif
        
 @endif
</div>
</div>
</div>

<!-- ================= EDGE BENDER ================= -->
<div class="">
  <button @click="active='edge-bender'" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-body rounded-base shadow-xs border border-default hover:text-heading hover:bg-neutral-secondary-medium gap-3 [&[aria-expanded='true']]:rounded-b-none [&[aria-expanded='true']]:shadow-none bg-orange-500 accordion-btn">
      <!-- LEFT -->
  <span class="font-semibold text-gray-800">
    Edge Bender
  </span>
    

       <!-- RIGHT -->
  <span class="flex items-center gap-2">
    <span class="px-2 py-0.5 rounded bg-green-600 text-white text-sm">
      @if(isset($edge)) 
       @if ($edge->status === 'completed') Completed  @else  Pending  @endif
       @else  Pending  @endif 
    </span>

    <svg class="w-4 h-4 text-white bg-gray-400 rounded-full p-0.5"
         fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M9 5l7 7-7 7" />
    </svg>
  </span>
  </button>

  <div x-show="active==='edge-bender'" x-transition class="accordion-body">
  <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6 dark:border-gray-800">
@if(request('edit-edge-bender'))

         @include('tasks.sections.edge-bender-form',['edge' => $edge])

      @else
        @if($edge->status == 'completed')
         @include('tasks.sections.edge-bender-data',['edge' => $edge])
      
        @else
        
           @include('tasks.sections.edge-bender-form',['edge' => $edge])
        @endif
        
 @endif
    <!-- PROCESS FORM -->
 
</div>
  </div>
</div>

<!-- ================= ASSEMBLY ================= -->
<div class="">
  <button @click="active='assembly'" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-body rounded-base shadow-xs border border-default hover:text-heading hover:bg-neutral-secondary-medium gap-3 [&[aria-expanded='true']]:rounded-b-none [&[aria-expanded='true']]:shadow-none bg-teal-500 accordion-btn">
     <span class="font-semibold text-gray-800">
    Assembly
  </span>
     <!-- RIGHT -->
  <span class="flex items-center gap-2">
    <span class="px-2 py-0.5 rounded bg-green-600 text-white text-sm">
      @if(isset($assembly)) 
       @if ($assembly->status === 'completed') Completed  @else  Pending  @endif
       @else  Pending  @endif 
    </span>

    <svg class="w-4 h-4 text-white bg-gray-400 rounded-full p-0.5"
         fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M9 5l7 7-7 7" />
    </svg>
  </span>
  </button>

  <div x-show="active==='assembly'" x-transition class="accordion-body">

    <!-- ASSEMBLY FORM -->
<div class="bg-white rounded-xl border p-6 space-y-6">
  @if(request('edit-assembly'))
         @include('tasks.sections.assembly-form',['assembly' => $assembly])
  @else
    @if(isset($assembly)) 
        @if($assembly->status == 'completed')
         @include('tasks.sections.assembly-data',['assembly' => $assembly])
      
        @else
        
          @include('tasks.sections.assembly-form',['assembly' => $assembly])
        @endif
      @else
      @include('tasks.sections.assembly-form',['assembly' => $assembly])
    @endif
  @endif
        

</div>
  </div>
</div>
<!-- ================= INSTALLING ================= -->
<div class=" rounded-lg">
  <button @click="active='installing'" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-body rounded-base shadow-xs border border-default hover:text-heading hover:bg-neutral-secondary-medium gap-3 [&[aria-expanded='true']]:rounded-b-none [&[aria-expanded='true']]:shadow-none bg-green-500 accordion-btn">
    <span class="font-semibold text-gray-800">
    Installing
  </span>

     <!-- RIGHT -->
  <span class="flex items-center gap-2">
    <span class="px-2 py-0.5 rounded bg-green-600 text-white text-sm">
      @if(isset($installing)) 
       @if ($installing->status === 'complete') Completed  @else  Pending  @endif
       @else  Pending  @endif 
    </span>

    <svg class="w-4 h-4 text-white bg-gray-400 rounded-full p-0.5"
         fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M9 5l7 7-7 7" />
    </svg>
  </span>
  </button> 
  <div x-show="active==='installing'" x-transition class="accordion-body">
  <div class="bg-white rounded-xl border p-6 space-y-6">

    @if(isset($installing)) 
        @if($installing->status == 'task_complete')
         @include('tasks.sections.installing-data',['installing' => $installing])
        @else
        
          @include('tasks.sections.installing-form',['installing' => $installing])
        @endif
      @else
      @include('tasks.sections.installing-form',['installing' => $installing])
    @endif
 
   </div>
  </div>
</div>

</div>

  </div>
</div>

              <!-- Task wrapper End -->
</div>

</x-app-layout>

