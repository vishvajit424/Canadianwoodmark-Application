@if(in_array(auth()->user()->userDetails->role->name, ['Admin','Employees']))
@if(in_array(auth()->user()->userDetails->department->slug, ['installing', 'admin']))
<form method="POST" action="{{route('store.installing',$task->id)}}" enctype="multipart/form-data">
  @csrf
  <div class="w-full px-2.5">
<!-- SINGLE FILE UPLOAD -->
<div  x-data="{ file: null,
    handleFile(e) {
      this.file = e.target.files[0]
    },
    remove() {
      this.file = null
      $refs.input.value = ''
    }
  }"  
  class="space-y-3">

  <label class="form-label">Upload Installation Image</label>

  <!-- Upload Box -->
  <label
    class="flex flex-col items-center justify-center border-2 border-dashed rounded-lg p-6 cursor-pointer
           bg-gray-50 hover:bg-gray-100 transition"
  >
    <input
      x-ref="input"
      type="file"
      name="pdf_file"
      class="hidden"
      @change="handleFile"
    />

    <template x-if="!file">
      <div class="text-center">
        <svg class="w-8 h-8 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 4v12m6-6H6" />
        </svg>
        <p class="text-sm text-gray-600">Click to upload</p>
        <p class="text-xs text-gray-400">Image</p>
      </div>
    </template>

    <!-- File Preview -->
    <template x-if="file">
      <div class="flex items-center gap-3">
        <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 16V4a2 2 0 012-2h8l6 6v8a2 2 0 01-2 2H6a2 2 0 01-2-2z" />
        </svg>
        <div>
          <p class="text-sm font-medium" x-text="file.name"></p>
          <p class="text-xs text-gray-500"
             x-text="(file.size/1024).toFixed(1) + ' KB'"></p>
        </div>
      </div>
    </template>
  </label>

  <!-- Remove Button -->
  <template x-if="file">
    <button
      type="button"
      @click="remove"
      class="text-sm text-red-500 hover:text-red-700"
    >
      Remove file
    </button>
  </template>

</div>
@error('file')
                                    <p class="mt-1 text-sm text-red-500" style="color: red">{{ $message }}</p>
                                @enderror
</div>
   <label class="block text-sm font-medium text-gray-600 mb-1">
      Special Instructions
    </label>
    <textarea
    name="special_instructions"
      placeholder="Add any notes or issues..."
      class="w-full border rounded-lg p-2 h-24 focus:ring-2 focus:ring-blue-500"
    ></textarea>
 
    <label class="block text-sm font-medium text-gray-600 mb-1">
      Missing stuff on job
    </label>
    <textarea
    name="missing_stuff"
      placeholder="Add any notes or issues..."
      class="w-full border rounded-lg p-2 h-24 focus:ring-2 focus:ring-blue-500"
    ></textarea>
 
 <div class="w-full px-2.5">
  <button type="submit" class="bg-brand-500 hover:bg-brand-600 w-full rounded-lg p-3 text-sm font-medium text-white transition-colors"> Finished</button> 
  </div>
</form> 
@else
<p>You Don't have Access to this Section. Please connect to Admin</p>
@endif
@else
<p>You Can't Access to this Section.only Employee can Access. Please connect to Admin</p>
@endif