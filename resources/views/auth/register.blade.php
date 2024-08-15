@extends('layouts.guest')
@section('title', 'Register')

@section('content')
  <!-- Card -->
  <div
    class="w-full max-w-xl space-y-8 rounded-lg border border-slate-200 bg-white p-6 shadow dark:border-slate-700 dark:bg-slate-800 sm:p-8">
    <h2 class="text-2xl font-bold text-slate-900 dark:text-white">Register</h2>
    <form class="space-y-6" action="/register" method="post">
      @csrf
      <div>
        <x-label for="name" :value="__('Name')" />
        <x-input type="text" id="name" name="name" :value="old('name')" required autofocus />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
      </div>
      <div>
        <x-label for="email" :value="__('Email')" />
        <x-input type="email" id="email" name="email" :value="old('email')" required />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
      </div>
      <div>
        <x-label for="password" :value="__('Password')" />
        <x-input type="password" id="password" name="password" required />
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
@endsection
