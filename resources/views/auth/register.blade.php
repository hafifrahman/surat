@extends('layouts.guest')
@section('title', 'Register')

@section('content')
  <!-- Card -->
  <div
    class="w-full max-w-xl space-y-8 rounded-lg border border-slate-200 bg-white p-6 shadow dark:border-slate-700 dark:bg-slate-800 sm:p-8">
    <h2 class="text-2xl font-bold text-slate-900 dark:text-white">Register</h2>
    <form class="needs-validation space-y-6" action="/register" method="post">
      @csrf
      <div>
        <x-label for="name" :value="__('Name')" />
        <div class="relative">
          <x-input type="text" id="name" name="name" :value="old('name')" required autofocus />
          <span
            class="centang absolute inset-y-0 right-0 hidden items-center pr-3 text-2xl font-bold text-green-600 dark:text-green-500">&#10003;</span>
        </div>
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
      </div>
      <div>
        <x-label for="email" :value="__('Email')" />
        <div class="relative">
          <x-input type="email" id="email" name="email" :value="old('email')" required />
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
      <div class="sm:space-x-2">
        <x-primary-button class="mb-3 w-full px-5 py-3 sm:mb-0 sm:w-auto">Register</x-primary-button>
        <a href="/login">
          <x-secondary-button class="w-full px-5 py-3 sm:w-auto">Login</x-secondary-button>
        </a>
      </div>
    </form>
  </div>
  <script>
    const forms = document.querySelectorAll('.needs-validation');

    if (forms) {
      forms.forEach(form => {
        form.addEventListener('submit', (event) => {
          const inputs = form.querySelectorAll('input[type="text"], input[type="email"], input[type="password"]');
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
    }
  </script>
@endsection
