@extends('layouts.guest')
@section('title', 'Under Maintenance')

@section('content')
  <div class="mx-auto flex h-screen flex-col items-center justify-center px-6 dark:bg-gray-900 xl:px-0">
    <div class="mb-5 block md:max-w-md">
      <img src="{{ asset('/flowbite-template/static/images/illustrations/maintenance.svg') }}" alt="gambar pemeliharaan">
    </div>
    <div class="text-center xl:max-w-4xl">
      <h1 class="mb-3 text-2xl font-bold leading-tight text-gray-900 dark:text-white sm:text-4xl lg:text-5xl">Sedang dalam
        Pemeliharaan</h1>
      <p class="mb-5 text-base font-normal text-gray-500 dark:text-gray-400 md:text-lg">Maaf atas ketidaknyamanannya, kami
        sedang melakukan pemeliharaan saat ini. Kami akan segera kembali online!</p>
      <a href="/"
        class="mr-3 inline-flex items-center rounded-lg bg-primary-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
        <svg class="-ml-1 mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd"
            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
            clip-rule="evenodd"></path>
        </svg>
        Kembali ke beranda
      </a>
    </div>
  </div>
@endsection
