@if(in_array(auth()->user()->userDetails->role->name, ['Admin','Employees']))
@if(in_array(auth()->user()->userDetails->department->slug, ['measurements', 'admin']))
@if(request('edit-measurement'))
 <form method="POST" action="{{ route('measurement.update', $measurement->id) }}" enctype="multipart/form-data" class="space-y-5">
    @csrf
    @method('PUT')
  @else
    <form method="POST" action="{{route('store.measurement',$task->id)}}" enctype="multipart/form-data">
    @csrf

 @endif
      <div class="-mx-2.5 flex flex-wrap gap-y-5">
        <div class="w-full px-2.5 xl:w-1/2">
                          <!-- MULTI FILE UPLOAD -->
<div x-data="{
    files: [],
    handleFiles(event) {
      this.files = Array.from(event.target.files)
    },
    remove(index) {
      this.files.splice(index, 1)
    }
  }"
  class="space-y-3"
>

  <label class="form-label">Upload Images</label>

  <!-- Dropzone -->
  <label
    class="flex flex-col items-center justify-center border-2 border-dashed rounded-lg p-6 cursor-pointer
           bg-gray-50 hover:bg-gray-100 transition"
  >
    <input
      type="file"
      
      accept="image/*"
      class="hidden" 
      name="files[]"
      @change="handleFiles"
      multiple
    />

    <svg class="w-8 h-8 text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M7 16V4a4 4 0 018 0v12m-4 4v-4" />
    </svg>

    <p class="text-sm text-gray-600">
      Click to upload or drag & drop
    </p>
    <p class="text-xs text-gray-400">
      PNG, JPG, JPEG (multiple files)
    </p>
  </label>

  <!-- File List -->
  <template x-if="files.length">
    <div class="space-y-2">
      <template x-for="(file, index) in files" :key="index">
        <div class="flex items-center justify-between bg-white border rounded-lg p-2">
          <div class="flex items-center gap-3">
            <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 16V4a2 2 0 012-2h8l6 6v8a2 2 0 01-2 2H6a2 2 0 01-2-2z" />
            </svg>

            <div>
              <p class="text-sm font-medium" x-text="file.name"></p>
              <p class="text-xs text-gray-500"
                 x-text="(file.size/1024).toFixed(1) + ' KB'"></p>
            </div>
          </div>

          <button
            type="button"
            @click="remove(index)"
            class="text-red-500 hover:text-red-700 text-sm"
          >
            Remove
          </button>
        </div>
      </template>
    </div>
  </template>

</div>

                        </div>

<!-- EXISTING IMAGES -->
@if(isset($measurement->images))
<div class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-3">
@foreach($measurement->images as $img)
  <div class="relative border rounded">
    <img src="{{ asset($img->image_path) }}" class="h-32 w-full object-cover">

    <label class="absolute top-1 right-1 bg-white rounded p-1">
      <input type="checkbox" name="deleted_images[]" value="{{ $img->id }}">
      Delete
    </label>
  </div>
@endforeach
</div>
@endif
                        <div class="w-full px-2.5">
                          <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                            Comments
                          </label>
                          <textarea placeholder="Enter your message" name="comment" rows="6" class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">{{ $measurement->comment ?? ' '}} </textarea>
                        </div>

                        <div class="w-full px-2.5">
                          <div class="flex flex-col justify-between gap-5 xl:flex-row xl:items-center">
                            <div x-data="{ checkboxToggle: false }">
                              <label for="checkboxLabelOne" class="flex cursor-pointer items-center text-sm font-medium text-gray-700 select-none dark:text-gray-400">
                              </label>
                            </div>

                            <button type="submit" class="bg-brand-500 hover:bg-brand-600 flex w-full items-center justify-center gap-2 rounded-lg px-4 py-3 text-sm font-medium text-white xl:w-auto">
                             @if(request('edit-measurement')) Update @else Submit @endif

                              <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M17.4175 9.9986C17.4178 10.1909 17.3446 10.3832 17.198 10.53L12.2013 15.5301C11.9085 15.8231 11.4337 15.8233 11.1407 15.5305C10.8477 15.2377 10.8475 14.7629 11.1403 14.4699L14.8604 10.7472L3.33301 10.7472C2.91879 10.7472 2.58301 10.4114 2.58301 9.99715C2.58301 9.58294 2.91879 9.24715 3.33301 9.24715L14.8549 9.24715L11.1403 5.53016C10.8475 5.23717 10.8477 4.7623 11.1407 4.4695C11.4336 4.1767 11.9085 4.17685 12.2013 4.46984L17.1588 9.43049C17.3173 9.568 17.4175 9.77087 17.4175 9.99715C17.4175 9.99763 17.4175 9.99812 17.4175 9.9986Z" fill=""></path>
                              </svg>
                            </button>
                          </div>
                        </div>
                      </div>
</form>
@else
<p>You Don't have Access to this Section. Please connect to Admin</p>
@endif
@else
<p>You Can't Access to this Section.only Employee can Access. Please connect to Admin</p>
@endif