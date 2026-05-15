@if(in_array(auth()->user()->userDetails->role->name, ['Admin','Employees']))
@if(in_array(auth()->user()->userDetails->department->slug, ['designings', 'admin']))
 @if(request('edit-designing'))
 <form method="POST" action="{{ route('update.designing', $designing) }}" enctype="multipart/form-data" class="space-y-5">
    @csrf
    @method('PUT')
  @else
   <form method="POST" enctype="multipart/form-data" action="{{route('store.designing',$task->id)}}">
    @csrf

 @endif
                      <!-- <div class="-mx-2.5 flex flex-wrap gap-y-5"> -->
 <div class="-mx-2.5 gap-y-5">
                        <div class="w-full px-2.5">
                        <!-- SINGLE FILE UPLOAD -->
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

  <label class="form-label">Upload Images/PDF</label>

  <!-- Dropzone -->
  <label
    class="flex flex-col items-center justify-center border-2 border-dashed rounded-lg p-6 cursor-pointer
           bg-gray-50 hover:bg-gray-100 transition"
  >
    <input
      type="file"
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
<!-- EXISTING IMAGES & FILES -->

@if(isset($designing->images) && $designing->images->count())

<div class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-3">

    @foreach($designing->images as $img)

        @php
            $extension = strtolower(pathinfo($img->image_path, PATHINFO_EXTENSION));

            $imageExtensions = ['jpg', 'jpeg', 'png', 'webp', 'gif'];
        @endphp

        <div class="relative border rounded p-2">

            {{-- IMAGE PREVIEW --}}
            @if(in_array($extension, $imageExtensions))

                <img src="{{ asset($img->image_path) }}"
                     class="h-32 w-full object-cover rounded">

            @else

                {{-- FILE/PDF PREVIEW --}}
                <div class="h-32 flex flex-col items-center justify-center bg-gray-100 rounded">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-10 h-10 text-gray-500"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M7 7h10M7 11h10M7 15h6m5 5H6a2 2 0 01-2-2V6a2 2 0 012-2h7l5 5v9a2 2 0 01-2 2z" />
                    </svg>

                    <p class="text-sm mt-2 text-gray-600">
                        {{ strtoupper($extension) }} File
                    </p>

                </div>

            @endif

            {{-- DOWNLOAD BUTTON --}}
            <a href="{{ asset($img->image_path) }}"
               target="_blank"
               download
               class="block mt-2 text-sm text-blue-600 underline"> Download</a>

            {{-- DELETE CHECKBOX --}}
            <label class="absolute top-1 right-1 bg-white rounded p-1 shadow">

                <input type="checkbox"
                       name="deleted_images[]"
                       value="{{ $img->id }}">

                Delete

            </label>

        </div>

    @endforeach

</div>

@endif
@error('file')
<p class="mt-1 text-sm text-red-500" style="color: red">{{ $message }}</p>
@enderror
</div>
<div class="grid grid-cols-1 gap-x-6 gap-y-5 lg:grid-cols-2">
                            <div class="col-span-2 lg:col-span-1">
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    Name
                                </label>
                                <input type="text" name="name" placeholder="Enter Name" class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" value="{{ $designing->name ?? '' }}" required>
                                @error('name')
                                    <p class="mt-1 text-sm text-red-500" style="color: red">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-span-2 lg:col-span-1">
                                 <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    Email
                                </label>
                                <input type="text" name="email" placeholder="Enter email Address" class="dark:bg-dark-900 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" value="{{ $designing->email ?? '' }}">
                                @error('email')
                                    <p class="mt-1 text-sm text-red-500" style="color: red">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-2 lg:col-span-1">
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    Phone No
                                </label>
                                <input type="text" name="phone_no" placeholder="Enter Phone No" class="dark:bg-dark-900 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" value="{{ $designing->phone_no ?? '' }}" required>
                                @error('phone_no')
                                    <p class="mt-1 text-sm text-red-500" style="color: red">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-span-2 lg:col-span-1">
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    Lock Code
                                </label>
                                <input type="text" name="lock_code" placeholder="Enter Lock Code" class="dark:bg-dark-900 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" value="{{ $designing->lock_code ?? '' }}" >
                                @error('lock_code')
                                    <p class="mt-1 text-sm text-red-500" style="color: red">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-2 lg:col-span-1">
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    Address
                                </label>
                                <input type="text" name="address" placeholder="Enter Address" class="dark:bg-dark-900 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" value="{{ $designing->address ?? '' }}" >
                                @error('address')
                                    <p class="mt-1 text-sm text-red-500" style="color: red">{{ $message }}</p>
                                @enderror
                            </div>
                             <div class="col-span-2 lg:col-span-1">
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                     Installation Date 
                                </label>
                                <input type="text" name="installation_date" id="date" placeholder="Enter Installation Date " class="dark:bg-dark-900 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" value="{{ $designing->delivery_date ?? '' }}" required>
                                @error('installation_date')
                                    <p class="mt-1 text-sm text-red-500" style="color: red">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-span-2 lg:col-span-1">
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    Materials Types
                                </label>
                             <!--    
                                <select name="material" class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 z-20 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" :class="isOptionSelected &amp;&amp; 'text-gray-500 dark:text-gray-400'" @change="isOptionSelected = true" requiredrequired>
                              <option class="text-gray-500 dark:bg-gray-900 dark:text-gray-400">
                               Select Materials
                              </option>
                              @foreach($materials as $material)
                              <option value="{{$material->slug}}" class="text-gray-500 dark:bg-gray-900 dark:text-gray-400" 
                                @if(isset($designing->material)) {{ $material->slug==$designing->material ? 'selected' : ''  }} @endif >
                                {{$material->name}}
                              </option>
                              @endforeach
                            </select> -->
                            <textarea name="material" placeholder="Enter your Materials " rows="6" class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">{{ $designing->material ?? '' }}</textarea>
                            @error('material')
                                    <p class="mt-1 text-sm text-red-500" style="color: red">{{ $message }}</p>
                                @enderror
                            </div>
                             <div class="col-span-2 lg:col-span-1">
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                 Select Tape
                                </label>
                                    <textarea name="tape" placeholder="Enter your Tape " rows="6" class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">{{ $designing->tape ?? '' }}</textarea>
                             <!--    <select name="tape" class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 z-20 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" :class="isOptionSelected &amp;&amp; 'text-gray-500 dark:text-gray-400'" @change="isOptionSelected = true"required>
                              <option class="text-gray-500 dark:bg-gray-900 dark:text-gray-400">
                                Select Tape
                              </option>
                               @foreach($tapes as $tape)
                              <option value="{{$tape->slug}}" class="text-gray-500 dark:bg-gray-900 dark:text-gray-400" @if(isset($designing->tape)) {{ $tape->slug==$designing->tape ? 'selected' : ''  }} @endif>
                                {{$tape->name}}
                              </option>
                              @endforeach
                            </select> -->
                             @error('tape')
                                    <p class="mt-1 text-sm text-red-500" style="color: red">{{ $message }}</p>
                                @enderror
                            </div>
                             <div class="col-span-2 lg:col-span-1">
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                   Handel Name & Size
                                </label>
                                 <textarea name="handle_name_size" placeholder="Enter your Handel Name & Size " rows="6" class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">{{ $designing->tape ?? '' }}</textarea>
                             <!--    <select name="handle_name_size" class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 z-20 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" :class="isOptionSelected &amp;&amp; 'text-gray-500 dark:text-gray-400'" @change="isOptionSelected = true"required>
                              <option value="" class="text-gray-500 dark:bg-gray-900 dark:text-gray-400">
                                Select Handel Name & Size
                              </option>
                              @foreach($handels as $handel)
                              <option value="{{$handel->slug}}" class="text-gray-500 dark:bg-gray-900 dark:text-gray-400" @if(isset($designing->handle)) {{ $handel->slug==$designing->handle ? 'selected' : ''  }} @endif>
                                {{$handel->name}}
                              </option>
                              @endforeach
                            </select> -->
                             @error('handle_name_size') 
                                    <p class="mt-1 text-sm text-red-500" style="color: red">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                        <div class="w-full px-2.5 mt-6">
                          <h2 class="text-4xl font-bold text-center">Kitchen Color</h2>
                        </div>
                        <div class="grid grid-cols-1 gap-x-6 gap-y-5 lg:grid-cols-2">
                            <div class="col-span-2 lg:col-span-1">
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    Upper Cabinet
                                </label>
                                <input type="text" name="upper_cabinet" placeholder="Upper Cabinet" class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" value="{{ $designing->KitchenColor->upper_cabinet ?? '' }}">
                            </div>          
                            <div class="col-span-2 lg:col-span-1">
                                 <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    Riser
                                </label>
                                <input type="text" name="riser" placeholder="Enter Riser" class="dark:bg-dark-900 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" value="{{ $designing->KitchenColor->riser ?? '' }}">
                            </div>
                            <div class="col-span-2 lg:col-span-1">
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    Base Cabinet
                                </label>
                                <input type="text" name="base_cabinet" placeholder="Enter Base Cabinet" class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800"  value="{{ $designing->KitchenColor->base_cabinet ?? '' }}"> 
                            </div>          
                            <div class="col-span-2 lg:col-span-1">
                                 <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    Handle
                                </label>
                                <input type="text" name="handle" placeholder="Enter Handle" class="dark:bg-dark-900 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" value="{{ $designing->KitchenColor->handle ?? '' }}">
                            </div>
                             <div class="col-span-2 lg:col-span-1">
                                 <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    Island
                                </label>
                                <input type="text" name="island" placeholder="Enter Island" class="dark:bg-dark-900 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" value="{{ $designing->KitchenColor->island ?? '' }}">
                            </div>
                             <div class="col-span-2 lg:col-span-1">
                                 <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    Garbage Bin
                                </label>
                                <input type="text" name="garbage_bin" placeholder="Enter Garbage Bin" class="dark:bg-dark-900 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" value="{{ $designing->KitchenColor->garbage_bin ?? '' }}">
                            </div>
                             <div class="col-span-2 lg:col-span-1">
                                 <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    Vanities
                                </label>
                                <input type="text" name="vanities" placeholder="Enter Vanities" class="dark:bg-dark-900 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" value="{{ $designing->KitchenColor->vanities ?? '' }}">
                            </div>
                             <div class="col-span-2 lg:col-span-1">
                                 <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    Spice Rack
                                </label>
                                <input type="text" name="spice_rack" placeholder="Enter Spice Rack" class="dark:bg-dark-900 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" value="{{ $designing->KitchenColor->spice_rack ?? '' }}">
                            </div>
                          </div>
                         <div class="w-full px-2.5">
                          <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                            Special Instructions
                          </label>
                          <textarea placeholder="Enter your Instructions" name="content" rows="6"  class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">{{ $designing->content ?? '' }}</textarea>
                        </div>
                        <div class="w-full px-2.5"> 
                          <button type="submit" class="bg-brand-500 hover:bg-brand-600 w-full rounded-lg p-3 text-sm font-medium text-white transition-colors">
                             @if(request('edit-designing')) Update @else Submit @endif
                          </button>
                        </div>
                      </div>
                    </form>

                    @else
<p>You Don't have Access to this Section. Please connect to Admin</p>
@endif
@else
<p>You Can't Access to this Section.only Employee can Access. Please connect to Admin</p>
@endif