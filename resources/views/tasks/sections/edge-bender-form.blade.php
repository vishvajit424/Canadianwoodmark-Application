@if(in_array(auth()->user()->userDetails->role->name, ['Admin','Employees']))
@if(in_array(auth()->user()->userDetails->department->slug, ['edge-bender', 'admin']))
@php
$isAdmin = auth()->user()->userDetails->role->name === 'Admin';
@endphp
<div
  x-data="{
    base: {{ max(0,$edge->total_time) }},
    startedAt: {{ $edge->start_time ? $edge->start_time->timestamp : 'null' }},
    ended: {{ $edge->end_time ? 'true' : 'false' }},
    now: Math.floor(Date.now()/1000),

    init() {
      if (this.startedAt && !this.ended) {
        setInterval(()=>this.now++,1000)
      }
    },

    get elapsed() {
      return this.startedAt && !this.ended
        ? this.base + (this.now - this.startedAt)
        : this.base
    },

    format(s) {
      s = Math.max(0,s)
      let h=Math.floor(s/3600)
      let m=Math.floor((s%3600)/60)
      let sec=s%60
      return `${h}h ${m}m ${sec}s`
    }
  }"
  class="bg-white rounded-xl border p-6 space-y-6"
>

<!-- HEADER -->
<div class="flex justify-between">
  <h3 class="text-lg font-semibold">Edge Bender Timing</h3>
  <span class="font-mono bg-gray-100 px-3 py-1 rounded" x-text="format(elapsed)"></span>
</div>

<!-- CONTROLS -->
<div class="flex gap-3">
  <form method="POST" action="{{route('edge-bender.start',$edge->id)}}" class="flex-1">@csrf
    <!--<button  class="w-full py-2 rounded-lg font-medium text-white-->
    <!--           bg-red-600-->
    <!--           {{ $edge->end_time ? 'bg-gray-400 cursor-not-allowed' : 'bg-green-600' }}" style="background-color: green;" @disabled($edge->end_time)>-->
    <!--           @if($edge->total_time) {{' ▶ Restart'}} @else {{' ▶ Start'}} @endif-->
       
    <!--  </button>-->
    <button @disabled($edge->end_time && !$isAdmin)
  class="w-full py-2 rounded-lg font-medium text-white
  {{ $cnc->end_time && !$isAdmin ? 'bg-gray-400 cursor-not-allowed' : 'bg-green-600' }}"
style="background-color: green;">
  @if(isset($cnc->total_time))  ▶ Restart  @else  ▶ Start  @endif
</button>
  </form>

  <form method="POST" action="{{route('edge-bender.pause',$edge->id)}}" class="flex-1">@csrf
    <button
        @disabled($edge->end_time)
        class="w-full py-2 rounded-lg font-medium text-white
               bg-yellow-600
               {{ $edge->end_time ? 'bg-gray-400 cursor-not-allowed' : 'bg-dark-500' }}" style="background-color: #000;">
        ⏸ Pause
      </button>
  </form>

  <form method="POST" action="{{route('edge-bender.end',$edge->id)}}" class="flex-1">@csrf
    <button
        @disabled($edge->end_time)
        class="w-full py-2 rounded-lg font-medium text-white
               {{ $edge->end_time ? 'bg-gray-400 cursor-not-allowed' : 'bg-red-600' }}">
        ⏹ End
      </button>
   
  </form>
</div>

<!-- TOTAL -->
<div class="bg-gray-50 p-4 rounded">
  <p class="text-sm text-gray-600">Total Time</p>
  <p class="text-xl font-semibold" x-text="format(elapsed)"></p>
</div>

<!-- SAVE FORM -->
<form
  method="POST"
  action="{{ route('edge.finishing.save', $edge) }}"
>
  @csrf

  <label class="block text-sm font-medium text-gray-600 mb-2">
    Finishing Materials
  </label>

  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3 text-sm">
   
     @foreach($finishing_materials as $finish_material)
      <label class="flex items-center gap-2">
        <input
          type="checkbox"
          name="finishing_material[]"
          value="{{$finish_material->name}}"
          onchange="this.form.submit()"
           {{ in_array($finish_material->name, $edge->finishing_materials ?? []) ? 'checked' : '' }}
          @disabled($edge->ended_at)
          class="rounded border-gray-300"
        onchange="this.form.submit()">
         {{$finish_material->name}}
      </label>
    @endforeach
  </div>
  @if($edge->ended_at)
    <p class="text-xs text-gray-400 mt-2">
      🔒 Finishing materials locked after completion
    </p>
  @endif
</form>
<form method="POST" action="{{ route('edge-bender.save', $edge) }}" class="space-y-4">
  @csrf

<div>
    <label class="block text-sm font-medium text-gray-600 mb-1">  Missing Pieces </label>
<textarea name="missing_pieces" class="w-full border rounded p-2"
  placeholder="Missing pieces">{{ $edge->missing_pieces ?? ' ' }}</textarea>
</div>

 
<!-- SPECIAL INSTRUCTIONS -->
  <div>
    <label class="block text-sm font-medium text-gray-600 mb-1">
      Special Instructions
    </label>
<textarea name="special_instructions" class="w-full border rounded p-2"
  placeholder="Special instructions">{{ $edge->special_instructions ?? " " }}</textarea>
</div>
@if(!$edge->ended_at)
<button class="bg-brand-500 text-white w-full p-3 rounded">Submit</button>
@else
<p class="text-center text-sm text-gray-400">🔒 Edge Bender locked after completion</p>
@endif

</form>
@else
<p>You Don't have Access to this Section. Please connect to Admin</p>
@endif
@else
<p>You Can't Access to this Section.only Employee can Access. Please connect to Admin</p>
@endif
</div>