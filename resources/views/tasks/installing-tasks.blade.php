<x-app-layout>
   <div x-data="{ pageName: `Finised Tasks`}">
  <div class="flex flex-wrap items-center justify-between gap-3 pb-6 mb-6">
  <h2 class="text-xl font-semibold text-gray-800 dark:text-white/90" x-text="pageName">User</h2>
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
<div
  class="overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]"
>
 <div class="flex flex-col justify-between gap-5 border-b border-gray-200 px-5 py-4 sm:flex-row sm:items-center dark:border-gray-800">
    <div>
      <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">
      Installing Task List
      </h3>
    </div>
<div class="flex gap-3">
  @if(in_array(auth()->user()->userDetails->role->name, ['Admin']))
     <a href="{{ route('export.task') }}" class="shadow-theme-xs inline-flex items-center justify-center gap-2 rounded-lg bg-white px-4 py-3 text-sm font-medium text-gray-700 ring-1 ring-gray-300 transition hover:bg-gray-50 dark:bg-gray-800 dark:text-gray-400 dark:ring-gray-700 dark:hover:bg-white/[0.03]">
        Export
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
          <path d="M16.667 13.3333V15.4166C16.667 16.1069 16.1074 16.6666 15.417 16.6666H4.58295C3.89259 16.6666 3.33295 16.1069 3.33295 15.4166V13.3333M10.0013 13.3333L10.0013 3.33325M6.14547 9.47942L9.99951 13.331L13.8538 9.47942" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
      </a>
    @endif
    </div>
  </div>
  <div class="max-w-full overflow-x-auto">
    <table class="min-w-full">
      <!-- table header start -->
      <thead>
        <tr class="border-b border-gray-100 dark:border-gray-800">
          <th class="px-5 py-3 sm:px-6">
            <div class="flex items-center">
              <p
                class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                Task Title
              </p>
            </div>
          </th>
        <!--   <th class="px-5 py-3 sm:px-6">
            <div class="flex items-center">
              <p
                class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
               Description
              </p>
            </div>
          </th> -->
          <th class="px-5 py-3 sm:px-6">
            <div class="flex items-center">
              <p
                class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                Client name
              </p>
            </div>
          </th>

          <th class="px-5 py-3 sm:px-6">
            <div class="flex items-center">
              <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400"
              >
               Due Date
              </p>
            </div>
          </th>
          <th class="px-5 py-3 sm:px-6">
            <div class="flex items-center">
              <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400"
              >
                Download Pdf
              </p>
            </div>
          </th>
          <th class="px-5 py-3 sm:px-6">
            <div class="flex items-center">
              <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400"
              >
                Uploaded Image
              </p>
            </div>
          </th>
           <th class="px-5 py-3 sm:px-6">
            <div class="flex items-center">
              <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
               Action
              </p>
            </div>
          </th>
       
        </tr>
      </thead>
      <!-- table header end -->
      <!-- table body start -->
      <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
         @foreach($installingTasks as $task)
        <tr class="{{ $task->status == 'finished' ? 'bg-red-500' : 'bg-green-500' }}">
         <td class="px-5 py-4 sm:px-6" style="width: 10%;">
            <div class="flex items-center">
              <p class="text-white text-theme-sm dark:text-gray-400">
                 {{$task->title}}
              </p>
            </div>
          </td>
          <td class="px-5 py-4 sm:px-6" style="width: 10%;"> 
            <div class="flex items-center">
              <p class="text-white text-theme-sm dark:text-gray-400">
                  {{$task->designings->name}}
              </p>
            </div>
          </td>
          <td class="px-5 py-4 sm:px-6" style="width: 10%;">
            <div class="flex items-center">
              <div class="flex -space-x-2">
                 <p class="text-white text-theme-sm dark:text-gray-400">
              {{$task->date}}
              </p>
              </div>
            </div>
          </td>
          <td class="px-5 py-4 sm:px-6" style="width: 10%;">
            <div class="flex items-center">
             @if ($task->designings && $task->designings->layout_pdf) 
             <a class="rounded-full bg-success-50 px-2 py-0.5 text-theme-xs font-medium text-success-700 dark:bg-success-500/15 dark:text-success-500" href="{{ asset($task->designings->layout_pdf) }}" style="color:red"   download>Click</a>
            @endif
               
             
            </div> 
          </td>
          <td class="px-5 py-4 sm:px-6" style="width: 10%;">
            <div class="flex items-center">
            @if ($task->installing && $task->installing->pdf_file) 
             <a class="rounded-full bg-success-50 px-2 py-0.5 text-theme-xs font-medium text-success-700 dark:bg-success-500/15 dark:text-success-500" href="{{ asset($task->installing->pdf_file) }}" style="color:red"   download>Click</a>
            @endif
            </div> 
          </td>
          <td class="px-5 py-4 sm:px-6" style="width: 10%;">
            <div class="flex items-center">
                  <div x-data="{isModalOpen{{$task->id}}: false}">
  <button class="px-2 py-2 text-sm font-medium text-white rounded-lg bg-brand-500 shadow-theme-xs hover:bg-brand-600" @click="isModalOpen{{$task->id}} = !isModalOpen{{$task->id}}" {{ $task->status == 'finished' ? 'disabled' : '' }}>
   Comment
  </button>
    @if(in_array(auth()->user()->userDetails->role->name, ['Admin']))
  <form action="{{ route('task.destroy', $task->id) }}" method="POST"
      onsubmit="return confirm('Are you sure you want to delete this task?')">

    @csrf
    @method('DELETE')

    <button type="submit"
        class="px-2 py-2 text-sm font-medium text-white rounded-lg bg-brand-500 shadow-theme-xs hover:bg-brand-600">
        Delete
    </button>

</form>
  @endif
  <div x-show="isModalOpen{{$task->id}}" class="fixed inset-0 flex items-center justify-center p-5 overflow-y-auto modal z-99999" style="display: none;">
    <div class="modal-close-btn fixed inset-0 h-full w-full bg-gray-400/50 backdrop-blur-[32px]"></div>
    <div @click.outside="isModalOpen{{$task->id}} = false" class="relative w-full max-w-[584px] rounded-3xl bg-white p-6 dark:bg-gray-900 lg:p-10">
      <!-- close btn -->
      <button @click="isModalOpen{{$task->id}} = false" class="group absolute right-3 top-3 z-999 flex h-9.5 w-9.5 items-center justify-center rounded-full bg-gray-200 text-gray-500 transition-colors hover:bg-gray-300 hover:text-gray-500 dark:bg-gray-800 dark:hover:bg-gray-700 sm:right-6 sm:top-6 sm:h-11 sm:w-11">
        <svg class="transition-colors fill-current group-hover:text-gray-600 dark:group-hover:text-gray-200" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M6.04289 16.5413C5.65237 16.9318 5.65237 17.565 6.04289 17.9555C6.43342 18.346 7.06658 18.346 7.45711 17.9555L11.9987 13.4139L16.5408 17.956C16.9313 18.3466 17.5645 18.3466 17.955 17.956C18.3455 17.5655 18.3455 16.9323 17.955 16.5418L13.4129 11.9997L17.955 7.4576C18.3455 7.06707 18.3455 6.43391 17.955 6.04338C17.5645 5.65286 16.9313 5.65286 16.5408 6.04338L11.9987 10.5855L7.45711 6.0439C7.06658 5.65338 6.43342 5.65338 6.04289 6.0439C5.65237 6.43442 5.65237 7.06759 6.04289 7.45811L10.5845 11.9997L6.04289 16.5413Z" fill=""></path>
        </svg>
      </button>

      <form method="POST" action="{{route('store.installing',$task->id)}}" enctype="multipart/form-data">
  @csrf
        <h4 class="mb-6 text-lg font-medium text-gray-800 dark:text-white/90">
          {{$task->title}} Installation
        </h4>
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

        <div class="grid grid-cols-1 gap-x-6 gap-y-5">
          <div class="col-span-1">
            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
              Special Instructions
            </label>
            <textarea name="special_instructions" cols="50"  placeholder="Add any notes or issues..." class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm dark:bg-gray-900 dark:text-white" spellcheck="false"></textarea>
          </div>
           </div>
           <div class="grid grid-cols-1 gap-x-6 gap-y-5">
          <div class="col-span-1">
            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
             Missing stuff on job
    
            </label>
            <textarea name="missing_stuff" cols="50" placeholder="Add any missing stuff..." class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm dark:bg-gray-900 dark:text-white" spellcheck="false"></textarea>
          </div>
        </div>

        <div class="flex items-center justify-end w-full gap-3 mt-6">
          <button  @click="isModalOpen = false" type="button" class="flex w-full justify-center rounded-lg border border-gray-300 bg-white px-4 py-3 text-sm font-medium text-gray-700 shadow-theme-xs transition-colors hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200 sm:w-auto">
            Close
          </button>
          <button type="submit" class="flex justify-center w-full px-4 py-3 text-sm font-medium text-white rounded-lg bg-brand-500 shadow-theme-xs hover:bg-brand-600 sm:w-auto">
            Save Changes
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
          </td>

        </tr>
       @endforeach
      </tbody>
    </table>
  </div>
</div>

</x-app-layout>
