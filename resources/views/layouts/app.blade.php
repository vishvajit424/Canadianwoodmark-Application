<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta
      name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
    />    
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            .bg-blue-50 {
           --tw-bg-opacity: 1;
    background-color: rgb(239 246 255 / var(--tw-bg-opacity, 1));
             }
             .bg-purple-50 {
                --tw-bg-opacity: 1;
    background-color: rgb(250 245 255 / var(--tw-bg-opacity, 1));
             }
             .bg-orange-50{
                --tw-bg-opacity: 1;
            background-color: rgb(255 247 237 / var(--tw-bg-opacity, 1));
             }
             .bg-teal-50 {
    --tw-bg-opacity: 1;
    background-color: rgb(240 253 250 / var(--tw-bg-opacity, 1));
}
.bg-green-50 {
    --tw-bg-opacity: 1;
    background-color: rgb(240 253 244 / var(--tw-bg-opacity, 1));
}
.bg-green-500 {
    --tw-bg-opacity: 1;
    background-color: rgb(34 197 94 / var(--tw-bg-opacity, 1));
}
.bg-blue-500 {
    --tw-bg-opacity: 1;
    background-color: rgb(59 130 246 / var(--tw-bg-opacity, 1));
}
.bg-purple-500 {
                --tw-bg-opacity: 1;
    background-color: rgb(173 91 255 / var(--tw-bg-opacity, 1));
             }
.bg-orange-500{
                --tw-bg-opacity: 1;
            background-color: rgb(248 161 51 / var(--tw-bg-opacity, 1));
             }
.bg-teal-500 {
    --tw-bg-opacity: 1;
    background-color: rgb(85 255 216 / var(--tw-bg-opacity, 1));
}
.bg-red-500{
    --tw-bg-opacity: 1;
    background-color: rgb(255 0 65 / var(--tw-bg-opacity, 1));
}

        </style>
    </head>
    <body
    x-data="{ page: 'dashboard', 'loaded': true, 'darkMode': false, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }"
    x-init="
         darkMode = JSON.parse(localStorage.getItem('darkMode'));
         $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
    :class="{'dark bg-gray-900': darkMode === true}"
  >
    <!-- ===== Preloader Start ===== -->
   @include('layouts.partials.preloaded')
    <!-- ===== Preloader End ===== -->

    <!-- ===== Page Wrapper Start ===== -->
    <div class="flex h-screen overflow-hidden">
      <!-- ===== Sidebar Start ===== -->
       @include('layouts.partials.sidebar')
      <!-- ===== Sidebar End ===== -->

      <!-- ===== Content Area Start ===== -->
      <div
        class="relative flex flex-col flex-1 overflow-x-hidden overflow-y-auto"
      >
        <!-- Small Device Overlay Start -->
       @include('layouts.partials.overlay')
        <!-- Small Device Overlay End -->

        <!-- ===== Header Start ===== -->
        @include('layouts.partials.header')
        <!-- ===== Header End ===== -->

        <!-- ===== Main Content Start ===== -->
        <main>
          <div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6">
            @if (session('success'))
            <div x-data="{ show: true }"
    x-init="setTimeout(() => show = false, 3000)"
    x-show="show"
    x-transition class="rounded-xl border border-success-500 bg-success-50 p-4 dark:border-success-500/30 dark:bg-success-500/15">
                  <div class="flex items-start gap-3">
                    <div class="-mt-0.5 text-success-500">
                      <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M3.70186 12.0001C3.70186 7.41711 7.41711 3.70186 12.0001 3.70186C16.5831 3.70186 20.2984 7.41711 20.2984 12.0001C20.2984 16.5831 16.5831 20.2984 12.0001 20.2984C7.41711 20.2984 3.70186 16.5831 3.70186 12.0001ZM12.0001 1.90186C6.423 1.90186 1.90186 6.423 1.90186 12.0001C1.90186 17.5772 6.423 22.0984 12.0001 22.0984C17.5772 22.0984 22.0984 17.5772 22.0984 12.0001C22.0984 6.423 17.5772 1.90186 12.0001 1.90186ZM15.6197 10.7395C15.9712 10.388 15.9712 9.81819 15.6197 9.46672C15.2683 9.11525 14.6984 9.11525 14.347 9.46672L11.1894 12.6243L9.6533 11.0883C9.30183 10.7368 8.73198 10.7368 8.38051 11.0883C8.02904 11.4397 8.02904 12.0096 8.38051 12.3611L10.553 14.5335C10.7217 14.7023 10.9507 14.7971 11.1894 14.7971C11.428 14.7971 11.657 14.7023 11.8257 14.5335L15.6197 10.7395Z" fill=""></path>
                      </svg>
                    </div>

                    <div>
                      <h4 class="mb-1 text-sm font-semibold text-gray-800 dark:text-white/90">
                       {{ session('success') }}
                      </h4>
                    </div>
                  </div>
            </div>
            @endif
            
@error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
            {{ $slot }}
            
          </div>
        </main>
        <!-- ===== Main Content End ===== -->
      </div>
      <!-- ===== Content Area End ===== -->
    </div>
    <!-- ===== Page Wrapper End ===== -->
  </body>
</html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css">
<script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
function previewImage(event) {
    const reader = new FileReader();
    reader.onload = () => {
        document.getElementById('preview').src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}
$(document).ready(function () {
   $("#name").keyup(function() {
  var Text = $(this).val();
  Text = Text.toLowerCase();
  Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
  $("#slug").val(Text);        
});
});
 flatpickr("#date", {  minDate: "today", dateFormat: "Y-m-d"});

 new TomSelect("#multiselect", {
    plugins: ['remove_button'],
    placeholder: "Select Users"
  });

function updateCabinetsno(el, taskId) {

    fetch(`/store/assembly/${taskId}`, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json", // 🔥 IMPORTANT
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            cabinets_size: el.value
        })
    })
    .then(res => res.json())
    .then(data => {
        console.log('Saved:', data);
    })
    .catch(err => {
        console.error(err);
        alert('Error saving data');
    });
}

</script>

