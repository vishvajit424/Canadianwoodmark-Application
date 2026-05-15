<x-app-layout>
   <div x-data="{ pageName: `User List`}">
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
      All Users List
      </h3>
      
    </div>
    <div class="flex gap-3">
    <!--   <button class="shadow-theme-xs inline-flex items-center justify-center gap-2 rounded-lg bg-white px-4 py-3 text-sm font-medium text-gray-700 ring-1 ring-gray-300 transition hover:bg-gray-50 dark:bg-gray-800 dark:text-gray-400 dark:ring-gray-700 dark:hover:bg-white/[0.03]">
        Export
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
          <path d="M16.667 13.3333V15.4166C16.667 16.1069 16.1074 16.6666 15.417 16.6666H4.58295C3.89259 16.6666 3.33295 16.1069 3.33295 15.4166V13.3333M10.0013 13.3333L10.0013 3.33325M6.14547 9.47942L9.99951 13.331L13.8538 9.47942" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
      </button> -->
      <a href="{{route('create.employee')}}" class="bg-brand-500 shadow-theme-xs hover:bg-brand-600 inline-flex items-center justify-center gap-2 rounded-lg px-4 py-3 text-sm font-medium text-white transition">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
          <path d="M5 10.0002H15.0006M10.0002 5V15.0006" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
        Add Employee
      </a>
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
                class="font-medium text-gray-500 text-theme-xs dark:text-gray-400"
              >
                User
              </p>
            </div>
          </th>
          <th class="px-5 py-3 sm:px-6">
            <div class="flex items-center">
              <p
                class="font-medium text-gray-500 text-theme-xs dark:text-gray-400"
              >
                Email
              </p>
            </div>
          </th>
           <th class="px-5 py-3 sm:px-6">
            <div class="flex items-center">
              <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                Role
              </p>
            </div>
          </th>
          <th class="px-5 py-3 sm:px-6">
            <div class="flex items-center">
              <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400"
              >
                Phone No
              </p>
            </div>
          </th>
          <th class="px-5 py-3 sm:px-6">
            <div class="flex items-center">
              <p
                class="font-medium text-gray-500 text-theme-xs dark:text-gray-400"
              >
                Status
              </p>
            </div>
          </th>
          <th class="px-5 py-3 sm:px-6">
            <div class="flex items-center">
              <p
                class="font-medium text-gray-500 text-theme-xs dark:text-gray-400"
              >
                Actions
              </p>
            </div>
          </th>
        </tr>
      </thead>
      <!-- table header end -->
      <!-- table body start -->
      <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
         @foreach($users as $user)
        <tr>
          <td class="px-5 py-4 sm:px-6">
            <div class="flex items-center">
              <div class="flex items-center gap-3">
                <div class="w-10 h-10 overflow-hidden rounded-full">
                  <img src="{{$user->userdetails->profile_image  ? asset('storage/' . $user->userdetails->profile_image)
                : asset('/assets/images/user/owner.jpg') }}" alt="brand" />
                </div>

                <div>
                  <span
                    class="block font-medium text-gray-800 text-theme-sm dark:text-white/90" >
                   {{$user->userdetails->first_name}} {{$user->userdetails->last_name}}
                  </span>
                  <span
                    class="block text-gray-500 text-theme-xs dark:text-gray-400">
                    {{$user->userdetails->department->slug}}
                  </span>
                </div>
              </div>
            </div>
          </td>
          <td class="px-5 py-4 sm:px-6">
            <div class="flex items-center">
              <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                 {{$user->email}}
              </p>
            </div>
          </td>
          <td class="px-5 py-4 sm:px-6">
            <div class="flex items-center">
              <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                
                 {{$user->userdetails->role->name}}
              </p>
            </div>
          </td>
          <td class="px-5 py-4 sm:px-6">
            <div class="flex items-center">
              <div class="flex -space-x-2">
               {{$user->userdetails->phone}}
              </div>
            </div>
          </td>
          <td class="px-5 py-4 sm:px-6">
            <div class="flex items-center">
              <p
                class="rounded-full bg-success-50 px-2 py-0.5 text-theme-xs font-medium text-success-700 dark:bg-success-500/15 dark:text-success-500"
              >
                Active
              </p>
            </div>
          </td>
          <td class="px-5 py-4 sm:px-6">
            <div class="flex items-center">
             <div class="flex items-center justify-center">
              <form method="POST" action="{{route('del.employee',$user->id)}}">
                @csrf 
              <button class="hover:text-error-500 dark:hover:text-error-500 text-gray-500 dark:text-gray-400">
              <svg class="cursor-pointer hover:fill-error-500 dark:hover:fill-error-500 fill-gray-700 dark:fill-gray-400" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.54142 3.7915C6.54142 2.54886 7.54878 1.5415 8.79142 1.5415H11.2081C12.4507 1.5415 13.4581 2.54886 13.4581 3.7915V4.0415H15.6252H16.666C17.0802 4.0415 17.416 4.37729 17.416 4.7915C17.416 5.20572 17.0802 5.5415 16.666 5.5415H16.3752V8.24638V13.2464V16.2082C16.3752 17.4508 15.3678 18.4582 14.1252 18.4582H5.87516C4.63252 18.4582 3.62516 17.4508 3.62516 16.2082V13.2464V8.24638V5.5415H3.3335C2.91928 5.5415 2.5835 5.20572 2.5835 4.7915C2.5835 4.37729 2.91928 4.0415 3.3335 4.0415H4.37516H6.54142V3.7915ZM14.8752 13.2464V8.24638V5.5415H13.4581H12.7081H7.29142H6.54142H5.12516V8.24638V13.2464V16.2082C5.12516 16.6224 5.46095 16.9582 5.87516 16.9582H14.1252C14.5394 16.9582 14.8752 16.6224 14.8752 16.2082V13.2464ZM8.04142 4.0415H11.9581V3.7915C11.9581 3.37729 11.6223 3.0415 11.2081 3.0415H8.79142C8.37721 3.0415 8.04142 3.37729 8.04142 3.7915V4.0415ZM8.3335 7.99984C8.74771 7.99984 9.0835 8.33562 9.0835 8.74984V13.7498C9.0835 14.1641 8.74771 14.4998 8.3335 14.4998C7.91928 14.4998 7.5835 14.1641 7.5835 13.7498V8.74984C7.5835 8.33562 7.91928 7.99984 8.3335 7.99984ZM12.4168 8.74984C12.4168 8.33562 12.081 7.99984 11.6668 7.99984C11.2526 7.99984 10.9168 8.33562 10.9168 8.74984V13.7498C10.9168 14.1641 11.2526 14.4998 11.6668 14.4998C12.081 14.4998 12.4168 14.1641 12.4168 13.7498V8.74984Z" fill=""></path>
              </svg>
            </button>
          </form>
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
