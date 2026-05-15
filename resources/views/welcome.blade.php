<!DOCTYPE html>
<html lang="en" class="dark">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>TailAdmin Laravel</title>

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body
  x-data="{ darkMode: $persist(true) }"
  :class="{ 'dark bg-gray-900': darkMode }"
>
  @include('layouts.partials.sidebar')

  <main class="lg:pl-72">
    @yield('content')
  </main>
</body>
</html>
