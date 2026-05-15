<x-app-layout>
  <div x-data="{ pageName: `Handel`}">
  <div class="flex flex-wrap items-center justify-between gap-3 pb-6 mb-6">
  <h2 class="text-xl font-semibold text-gray-800 dark:text-white/90" x-text="pageName">Handels</h2>
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
<div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
              <div class="space-y-6">
                <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                  <div class="px-5 py-4 sm:px-6 sm:py-5">
                    <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                      Create New Handel
                    </h3>
                  </div>
                  <form method="POST" action="{{route('create.handel')}}">
                    @csrf
                  <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6 dark:border-gray-800">
                    <!-- Elements -->
                    <div>
                      <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Department Name
                      </label>
                      <input type="text" name="handel_name" id="name" class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">
                    </div>
                    <div>
                      <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Slug
                      </label>
                  <input type="text" name="handel_slug" id="slug" class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"> 
                 </div>
                  <!-- Elements -->
                    <div class="w-full px-2.5">
                          <button type="submit" class="bg-brand-500 hover:bg-brand-600 w-full rounded-lg p-3 text-sm font-medium text-white transition-colors">
                            Submit
                          </button>
                        </div>
                  </div>
                </form>
                </div>

              </div>

              <div class="space-y-6">
                <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                  <div class="px-5 py-4 sm:px-6 sm:py-5">
                    <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                      Handel Lists
                    </h3>
                  </div>
                  <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6 dark:border-gray-800">
                    <!-- Elements -->
                    <div class="overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
  <div class="max-w-full overflow-x-auto custom-scrollbar">
    <table class="w-full min-w-[1102px]">
      <thead>
        <tr class="border-b border-gray-100 dark:border-gray-800">
          <th class="px-5 py-3 text-left sm:px-6">
            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
             Name
            </p>
          </th>
          <th class="px-5 py-3 text-left sm:px-6">
            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
              Slug
            </p>
          </th>
          <th class="px-5 py-3 text-left sm:px-6">
            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
              Action
            </p>
          </th>
        </tr>
      </thead>
      <tbody>
        
          @foreach($handels as $handel)
          <tr class="border-b border-gray-100 dark:border-gray-800">
          <td class="px-5 py-4 sm:px-6" colspan="1">
            <div class="flex items-center gap-3">
              <div>
                <span class="block font-medium text-gray-800 text-theme-sm dark:text-white/90">
                  {{$handel->name}}
                </span>
                <span class="block text-gray-500 text-theme-xs dark:text-gray-400">
                 
                </span>
              </div>
            </div>
          </td>
          <td class="px-5 py-4 sm:px-6">
            <p class="text-gray-500 text-theme-sm dark:text-gray-400">
              {{$handel->slug}}
            </p>
          </td>
           <td class="px-5 py-4 sm:px-6">
            <form method="POST" action="{{route('del.handel',$handel->id)}}">
              @csrf
            <button class="hover:text-error-500 dark:hover:text-error-500 text-gray-500 dark:text-gray-400">
                <svg class="fill-current" width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M7.04142 4.29199C7.04142 3.04935 8.04878 2.04199 9.29142 2.04199H11.7081C12.9507 2.04199 13.9581 3.04935 13.9581 4.29199V4.54199H16.1252H17.166C17.5802 4.54199 17.916 4.87778 17.916 5.29199C17.916 5.70621 17.5802 6.04199 17.166 6.04199H16.8752V8.74687V13.7469V16.7087C16.8752 17.9513 15.8678 18.9587 14.6252 18.9587H6.37516C5.13252 18.9587 4.12516 17.9513 4.12516 16.7087V13.7469V8.74687V6.04199H3.8335C3.41928 6.04199 3.0835 5.70621 3.0835 5.29199C3.0835 4.87778 3.41928 4.54199 3.8335 4.54199H4.87516H7.04142V4.29199ZM15.3752 13.7469V8.74687V6.04199H13.9581H13.2081H7.79142H7.04142H5.62516V8.74687V13.7469V16.7087C5.62516 17.1229 5.96095 17.4587 6.37516 17.4587H14.6252C15.0394 17.4587 15.3752 17.1229 15.3752 16.7087V13.7469ZM8.54142 4.54199H12.4581V4.29199C12.4581 3.87778 12.1223 3.54199 11.7081 3.54199H9.29142C8.87721 3.54199 8.54142 3.87778 8.54142 4.29199V4.54199ZM8.8335 8.50033C9.24771 8.50033 9.5835 8.83611 9.5835 9.25033V14.2503C9.5835 14.6645 9.24771 15.0003 8.8335 15.0003C8.41928 15.0003 8.0835 14.6645 8.0835 14.2503V9.25033C8.0835 8.83611 8.41928 8.50033 8.8335 8.50033ZM12.9168 9.25033C12.9168 8.83611 12.581 8.50033 12.1668 8.50033C11.7526 8.50033 11.4168 8.83611 11.4168 9.25033V14.2503C11.4168 14.6645 11.7526 15.0003 12.1668 15.0003C12.581 15.0003 12.9168 14.6645 12.9168 14.2503V9.25033Z" fill=""></path>
                </svg>
              </button>
          </td>
           </tr>
          @endforeach
       
      </tbody>
    </table>
  </div>
</div>


                    <!-- Elements -->
  


                  </div>
                </div>
              </div>
            </div>

</x-app-layout>
