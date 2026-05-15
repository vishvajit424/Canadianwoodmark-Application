<x-app-layout>
  <div x-data="{ pageName: `All Tasks`}">
  <div class="flex flex-wrap items-center justify-between gap-3 pb-6 mb-2">
  <h2 class="text-xl font-semibold text-gray-800 dark:text-white/90" x-text="pageName">Role</h2>
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

<div x-data="{selectedTaskGroup: 'All'}" class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
              <!-- Task header Start -->
  <div class="flex flex-col items-center px-4 py-5 xl:px-6 xl:py-6">
  <div class="flex flex-col w-full gap-5 sm:justify-between xl:flex-row xl:items-center">
  <div class="flex flex-wrap items-center gap-x-1 gap-y-2 rounded-lg bg-gray-100 p-0.5 dark:bg-gray-900"><button
  @click="selectedTaskGroup = 'All'"
  class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium rounded-md group transition"
  :class="selectedTaskGroup === 'All'
    ? 'text-gray-900 dark:text-white bg-white dark:bg-gray-800'
    : 'text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white'">
  All
</button>
      <button
  @click="selectedTaskGroup = 'Measurements'"
  class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium rounded-md group transition"
  :class="selectedTaskGroup === 'Measurements'
    ? 'text-gray-900 dark:text-white bg-white dark:bg-gray-800'
    : 'text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white'">
  Measurements
<span
    class="inline-flex rounded-full px-2 py-0.5 text-xs font-medium leading-normal transition"
    :class="selectedTaskGroup === 'Measurements'
      ? 'bg-brand-50 text-brand-500 dark:bg-brand-500/15 dark:text-brand-400'
      : 'bg-white/[0.03] text-gray-400 group-hover:bg-brand-50 group-hover:text-brand-500 dark:group-hover:bg-brand-500/15 dark:group-hover:text-brand-400'"
  >
    {{ $measurements->count() }}
  </span>
</button>
<button class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium rounded-md group hover:text-gray-900 dark:hover:text-white text-gray-500 dark:text-gray-400" :class="selectedTaskGroup === 'Designing' ? 'text-gray-900 dark:text-white bg-white dark:bg-gray-800' : 'text-gray-500 dark:text-gray-400'" @click="selectedTaskGroup = 'Designing' ">
         Designing
        <span class="inline-flex rounded-full px-2 py-0.5 text-xs font-medium leading-normal group-hover:bg-brand-50 group-hover:text-brand-500 dark:group-hover:bg-brand-500/15 dark:group-hover:text-brand-400 bg-white dark:bg-white/[0.03]" :class="selectedTaskGroup === 'InProgress' ? 'text-brand-500 dark:text-brand-400 bg-brand-50 dark:bg-brand-500/15' : 'bg-white dark:bg-white/[0.03]'">
         {{ $designings->count() }}
        </span>
      </button>
<button class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium rounded-md group hover:text-gray-900 dark:hover:text-white text-gray-500 dark:text-gray-400" :class="selectedTaskGroup === 'CNC' ? 'text-gray-900 dark:text-white bg-white dark:bg-gray-800' : 'text-gray-500 dark:text-gray-400'" @click="selectedTaskGroup = 'CNC' ">CNC
<span class="inline-flex rounded-full px-2 py-0.5 text-xs font-medium leading-normal group-hover:bg-brand-50 group-hover:text-brand-500 dark:group-hover:bg-brand-500/15 dark:group-hover:text-brand-400 bg-white dark:bg-white/[0.03]" :class="selectedTaskGroup === 'C>C' ? 'text-brand-500 dark:text-brand-400 bg-brand-50 dark:bg-brand-500/15' : 'bg-white dark:bg-white/[0.03]'">
        {{ $cncs->count() }}
        </span>
</button>
<button class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium rounded-md group hover:text-gray-900 dark:hover:text-white text-gray-500 dark:text-gray-400" :class="selectedTaskGroup === 'Edge-Bender' ? 'text-gray-900 dark:text-white bg-white dark:bg-gray-800' : 'text-gray-500 dark:text-gray-400'" @click="selectedTaskGroup = 'Edge-Bender' ">
       Edge Bender
        <span class="inline-flex rounded-full px-2 py-0.5 text-xs font-medium leading-normal group-hover:bg-brand-50 group-hover:text-brand-500 dark:group-hover:bg-brand-500/15 dark:group-hover:text-brand-400 bg-white dark:bg-white/[0.03]" :class="selectedTaskGroup === 'Edge-Bender' ? 'text-brand-500 dark:text-brand-400 bg-brand-50 dark:bg-brand-500/15' : 'bg-white dark:bg-white/[0.03]'">
        {{ $edgebenders->count() }}
        </span>
</button>
<button class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium rounded-md group hover:text-gray-900 dark:hover:text-white text-gray-500 dark:text-gray-400" :class="selectedTaskGroup === 'Assembly' ? 'text-gray-900 dark:text-white bg-white dark:bg-gray-800' : 'text-gray-500 dark:text-gray-400'" @click="selectedTaskGroup = 'Assembly' ">
       Assembly
        <span class="inline-flex rounded-full px-2 py-0.5 text-xs font-medium leading-normal group-hover:bg-brand-50 group-hover:text-brand-500 dark:group-hover:bg-brand-500/15 dark:group-hover:text-brand-400 bg-white dark:bg-white/[0.03]" :class="selectedTaskGroup === 'Assembly' ? 'text-brand-500 dark:text-brand-400 bg-brand-50 dark:bg-brand-500/15' : 'bg-white dark:bg-white/[0.03]'">
         {{ $assemblys->count() }}
        </span>
</button>
<button class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium rounded-md group hover:text-gray-900 dark:hover:text-white text-gray-500 dark:text-gray-400" :class="selectedTaskGroup === 'Installing' ? 'text-gray-900 dark:text-white bg-white dark:bg-gray-800' : 'text-gray-500 dark:text-gray-400'" @click="selectedTaskGroup = 'Installing' ">
       Installing
        <span class="inline-flex rounded-full px-2 py-0.5 text-xs font-medium leading-normal group-hover:bg-brand-50 group-hover:text-brand-500 dark:group-hover:bg-brand-500/15 dark:group-hover:text-brand-400 bg-white dark:bg-white/[0.03]" :class="selectedTaskGroup === 'Installing' ? 'text-brand-500 dark:text-brand-400 bg-brand-50 dark:bg-brand-500/15' : 'bg-white dark:bg-white/[0.03]'">
         {{ $installings->count() }}
        </span>
</button>
    </div>
 
<div class="flex flex-wrap items-center gap-3 xl:justify-end">
  <div x-data="{ isTaskModalModal: false }">
    @if(in_array(auth()->user()->userDetails->role->name, ['Admin']))
      <button @click="isTaskModalModal = true" class="inline-flex items-center gap-2 rounded-lg bg-brand-500 px-4 py-2.5 text-sm font-medium text-white shadow-theme-xs hover:bg-brand-600">
        Add New Task
        <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M9.2502 4.99951C9.2502 4.5853 9.58599 4.24951 10.0002 4.24951C10.4144 4.24951 10.7502 4.5853 10.7502 4.99951V9.24971H15.0006C15.4148 9.24971 15.7506 9.5855 15.7506 9.99971C15.7506 10.4139 15.4148 10.7497 15.0006 10.7497H10.7502V15.0001C10.7502 15.4143 10.4144 15.7501 10.0002 15.7501C9.58599 15.7501 9.2502 15.4143 9.2502 15.0001V10.7497H5C4.58579 10.7497 4.25 10.4139 4.25 9.99971C4.25 9.5855 4.58579 9.24971 5 9.24971H9.2502V4.99951Z" fill=""></path>
        </svg>
      </button>
      @endif
 <div x-show="isTaskModalModal" class="fixed inset-0 flex items-center justify-center p-5 overflow-y-auto modal z-99999" style="display: none;">
  <div class="modal-close-btn fixed inset-0 h-full w-full bg-gray-400/50 backdrop-blur-[32px]"></div>
  <div @click.outside="isTaskModalModal = false" class="no-scrollbar relative w-full max-w-[700px] overflow-y-auto rounded-3xl bg-white p-6 dark:bg-gray-900 lg:p-11">
    <div class="px-2">
      <h4 class="mb-2 text-2xl font-semibold text-gray-800 dark:text-white/90">
        Add a new task
      </h4>
      <p class="mb-6 text-sm text-gray-500 dark:text-gray-400 lg:mb-7">
        Effortlessly manage your to-do list: add a new task
      </p>
    </div>
    <!-- close btn -->
    <button @click="isTaskModalModal = false" class="transition-color absolute right-5 top-5 z-999 flex h-8 w-8 items-center justify-center rounded-full bg-gray-100 text-gray-400 hover:bg-gray-200 hover:text-gray-600 dark:bg-gray-700 dark:bg-white/[0.05] dark:text-gray-400 dark:hover:bg-white/[0.07] dark:hover:text-gray-300 sm:h-11 sm:w-11">
      <svg class="fill-current size-5 sm:size-6" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M6.04289 16.5418C5.65237 16.9323 5.65237 17.5655 6.04289 17.956C6.43342 18.3465 7.06658 18.3465 7.45711 17.956L11.9987 13.4144L16.5408 17.9565C16.9313 18.347 17.5645 18.347 17.955 17.9565C18.3455 17.566 18.3455 16.9328 17.955 16.5423L13.4129 12.0002L17.955 7.45808C18.3455 7.06756 18.3455 6.43439 17.955 6.04387C17.5645 5.65335 16.9313 5.65335 16.5408 6.04387L11.9987 10.586L7.45711 6.04439C7.06658 5.65386 6.43342 5.65386 6.04289 6.04439C5.65237 6.43491 5.65237 7.06808 6.04289 7.4586L10.5845 12.0002L6.04289 16.5418Z" fill=""></path>
      </svg>
    </button>

    <form class="flex flex-col" method="POST" action="{{route('create.task')}}">
      @csrf
      <div class="custom-scrollbar h-[450px] overflow-y-auto px-2" @click.stop>
        <div class="grid grid-cols-1 gap-x-6 gap-y-5 sm:grid-cols-1">
          <div class="sm:col-span-2">
            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
              Task Title
            </label>
            <input type="text" name="task_title" class="dark:bg-dark-900 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pl-4 pr-11 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
          </div>
          @error('task_title')
            <p class="mt-1 text-sm text-red-500" style="color: red">{{ $message }}</p>
          @enderror
          <div>
            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
              Due Date
            </label>
            <div class="relative">
              <input type="date" name="task_date" id="date" placeholder="Select date" class="dark:bg-dark-900 input-date-icon h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pl-4 pr-11 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" >
              <span class="absolute right-3.5 top-1/2 -translate-y-1/2">
                <svg class="fill-gray-700 dark:fill-gray-400" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M4.33317 0.0830078C4.74738 0.0830078 5.08317 0.418794 5.08317 0.833008V1.24967H8.9165V0.833008C8.9165 0.418794 9.25229 0.0830078 9.6665 0.0830078C10.0807 0.0830078 10.4165 0.418794 10.4165 0.833008V1.24967L11.3332 1.24967C12.2997 1.24967 13.0832 2.03318 13.0832 2.99967V4.99967V11.6663C13.0832 12.6328 12.2997 13.4163 11.3332 13.4163H2.6665C1.70001 13.4163 0.916504 12.6328 0.916504 11.6663V4.99967V2.99967C0.916504 2.03318 1.70001 1.24967 2.6665 1.24967L3.58317 1.24967V0.833008C3.58317 0.418794 3.91896 0.0830078 4.33317 0.0830078ZM4.33317 2.74967H2.6665C2.52843 2.74967 2.4165 2.8616 2.4165 2.99967V4.24967H11.5832V2.99967C11.5832 2.8616 11.4712 2.74967 11.3332 2.74967H9.6665H4.33317ZM11.5832 5.74967H2.4165V11.6663C2.4165 11.8044 2.52843 11.9163 2.6665 11.9163H11.3332C11.4712 11.9163 11.5832 11.8044 11.5832 11.6663V5.74967Z" fill=""></path>
                </svg>
              </span>
            </div>
            @error('task_date')
            <p class="mt-1 text-sm text-red-500" style="color: red">{{ $message }}</p>
          @enderror
          </div>
   
          <div class="" style="display:none;">
            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
              Tags
            </label>
            <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent dark:bg-form-input">
              <select name="task_tag" class="dark:bg-dark-900 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" :class="isOptionSelected &amp;&amp; 'text-gray-800 dark:text-white/90'" @change="isOptionSelected = true">
                <option value="" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                  Kitchen
                </option>
              </select>
              <span class="absolute z-30 text-gray-500 -translate-y-1/2 right-4 top-1/2 dark:text-gray-400">
                <svg class="stroke-current" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M3.8335 5.9165L8.00016 10.0832L12.1668 5.9165" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
              </span>
            </div>
             @error('task_tag')
            <p class="mt-1 text-sm text-red-500" style="color: red">{{ $message }}</p>
          @enderror
          </div>

          <div>
            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
              Assignees
            </label>
  <select name="employees[]" id="multiselect"  multiple>
                @foreach($users as $user)
                <option value="{{$user->id}}" >
                  {{$user->name}}
                </option>
                @endforeach
              </select>
               @error('employees')
            <p class="mt-1 text-sm text-red-500" style="color: red">{{ $message }}</p>
          @enderror
          </div>

          <div class="sm:col-span-2">
            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
              Description
            </label>
            <textarea rows="6" name="description" class="dark:bg-dark-900 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800"></textarea>
          </div>
          @error('description')
                        <p class="mt-1 text-sm text-red-500" style="color: red">{{ $message }}</p>
          @enderror
        </div>
      </div>
      <div class="flex flex-col items-center gap-6 px-2 mt-6 sm:flex-row sm:justify-between">
        <div class="flex items-center w-full gap-3 sm:w-auto">
          <button @click="isTaskModalModal = false" type="button" class="flex w-full justify-center rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] sm:w-auto">
            Cancel
          </button>
          <button type="submit" class="flex w-full justify-center rounded-lg bg-brand-500 px-4 py-2.5 text-sm font-medium text-white hover:bg-brand-600 sm:w-auto">
            Create Task
          </button>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
    </div>
  </div>
</div>
<!-- Task header End -->
<!-- Task wrapper Start -->
<div class="mt-7 grid grid-cols-1 border-t border-gray-200 sm:mt-0 sm:grid-cols-2 xl:grid-cols-3 dark:border-gray-800">

                <!-- To do list -->
                <div x-show="selectedTaskGroup === 'All' || selectedTaskGroup === 'Measurements'" class="swim-lane bg-gray-50 flex flex-col gap-5 p-4 xl:p-6">
                  <div class="mb-1 flex items-center justify-between">
                    <h3 class="flex items-center gap-3 text-base font-medium text-gray-800 dark:text-white/90">
                     Measurements
                      <span class="text-theme-xs inline-flex rounded-full bg-gray-100 px-2 py-0.5 font-medium text-gray-700 dark:bg-white/[0.03] dark:text-white/80">
                         {{ $measurements->count() }}
                      </span>
                    </h3>

                    <div x-data="{openDropDown: false}" class="relative">
                      <button @click="openDropDown = !openDropDown" class="text-gray-700 dark:text-gray-400">
                        <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M5.99902 10.2451C6.96552 10.2451 7.74902 11.0286 7.74902 11.9951V12.0051C7.74902 12.9716 6.96552 13.7551 5.99902 13.7551C5.03253 13.7551 4.24902 12.9716 4.24902 12.0051V11.9951C4.24902 11.0286 5.03253 10.2451 5.99902 10.2451ZM17.999 10.2451C18.9655 10.2451 19.749 11.0286 19.749 11.9951V12.0051C19.749 12.9716 18.9655 13.7551 17.999 13.7551C17.0325 13.7551 16.249 12.9716 16.249 12.0051V11.9951C16.249 11.0286 17.0325 10.2451 17.999 10.2451ZM13.749 11.9951C13.749 11.0286 12.9655 10.2451 11.999 10.2451C11.0325 10.2451 10.249 11.0286 10.249 11.9951V12.0051C10.249 12.9716 11.0325 13.7551 11.999 13.7551C12.9655 13.7551 13.749 12.9716 13.749 12.0051V11.9951Z" fill=""></path>
                        </svg>
                      </button>
                      <div x-show="openDropDown" @click.outside="openDropDown = false" class="shadow-theme-md dark:bg-gray-dark absolute top-full right-0 z-40 w-[140px] space-y-1 rounded-2xl border border-gray-200 bg-white p-2 dark:border-gray-800" style="display: none;">
                        <button class="text-theme-xs flex w-full rounded-lg px-3 py-2 text-left font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                          Edit
                        </button>
                        <button class="text-theme-xs flex w-full rounded-lg px-3 py-2 text-left font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                          Delete
                        </button>
                        <button class="text-theme-xs flex w-full rounded-lg px-3 py-2 text-left font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                          Clear All
                        </button>
                      </div>
                    </div>
                  </div>
                  @foreach($measurements as $measurement)
                  <!-- task item -->
                  <div draggable="false" class="task shadow-theme-sm rounded-xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/5">
                    <a href="{{route('single.task',$measurement->id)}}">
                    <div class="flex items-start justify-between gap-6">
                      <div>
                        <h4 class="mb-5 text-base text-gray-800 dark:text-white/90">
                          {{$measurement->title}}
                        </h4>
                        <p class="mb-5 text-base text-gray-800 dark:text-white/90">
                          {{$measurement->description}}
                        </p>
                            
                        <div class="flex items-center gap-3">
                          Due Date:
                          <span class="flex cursor-pointer items-center gap-1 text-sm text-gray-500 dark:text-gray-400">
                            <svg class="fill-current" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M5.33329 1.0835C5.74751 1.0835 6.08329 1.41928 6.08329 1.8335V2.25016L9.91663 2.25016V1.8335C9.91663 1.41928 10.2524 1.0835 10.6666 1.0835C11.0808 1.0835 11.4166 1.41928 11.4166 1.8335V2.25016L12.3333 2.25016C13.2998 2.25016 14.0833 3.03366 14.0833 4.00016V6.00016L14.0833 12.6668C14.0833 13.6333 13.2998 14.4168 12.3333 14.4168L3.66663 14.4168C2.70013 14.4168 1.91663 13.6333 1.91663 12.6668L1.91663 6.00016L1.91663 4.00016C1.91663 3.03366 2.70013 2.25016 3.66663 2.25016L4.58329 2.25016V1.8335C4.58329 1.41928 4.91908 1.0835 5.33329 1.0835ZM5.33329 3.75016L3.66663 3.75016C3.52855 3.75016 3.41663 3.86209 3.41663 4.00016V5.25016L12.5833 5.25016V4.00016C12.5833 3.86209 12.4714 3.75016 12.3333 3.75016L10.6666 3.75016L5.33329 3.75016ZM12.5833 6.75016L3.41663 6.75016L3.41663 12.6668C3.41663 12.8049 3.52855 12.9168 3.66663 12.9168L12.3333 12.9168C12.4714 12.9168 12.5833 12.8049 12.5833 12.6668L12.5833 6.75016Z" fill=""></path>
                            </svg>
                            {{$measurement->date}}
                          </span>
                        </div>
                        <div class="mt-2">
                         @foreach($measurement->employees as $employee)
                          <span class="inline-block text-xs bg-gray-100 px-2 py-1 rounded">
                                    {{ $employee->name }}
                                </span>
                            @endforeach
                            </div>
                      </div>

                      <!-- <div class="h-6 w-full max-w-6 overflow-hidden rounded-full border-[0.5px] border-gray-200 dark:border-gray-800">
                        <img src="{{asset('assets/images/user/user-01.jpg')}}" alt="user">
                      </div> -->
                    </div>
                  </a>
                  </div>
                 @endforeach
                  <!-- task item -->
                </div>
                <!-- Progress list -->
                <div  x-show="selectedTaskGroup === 'All' || selectedTaskGroup === 'Designing'" class="swim-lane bg-blue-50 flex flex-col gap-5 border-x border-gray-200 p-4 xl:p-6 dark:border-gray-800">
                  <div class="mb-1 flex items-center justify-between">
                    <h3 class="flex items-center gap-3 text-base font-medium text-gray-800 dark:text-white/90">
                      Designing
                      <span class="bg-warning-50 text-theme-xs text-warning-700 dark:bg-warning-500/15 inline-flex rounded-full px-2 py-0.5 font-medium dark:text-orange-400">
                     {{$designings->count()}}
                      </span>
                    </h3>

                    <div x-data="{openDropDown: false}" class="relative">
                      <button @click="openDropDown = !openDropDown" class="text-gray-700 dark:text-gray-400">
                        <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M5.99902 10.2451C6.96552 10.2451 7.74902 11.0286 7.74902 11.9951V12.0051C7.74902 12.9716 6.96552 13.7551 5.99902 13.7551C5.03253 13.7551 4.24902 12.9716 4.24902 12.0051V11.9951C4.24902 11.0286 5.03253 10.2451 5.99902 10.2451ZM17.999 10.2451C18.9655 10.2451 19.749 11.0286 19.749 11.9951V12.0051C19.749 12.9716 18.9655 13.7551 17.999 13.7551C17.0325 13.7551 16.249 12.9716 16.249 12.0051V11.9951C16.249 11.0286 17.0325 10.2451 17.999 10.2451ZM13.749 11.9951C13.749 11.0286 12.9655 10.2451 11.999 10.2451C11.0325 10.2451 10.249 11.0286 10.249 11.9951V12.0051C10.249 12.9716 11.0325 13.7551 11.999 13.7551C12.9655 13.7551 13.749 12.9716 13.749 12.0051V11.9951Z" fill=""></path>
                        </svg>
                      </button>
                      <div x-show="openDropDown" @click.outside="openDropDown = false" class="shadow-theme-md dark:bg-gray-dark absolute top-full right-0 z-40 w-[140px] space-y-1 rounded-2xl border border-gray-200 bg-white p-2 dark:border-gray-800" style="display: none;">
                        <button class="text-theme-xs flex w-full rounded-lg px-3 py-2 text-left font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                          Edit
                        </button>
                        <button class="text-theme-xs flex w-full rounded-lg px-3 py-2 text-left font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                          Delete
                        </button>
                        <button class="text-theme-xs flex w-full rounded-lg px-3 py-2 text-left font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                          Clear All
                        </button>
                      </div>
                    </div>
                  </div>
                   @foreach($designings as $designing)
                  <!-- task item -->
                  <div draggable="true" class="task shadow-theme-sm rounded-xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/5">
                    <a href="{{route('single.task',$designing->id)}}">
                    <div class="flex items-start justify-between gap-6">
                      <div>
                        <h4 class="mb-5 text-base text-gray-800 dark:text-white/90">
                         {{$designing->title}}
                        </h4>
                        <p class="mb-5 text-base text-gray-800 dark:text-white/90">
                          {{$designing->description}}
                        </p>

                        <div class="flex items-center gap-3">
                          Due Date: 
                          <span class="flex cursor-pointer items-center gap-1 text-sm text-gray-500 dark:text-gray-400">
                            <svg class="fill-current" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M5.33329 1.0835C5.74751 1.0835 6.08329 1.41928 6.08329 1.8335V2.25016L9.91663 2.25016V1.8335C9.91663 1.41928 10.2524 1.0835 10.6666 1.0835C11.0808 1.0835 11.4166 1.41928 11.4166 1.8335V2.25016L12.3333 2.25016C13.2998 2.25016 14.0833 3.03366 14.0833 4.00016V6.00016L14.0833 12.6668C14.0833 13.6333 13.2998 14.4168 12.3333 14.4168L3.66663 14.4168C2.70013 14.4168 1.91663 13.6333 1.91663 12.6668L1.91663 6.00016L1.91663 4.00016C1.91663 3.03366 2.70013 2.25016 3.66663 2.25016L4.58329 2.25016V1.8335C4.58329 1.41928 4.91908 1.0835 5.33329 1.0835ZM5.33329 3.75016L3.66663 3.75016C3.52855 3.75016 3.41663 3.86209 3.41663 4.00016V5.25016L12.5833 5.25016V4.00016C12.5833 3.86209 12.4714 3.75016 12.3333 3.75016L10.6666 3.75016L5.33329 3.75016ZM12.5833 6.75016L3.41663 6.75016L3.41663 12.6668C3.41663 12.8049 3.52855 12.9168 3.66663 12.9168L12.3333 12.9168C12.4714 12.9168 12.5833 12.8049 12.5833 12.6668L12.5833 6.75016Z" fill=""></path>
                            </svg>
                             {{$designing->date}}
                          </span>
                        </div>
                      
                      <div class="mt-2">
                         @foreach($designing->employees as $employee)
                          <span class="inline-block text-xs bg-gray-100 px-2 py-1 rounded">
                                    {{ $employee->name }}
                                </span>
                            @endforeach
                        </div>
                        </div>
                     <!--  <div class="h-6 w-full max-w-6 overflow-hidden rounded-full border-[0.5px] border-gray-200 dark:border-gray-800">
                        <img src="{{asset('assets/images/user/user-09.jpg')}}" alt="user">
                      </div> -->
                    </div>
                  </a>
                  </div>
                   @endforeach
                  <!-- task item -->

                </div>
                <!-- CMC list -->
                <div x-show="selectedTaskGroup === 'All' || selectedTaskGroup === 'CNC'" class="swim-lane bg-purple-50 flex flex-col gap-5 border-x border-gray-200 p-4 xl:p-6 dark:border-gray-800">
                  <div class="mb-1 flex items-center justify-between">
                    <h3 class="flex items-center gap-3 text-base font-medium text-gray-800 dark:text-white/90">
                      CNC
                      <span class="bg-warning-50 text-theme-xs text-warning-700 dark:bg-warning-500/15 inline-flex rounded-full px-2 py-0.5 font-medium dark:text-orange-400">
                       {{$cncs->count()}}
                      </span>
                    </h3>

                    <div x-data="{openDropDown: false}" class="relative">
                      <button @click="openDropDown = !openDropDown" class="text-gray-700 dark:text-gray-400">
                        <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M5.99902 10.2451C6.96552 10.2451 7.74902 11.0286 7.74902 11.9951V12.0051C7.74902 12.9716 6.96552 13.7551 5.99902 13.7551C5.03253 13.7551 4.24902 12.9716 4.24902 12.0051V11.9951C4.24902 11.0286 5.03253 10.2451 5.99902 10.2451ZM17.999 10.2451C18.9655 10.2451 19.749 11.0286 19.749 11.9951V12.0051C19.749 12.9716 18.9655 13.7551 17.999 13.7551C17.0325 13.7551 16.249 12.9716 16.249 12.0051V11.9951C16.249 11.0286 17.0325 10.2451 17.999 10.2451ZM13.749 11.9951C13.749 11.0286 12.9655 10.2451 11.999 10.2451C11.0325 10.2451 10.249 11.0286 10.249 11.9951V12.0051C10.249 12.9716 11.0325 13.7551 11.999 13.7551C12.9655 13.7551 13.749 12.9716 13.749 12.0051V11.9951Z" fill=""></path>
                        </svg>
                      </button>
                      <div x-show="openDropDown" @click.outside="openDropDown = false" class="shadow-theme-md dark:bg-gray-dark absolute top-full right-0 z-40 w-[140px] space-y-1 rounded-2xl border border-gray-200 bg-white p-2 dark:border-gray-800" style="display: none;">
                        <button class="text-theme-xs flex w-full rounded-lg px-3 py-2 text-left font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                          Edit
                        </button>
                        <button class="text-theme-xs flex w-full rounded-lg px-3 py-2 text-left font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                          Delete
                        </button>
                        <button class="text-theme-xs flex w-full rounded-lg px-3 py-2 text-left font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                          Clear All
                        </button>
                      </div>
                    </div>
                  </div>

                  <!-- task item -->
                  @foreach($cncs as $cnc)
                  <div draggable="true" class="task shadow-theme-sm rounded-xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/5">
                    <a href="{{route('single.task',$cnc->id)}}">
                    <div class="flex items-start justify-between gap-6">
                      <div>
                        <h4 class="mb-5 text-base text-gray-800 dark:text-white/90">
                         {{$cnc->title}}
                        </h4>
                        <p class="mb-5 text-base text-gray-800 dark:text-white/90">
                          {{$cnc->description}}
                        </p>

                        <div class="flex items-center gap-3">
                          Due Date:
                          <span class="flex cursor-pointer items-center gap-1 text-sm text-gray-500 dark:text-gray-400">
                            <svg class="fill-current" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M5.33329 1.0835C5.74751 1.0835 6.08329 1.41928 6.08329 1.8335V2.25016L9.91663 2.25016V1.8335C9.91663 1.41928 10.2524 1.0835 10.6666 1.0835C11.0808 1.0835 11.4166 1.41928 11.4166 1.8335V2.25016L12.3333 2.25016C13.2998 2.25016 14.0833 3.03366 14.0833 4.00016V6.00016L14.0833 12.6668C14.0833 13.6333 13.2998 14.4168 12.3333 14.4168L3.66663 14.4168C2.70013 14.4168 1.91663 13.6333 1.91663 12.6668L1.91663 6.00016L1.91663 4.00016C1.91663 3.03366 2.70013 2.25016 3.66663 2.25016L4.58329 2.25016V1.8335C4.58329 1.41928 4.91908 1.0835 5.33329 1.0835ZM5.33329 3.75016L3.66663 3.75016C3.52855 3.75016 3.41663 3.86209 3.41663 4.00016V5.25016L12.5833 5.25016V4.00016C12.5833 3.86209 12.4714 3.75016 12.3333 3.75016L10.6666 3.75016L5.33329 3.75016ZM12.5833 6.75016L3.41663 6.75016L3.41663 12.6668C3.41663 12.8049 3.52855 12.9168 3.66663 12.9168L12.3333 12.9168C12.4714 12.9168 12.5833 12.8049 12.5833 12.6668L12.5833 6.75016Z" fill=""></path>
                            </svg>
                             {{$cnc->date}}
                          </span>

                        </div>
                      
                       <div class="mt-2">
                         @foreach($cnc->employees as $employee)
                          <span class="inline-block text-xs bg-gray-100 px-2 py-1 rounded">
                                    {{ $employee->name }}
                                </span>
                            @endforeach
                        </div>
                        </div>
                     <!--  <div class="h-6 w-full max-w-6 overflow-hidden rounded-full border-[0.5px] border-gray-200 dark:border-gray-800">
                        <img src="{{asset('assets/images/user/user-09.jpg')}}" alt="user">
                      </div> -->
                    </div>
                  </a>
                  </div>
                 @endforeach
                  <!-- task item -->
                </div>

                <!-- Edge Bender list -->
                <div x-show="selectedTaskGroup === 'All' || selectedTaskGroup === 'Edge-Bender'" class="swim-lane bg-orange-50 flex flex-col gap-5 p-4 xl:p-6">
                  <div class="mb-1 flex items-center justify-between">
                    <h3 class="flex items-center gap-3 text-base font-medium text-gray-800 dark:text-white/90">
                      Edge Bender
                      <span class="bg-success-50 text-theme-xs text-success-700 dark:bg-success-500/15 dark:text-success-500 inline-flex rounded-full px-2 py-0.5 font-medium">
                         {{$edgebenders->count()}}
                      </span>
                    </h3>

                    <div x-data="{openDropDown: false}" class="relative">
                      <button @click="openDropDown = !openDropDown" class="text-gray-700 dark:text-gray-400">
                        <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M5.99902 10.2451C6.96552 10.2451 7.74902 11.0286 7.74902 11.9951V12.0051C7.74902 12.9716 6.96552 13.7551 5.99902 13.7551C5.03253 13.7551 4.24902 12.9716 4.24902 12.0051V11.9951C4.24902 11.0286 5.03253 10.2451 5.99902 10.2451ZM17.999 10.2451C18.9655 10.2451 19.749 11.0286 19.749 11.9951V12.0051C19.749 12.9716 18.9655 13.7551 17.999 13.7551C17.0325 13.7551 16.249 12.9716 16.249 12.0051V11.9951C16.249 11.0286 17.0325 10.2451 17.999 10.2451ZM13.749 11.9951C13.749 11.0286 12.9655 10.2451 11.999 10.2451C11.0325 10.2451 10.249 11.0286 10.249 11.9951V12.0051C10.249 12.9716 11.0325 13.7551 11.999 13.7551C12.9655 13.7551 13.749 12.9716 13.749 12.0051V11.9951Z" fill=""></path>
                        </svg>
                      </button>
                      <div x-show="openDropDown" @click.outside="openDropDown = false" class="shadow-theme-md dark:bg-gray-dark absolute top-full right-0 z-40 w-[140px] space-y-1 rounded-2xl border border-gray-200 bg-white p-2 dark:border-gray-800" style="display: none;">
                        <button class="text-theme-xs flex w-full rounded-lg px-3 py-2 text-left font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                          Edit
                        </button>
                        <button class="text-theme-xs flex w-full rounded-lg px-3 py-2 text-left font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                          Delete
                        </button>
                        <button class="text-theme-xs flex w-full rounded-lg px-3 py-2 text-left font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                          Clear All
                        </button>
                      </div>
                    </div>
                  </div>

                  <!-- task item -->
                  @foreach($edgebenders as $edgebender)
                  <div draggable="true" class="task shadow-theme-sm rounded-xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/5">
                    <a href="{{route('single.task',$edgebender->id)}}">
                    <div class="flex items-start justify-between gap-6">
                      <div>
                        <h4 class="mb-5 text-base text-gray-800 dark:text-white/90">
                           {{$edgebender->title}}
                        </h4>
                        <p class="mb-5 text-base text-gray-800 dark:text-white/90">
                          {{$edgebender->description}}
                        </p>

                        <div class="flex items-center gap-3">
                          Due Date:
                          <span class="flex cursor-pointer items-center gap-1 text-sm text-gray-500 dark:text-gray-400">
                            <svg class="fill-current" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M5.33329 1.0835C5.74751 1.0835 6.08329 1.41928 6.08329 1.8335V2.25016L9.91663 2.25016V1.8335C9.91663 1.41928 10.2524 1.0835 10.6666 1.0835C11.0808 1.0835 11.4166 1.41928 11.4166 1.8335V2.25016L12.3333 2.25016C13.2998 2.25016 14.0833 3.03366 14.0833 4.00016V6.00016L14.0833 12.6668C14.0833 13.6333 13.2998 14.4168 12.3333 14.4168L3.66663 14.4168C2.70013 14.4168 1.91663 13.6333 1.91663 12.6668L1.91663 6.00016L1.91663 4.00016C1.91663 3.03366 2.70013 2.25016 3.66663 2.25016L4.58329 2.25016V1.8335C4.58329 1.41928 4.91908 1.0835 5.33329 1.0835ZM5.33329 3.75016L3.66663 3.75016C3.52855 3.75016 3.41663 3.86209 3.41663 4.00016V5.25016L12.5833 5.25016V4.00016C12.5833 3.86209 12.4714 3.75016 12.3333 3.75016L10.6666 3.75016L5.33329 3.75016ZM12.5833 6.75016L3.41663 6.75016L3.41663 12.6668C3.41663 12.8049 3.52855 12.9168 3.66663 12.9168L12.3333 12.9168C12.4714 12.9168 12.5833 12.8049 12.5833 12.6668L12.5833 6.75016Z" fill=""></path>
                            </svg>
                           {{$edgebender->date}}
                          </span>
    

                        </div>
                         <div class="mt-2">
                         @foreach($edgebender->employees as $employee)
                          <span class="inline-block text-xs bg-gray-100 px-2 py-1 rounded">
                                    {{ $employee->name }}
                                </span>
                            @endforeach
                        </div>
                      </div>

                     <!--  <div class="h-6 w-full max-w-6 overflow-hidden rounded-full border-[0.5px] border-gray-200 dark:border-gray-800">
                        <img src="{{asset('assets/images/user/user-09.jpg')}}" alt="user">
                      </div> -->
                    </div>
                  </a>
                  </div>
                   @endforeach
                </div>
               <!-- Assembly list -->
                <div x-show="selectedTaskGroup === 'All' || selectedTaskGroup === 'Assembly'" class="swim-lane bg-teal-50 flex flex-col gap-5 p-4 xl:p-6">
                  <div class="mb-1 flex items-center justify-between">
                    <h3 class="flex items-center gap-3 text-base font-medium text-gray-800 dark:text-white/90">
                      Assembly
                      <span class="bg-success-50 text-theme-xs text-success-700 dark:bg-success-500/15 dark:text-success-500 inline-flex rounded-full px-2 py-0.5 font-medium">
                        {{$assemblys->count()}}
                      </span>
                    </h3>

                    <div x-data="{openDropDown: false}" class="relative">
                      <button @click="openDropDown = !openDropDown" class="text-gray-700 dark:text-gray-400">
                        <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M5.99902 10.2451C6.96552 10.2451 7.74902 11.0286 7.74902 11.9951V12.0051C7.74902 12.9716 6.96552 13.7551 5.99902 13.7551C5.03253 13.7551 4.24902 12.9716 4.24902 12.0051V11.9951C4.24902 11.0286 5.03253 10.2451 5.99902 10.2451ZM17.999 10.2451C18.9655 10.2451 19.749 11.0286 19.749 11.9951V12.0051C19.749 12.9716 18.9655 13.7551 17.999 13.7551C17.0325 13.7551 16.249 12.9716 16.249 12.0051V11.9951C16.249 11.0286 17.0325 10.2451 17.999 10.2451ZM13.749 11.9951C13.749 11.0286 12.9655 10.2451 11.999 10.2451C11.0325 10.2451 10.249 11.0286 10.249 11.9951V12.0051C10.249 12.9716 11.0325 13.7551 11.999 13.7551C12.9655 13.7551 13.749 12.9716 13.749 12.0051V11.9951Z" fill=""></path>
                        </svg>
                      </button>
                      <div x-show="openDropDown" @click.outside="openDropDown = false" class="shadow-theme-md dark:bg-gray-dark absolute top-full right-0 z-40 w-[140px] space-y-1 rounded-2xl border border-gray-200 bg-white p-2 dark:border-gray-800" style="display: none;">
                        <button class="text-theme-xs flex w-full rounded-lg px-3 py-2 text-left font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                          Edit
                        </button>
                        <button class="text-theme-xs flex w-full rounded-lg px-3 py-2 text-left font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                          Delete
                        </button>
                        <button class="text-theme-xs flex w-full rounded-lg px-3 py-2 text-left font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                          Clear All
                        </button>
                      </div>
                    </div>
                  </div>
                  @foreach($assemblys as $assembly)
                  <!-- task item -->
                  <div draggable="true" class="task shadow-theme-sm rounded-xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/5">
                    <a href="{{route('single.task',$assembly->id)}}">

                    <div class="flex items-start justify-between gap-6">
                      <div>
                        <h4 class="mb-5 text-base text-gray-800 dark:text-white/90">
                         {{$assembly->title}}
                        </h4>
                        <p class="mb-5 text-base text-gray-800 dark:text-white/90">
                          {{$assembly->description}}
                        </p>

                        <div class="flex items-center gap-3">
                          Due Date:
                          <span class="flex cursor-pointer items-center gap-1 text-sm text-gray-500 dark:text-gray-400">
                            <svg class="fill-current" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M5.33329 1.0835C5.74751 1.0835 6.08329 1.41928 6.08329 1.8335V2.25016L9.91663 2.25016V1.8335C9.91663 1.41928 10.2524 1.0835 10.6666 1.0835C11.0808 1.0835 11.4166 1.41928 11.4166 1.8335V2.25016L12.3333 2.25016C13.2998 2.25016 14.0833 3.03366 14.0833 4.00016V6.00016L14.0833 12.6668C14.0833 13.6333 13.2998 14.4168 12.3333 14.4168L3.66663 14.4168C2.70013 14.4168 1.91663 13.6333 1.91663 12.6668L1.91663 6.00016L1.91663 4.00016C1.91663 3.03366 2.70013 2.25016 3.66663 2.25016L4.58329 2.25016V1.8335C4.58329 1.41928 4.91908 1.0835 5.33329 1.0835ZM5.33329 3.75016L3.66663 3.75016C3.52855 3.75016 3.41663 3.86209 3.41663 4.00016V5.25016L12.5833 5.25016V4.00016C12.5833 3.86209 12.4714 3.75016 12.3333 3.75016L10.6666 3.75016L5.33329 3.75016ZM12.5833 6.75016L3.41663 6.75016L3.41663 12.6668C3.41663 12.8049 3.52855 12.9168 3.66663 12.9168L12.3333 12.9168C12.4714 12.9168 12.5833 12.8049 12.5833 12.6668L12.5833 6.75016Z" fill=""></path>
                            </svg>
                            {{$assembly->date}}
                          </span>

                     
                        </div>
                          <div class="mt-2">
                         @foreach($assembly->employees as $employee)
                          <span class="inline-block text-xs bg-gray-100 px-2 py-1 rounded">
                                    {{ $employee->name }}
                                </span>
                            @endforeach
                        </div>
                      </div>

                     <!--  <div class="h-6 w-full max-w-6 overflow-hidden rounded-full border-[0.5px] border-gray-200 dark:border-gray-800">
                        <img src="{{asset('assets/images/user/user-09.jpg')}}" alt="user">
                      </div> -->
                    </div>
                  </a>
                  </div>
                  @endforeach

                  
                </div>
                <!-- Installing list -->
                <div x-show="selectedTaskGroup === 'All' || selectedTaskGroup === 'Installing'" class="swim-lane bg-green-50 flex flex-col gap-5 p-4 xl:p-6">
                  <div class="mb-1 flex items-center justify-between">
                    <h3 class="flex items-center gap-3 text-base font-medium text-gray-800 dark:text-white/90">
                      Installing
                      <span class="bg-success-50 text-theme-xs text-success-700 dark:bg-success-500/15 dark:text-success-500 inline-flex rounded-full px-2 py-0.5 font-medium">
                        {{$installings->count()}}
                      </span>
                    </h3>

                    <div x-data="{openDropDown: false}" class="relative">
                      <button @click="openDropDown = !openDropDown" class="text-gray-700 dark:text-gray-400">
                        <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M5.99902 10.2451C6.96552 10.2451 7.74902 11.0286 7.74902 11.9951V12.0051C7.74902 12.9716 6.96552 13.7551 5.99902 13.7551C5.03253 13.7551 4.24902 12.9716 4.24902 12.0051V11.9951C4.24902 11.0286 5.03253 10.2451 5.99902 10.2451ZM17.999 10.2451C18.9655 10.2451 19.749 11.0286 19.749 11.9951V12.0051C19.749 12.9716 18.9655 13.7551 17.999 13.7551C17.0325 13.7551 16.249 12.9716 16.249 12.0051V11.9951C16.249 11.0286 17.0325 10.2451 17.999 10.2451ZM13.749 11.9951C13.749 11.0286 12.9655 10.2451 11.999 10.2451C11.0325 10.2451 10.249 11.0286 10.249 11.9951V12.0051C10.249 12.9716 11.0325 13.7551 11.999 13.7551C12.9655 13.7551 13.749 12.9716 13.749 12.0051V11.9951Z" fill=""></path>
                        </svg>
                      </button>
                      <div x-show="openDropDown" @click.outside="openDropDown = false" class="shadow-theme-md dark:bg-gray-dark absolute top-full right-0 z-40 w-[140px] space-y-1 rounded-2xl border border-gray-200 bg-white p-2 dark:border-gray-800" style="display: none;">
                        <button class="text-theme-xs flex w-full rounded-lg px-3 py-2 text-left font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                          Edit
                        </button>
                        <button class="text-theme-xs flex w-full rounded-lg px-3 py-2 text-left font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                          Delete
                        </button>
                        <button class="text-theme-xs flex w-full rounded-lg px-3 py-2 text-left font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                          Clear All
                        </button>
                      </div>
                    </div>
                  </div>
                  @foreach($installings as $installing)
                  <!-- task item -->
                  <div draggable="true" class="task shadow-theme-sm rounded-xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/5">
                      <a href="{{route('single.task',$installing->id)}}">
                    <div class="flex items-start justify-between gap-6">
                      <div>
                        <h4 class="mb-5 text-base text-gray-800 dark:text-white/90">
                          {{$installing->title}}
                        </h4>
                         <p class="mb-5 text-base text-gray-800 dark:text-white/90">
                          {{$installing->description}}
                        </p>

                        <div class="flex items-center gap-3">
                          Due Date:
                          <span class="flex cursor-pointer items-center gap-1 text-sm text-gray-500 dark:text-gray-400">
                            <svg class="fill-current" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M5.33329 1.0835C5.74751 1.0835 6.08329 1.41928 6.08329 1.8335V2.25016L9.91663 2.25016V1.8335C9.91663 1.41928 10.2524 1.0835 10.6666 1.0835C11.0808 1.0835 11.4166 1.41928 11.4166 1.8335V2.25016L12.3333 2.25016C13.2998 2.25016 14.0833 3.03366 14.0833 4.00016V6.00016L14.0833 12.6668C14.0833 13.6333 13.2998 14.4168 12.3333 14.4168L3.66663 14.4168C2.70013 14.4168 1.91663 13.6333 1.91663 12.6668L1.91663 6.00016L1.91663 4.00016C1.91663 3.03366 2.70013 2.25016 3.66663 2.25016L4.58329 2.25016V1.8335C4.58329 1.41928 4.91908 1.0835 5.33329 1.0835ZM5.33329 3.75016L3.66663 3.75016C3.52855 3.75016 3.41663 3.86209 3.41663 4.00016V5.25016L12.5833 5.25016V4.00016C12.5833 3.86209 12.4714 3.75016 12.3333 3.75016L10.6666 3.75016L5.33329 3.75016ZM12.5833 6.75016L3.41663 6.75016L3.41663 12.6668C3.41663 12.8049 3.52855 12.9168 3.66663 12.9168L12.3333 12.9168C12.4714 12.9168 12.5833 12.8049 12.5833 12.6668L12.5833 6.75016Z" fill=""></path>
                            </svg>
                             {{$installing->date}}
                          </span>
                             </div> 
                            <div class="mt-2"> 
                         @foreach($installing->employees as $employee)
                          <span class="inline-block text-xs bg-gray-100 px-2 py-1 rounded">
                                    {{ $employee->name }}
                                </span>
                            @endforeach
                        </div>
   

                      </div>

                     <!--  <div class="h-6 w-full max-w-6 overflow-hidden rounded-full border-[0.5px] border-gray-200 dark:border-gray-800">
                        <img src="{{asset('assets/images/user/user-09.jpg')}}" alt="user">
                      </div> -->
                    </div>
                  </a>
                  </div>
                  @endforeach
                  
                </div>
              </div>

              <!-- Task wrapper End -->
            </div>

</x-app-layout>

