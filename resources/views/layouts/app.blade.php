<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
      rel="stylesheet">

    <script>
      if (
        localStorage.getItem("color-theme") === "dark" ||
        (!("color-theme" in localStorage) &&
          window.matchMedia("(prefers-color-scheme: dark)").matches)
      ) {
        document.documentElement.classList.add("dark");
      } else {
        document.documentElement.classList.remove("dark");
      }
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>

  <body class="bg-slate-50 font-sans antialiased dark:bg-slate-900">

    @include('layouts.navbar')

    @include('layouts.sidebar')

    <div class="flex">
      <div id="main-content" class="relative h-full w-full overflow-y-auto pt-16 lg:ml-64">
        <x-notif />
        <x-input-error :messages="$errors->all()" type="alert" />
        @yield('content')
        @include('layouts.footer')
      </div>
    </div>

    <script src="{{ asset('js/main.js') }}"></script>
    {{-- @stack('js') --}}

  </body>

</html>
