@extends('layouts.guest')
@section('title', 'Login')

@section('content')
  <!-- Card -->
  <div
    class="w-full max-w-xl space-y-8 rounded-lg border border-slate-200 bg-white p-6 shadow dark:border-slate-700 dark:bg-slate-800 sm:p-8">
    <h2 class="text-2xl font-bold text-slate-900 dark:text-white">Login</h2>
    @session('status')
      <div class="text-sm font-medium text-green-500 dark:text-green-400">
        <div
          class="flex items-center rounded-lg border border-green-300 bg-green-50 p-4 text-sm text-green-800 dark:border-green-800 dark:bg-slate-800 dark:text-green-400"
          role="alert">
          <svg class="me-3 inline h-4 w-4 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="currentColor" viewBox="0 0 20 20">
            <path
              d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
          </svg>
          <span class="sr-only">Info</span>
          <span class="font-medium">{{ session('status') }}</span>
        </div>
      </div>
    @endsession
    <form class="needs-validation space-y-6" action="/login" method="post">
      @csrf
      <div>
        <x-label for="email" :value="__('Email')" />
        <div class="relative">
          <x-input type="email" id="email" name="email" :value="old('email')" required autofocus />
          <span
            class="centang absolute inset-y-0 right-0 hidden items-center pr-3 text-2xl font-bold text-green-600 dark:text-green-500">&#10003;</span>
        </div>
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
      </div>
      <div>
        <x-label for="password" :value="__('Password')" />
        <div class="relative">
          <x-input type="password" id="password" name="password" required />
          <span
            class="centang absolute inset-y-0 right-0 hidden items-center pr-3 text-2xl font-bold text-green-600 dark:text-green-500">&#10003;</span>
        </div>
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
      </div>
      <div class="flex items-start">
        <div class="flex h-5 items-center">
          <input id="remember" aria-describedby="remember" name="remember" type="checkbox"
            class="h-4 w-4 rounded border-slate-300 bg-slate-50 focus:ring-2 focus:ring-primary-300 dark:border-slate-600 dark:bg-slate-700 dark:ring-offset-slate-800 dark:focus:ring-primary-600">
        </div>
        <div class="ml-3 text-sm">
          <label for="remember" class="font-medium text-slate-900 dark:text-white">Remember me</label>
        </div>
        <a href="/forgot-password"
          class="ml-auto text-sm font-medium text-primary-700 hover:underline dark:text-primary-500">Lupa
          Password?</a>
      </div>
      <div class="sm:space-x-2">
        <x-primary-button class="mb-3 w-full px-5 py-3 sm:mb-0 sm:w-auto">Login</x-primary-button>
        <a href="/register">
          <x-secondary-button class="w-full px-5 py-3 sm:w-auto">Register</x-secondary-button>
        </a>
      </div>
    </form>
  </div>
  <script>
    const forms = document.querySelectorAll('.needs-validation');

    forms.forEach(form => {
      form.addEventListener('submit', (event) => {
        const inputs = form.querySelectorAll('input[type="email"], input[type="password"]');
        const checkmark = form.querySelectorAll('.centang');

        inputs.forEach(input => {
          input.classList.add('valid');
          input.classList.remove('invalid');
        });

        checkmark.forEach(check => {
          check.classList.remove('hidden');
          check.classList.add('flex');
        });
      });
    });
  </script>
@endsection
