@if(in_array(auth()->user()->userDetails->role->name, ['Admin','Employees']))
@if(in_array(auth()->user()->userDetails->department->slug, ['assembly', 'admin']))

  @csrf
  <!-- HEADER -->
  <h3 class="text-lg font-semibold">Assembly Checklist <button onclick="location.reload()" 
    class="bg-blue-600 text-white px-4 py-2 rounded">
    🔄 Refresh
</button></h3>

  <!-- CHECKLIST -->
  <div class="mt-3">
    <label class="block text-sm font-medium text-gray-600 mb-2">
      Completed Items
    </label>
<form
  method="POST"
  action="{{ route('assembly.saveMissingPieces', $task->id) }}"
>
  @csrf
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3 text-sm">

      @foreach($assembly_checklists as $checklist)
    <label class="flex items-center gap-2">
      <input type="checkbox" name="completed_items[]" value="{{$checklist->name}}"   onchange="this.form.submit()" class="rounded border-gray-300" {{ in_array($checklist->name, $assembly->completed_items ?? []) ? 'checked' : '' }}  >
      
      {{$checklist->name}}
      @if($checklist->name == 'Cabinets' || $checklist->name == 'cabinets')
      <select name="cabinets_no" onchange="this.form.submit()">
      <option value="">Select</option>
          @for($i = 0; $i <= 100; $i++)
            <option value="{{ $i }}" {{ optional($assembly)->cabinets_size == $i ? 'selected' : '' }}>{{ $i }}</option>
          @endfor
       @endif
    </select>
    </label>

    @endforeach
    </div>
  </form>
  </div>
  <form method="POST" action="{{route('store.assembly',$task->id)}}">
        @csrf
  <!-- MISSING PIECES -->
  <div class="mt-3"> 
    <label class="block text-sm font-medium text-gray-600 mb-1">
      Missing Pieces
    </label>
    <textarea  name="missing_pieces" rows="3"
         placeholder="List any missing items"
        class="w-full border rounded-lg p-2"
      >{{$assembly->missing_pieces ?? ''}}</textarea>
  </div>
 <div class="w-full px-2.5 mt-3">
  <button type="submit" class="bg-brand-500 hover:bg-brand-600 w-full rounded-lg p-3 text-sm font-medium text-white transition-colors"> Submit</button>
  </div>
</form>
@else
<p>You Don't have Access to this Section. Please connect to Admin</p>
@endif
@else
<p>You Can't Access to this Section.only Employee can Access. Please connect to Admin</p>
@endif