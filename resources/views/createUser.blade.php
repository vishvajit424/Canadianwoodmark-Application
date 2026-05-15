<x-app-layout>
  
   <div x-data="{ pageName: `Create New User`}">
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
      <li class="text-sm text-gray-800 dark:text-white/90" x-text="pageName">New Employee</li>
    </ol>
  </nav>
</div>
</div>

<div class="space-y-6">

              <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="border-b border-gray-200 px-6 py-4 dark:border-gray-800">
                  <h2 class="text-lg font-medium text-gray-800 dark:text-white">
                    Employee Form
                  </h2>
                </div>
                <div class="p-4 sm:p-6 dark:border-gray-800">
                  <form method="POST" action="{{route('employee.store')}}">
                     @csrf  
                    <div class="grid grid-cols-1 gap-5 grid-cols-2">
                      <div>
                        
                        <label for="product-name" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">User Name</label>
                        <input type="text" id="username" name="username"  class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" placeholder="Enter Username" oninput="generateEmail()">
                        @error('username')
                        <p class="mt-1 text-sm text-red-500" style="color: red">{{ $message }}</p>
                        @enderror
                      </div>
                  <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                    <div class="">
                      <label class="mb-1 inline-block text-sm font-semibold text-gray-700 dark:text-gray-400">First Name</label>
                      <div class="flex h-11 divide-x divide-gray-300 overflow-hidden rounded-lg border border-gray-300 dark:divide-gray-800 dark:border-gray-700">
                     <input type="text" id="first-name" name="first_name" class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" placeholder="Enter First Name">
                      </div>
                      @error('first_name')
                        <p class="mt-1 text-sm text-red-500" style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                      <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Last Name
                      </label>
                    <input type="text" id="first-name" name="last_name" class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" placeholder="Enter Last Name">
                    @error('last_name')
                        <p class="mt-1 text-sm text-red-500" style="color: red">{{ $message }}</p>
                        @enderror
                    </div>

                  </div>
                  <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                    <div class="">
                      <label class="mb-1 inline-block text-sm font-semibold text-gray-700 dark:text-gray-400">Email</label>
                      <div class="flex h-11 divide-x divide-gray-300 overflow-hidden rounded-lg border border-gray-300 dark:divide-gray-800 dark:border-gray-700">
                     <input type="email" id="email" name="email" class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" placeholder="Enter Email" disabled>
                      </div>
                      @error('email')
                        <p class="mt-1 text-sm text-red-500" style="color: red">{{ $message }}</p>
                        @enderror
                        <script>
                          function generateEmail() {
                              let username = document.getElementById('username').value;

                              let email = username.toLowerCase().replace(/\s+/g, '') + "@gmail.com";

                              document.getElementById('email').value = email;
                          }
                          </script>
                    </div>
                    <div>
                      <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Phone No
                      </label>
                    <input type="text" id="phone" name="phone_no" class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" placeholder="Enter Phone No">
                    @error('phone_no')
                        <p class="mt-1 text-sm text-red-500" style="color: red">{{ $message }}</p>
                        @enderror
                    </div>

                  </div>
                  <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                    <div class="">
                      <label class="mb-1 inline-block text-sm font-semibold text-gray-700 dark:text-gray-400">Employee Department</label>
                       <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent">
                          <select name="department" class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" :class="isOptionSelected &amp;&amp; 'text-gray-800 dark:text-white/90'" @change="isOptionSelected = true">
                            <option value="" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                              Select Department
                            </option>
                            @foreach($departments as $department)
                            <option value="{{$department->id}}" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                              {{$department->name}}
                            </option>
                             @endforeach
                          </select>
                          <span class="pointer-events-none absolute top-1/2 right-4 z-30 -translate-y-1/2 text-gray-700 dark:text-gray-400">
                            <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                          </span>
                          @error('department')
                        <p class="mt-1 text-sm text-red-500" style="color: red">{{ $message }}</p>
                        @enderror
                        </div>
                    </div>
                    <div>
                      <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Employee Role
                      </label>
                    <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent">
                          <select name="role_id" class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" :class="isOptionSelected &amp;&amp; 'text-gray-800 dark:text-white/90'" @change="isOptionSelected = true">
                            <option value="" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                              Select Role
                            </option>
                             @foreach($roles as $role)
                            <option value="{{$role->id}}" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                              {{$role->name}}
                            </option>
                            @endforeach
                          </select>
                          <span class="pointer-events-none absolute top-1/2 right-4 z-30 -translate-y-1/2 text-gray-700 dark:text-gray-400">
                            <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                          </span>
                           @error('role_id')
                        <p class="mt-1 text-sm text-red-500" style="color: red">{{ $message }}</p>
                        @enderror
                        </div>
                    </div>
                  </div>
                      <div class="col-span-full">
                        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                          Biography
                        </label>
                        <textarea placeholder="Biography" name="bio" type="text" rows="7" class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 w-full resize-none rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"></textarea>
                         @error('bio')
                        <p class="mt-1 text-sm text-red-500" style="color: red">{{ $message }}</p>
                        @enderror
                      </div>
                        <!-- Button -->
              <div class="flex flex-col gap-3 sm:flex-row sm:justify-end">
                <button class="bg-brand-500 shadow-theme-xs hover:bg-brand-600 inline-flex items-center justify-center gap-2 rounded-lg px-4 py-3 text-sm font-medium text-white transition">
                  Cancel
                </button>
                <button type="submit" class="bg-brand-500 shadow-theme-xs hover:bg-brand-600 inline-flex items-center justify-center gap-2 rounded-lg px-4 py-3 text-sm font-medium text-white transition">
                  Create User
                </button>
              </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
</x-app-layout>
