<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

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

  <body class="bg-slate-100 font-sans antialiased dark:bg-slate-900">

    <div class="pt:mt-0 mx-auto flex flex-col items-center justify-center px-6 pt-8 md:h-screen">
      @yield('content')
    </div>

    @stack('script')

  </body>

</html>
