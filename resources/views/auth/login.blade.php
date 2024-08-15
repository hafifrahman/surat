@extends('layouts.guest')
@section('title', 'Login')

@section('content')
  <!-- Card -->
  <div
    class="w-full max-w-xl space-y-8 rounded-lg border border-slate-200 bg-white p-6 shadow dark:border-slate-700 dark:bg-slate-800 sm:p-8">
    <h2 class="text-2xl font-bold text-slate-900 dark:text-white">Login</h2>
    @if (session('status'))
      <div class="text-sm font-medium text-green-500 dark:text-green-400">
        {{ session('status') }}
      </div>
    @endif
    <form class="space-y-6" action="/login" method="post">
      @csrf
      <div>
        <x-label for="email" :value="__('Email')" />
        <x-input type="email" id="email" name="email" :value="old('email')" required autofocus />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
      </div>
      <div class="relative">
        <x-label for="password" :value="__('Password')" />
        <x-input type="password" id="password" name="password" class="pr-10" required />
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
@endsection
