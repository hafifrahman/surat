@extends('layouts.guest')
@section('title', 'Reset Password')

@section('content')
  <!-- Card -->
  <div class="w-full max-w-xl space-y-8 rounded-lg bg-white p-6 shadow dark:bg-slate-800 sm:p-8">
    <h2 class="text-2xl font-bold text-slate-900 dark:text-white">Reset password</h2>
    @if (session('status'))
      <div class="mb-4 text-sm font-medium text-green-500 dark:text-green-400">
        {{ session('status') }}
      </div>
    @endif
    <form class="mt-8 space-y-6" action="{{ route('password.update') }}" method="post">
      @csrf
      <input type="hidden" name="token" value="{{ $token }}">
      <div>
        <x-label for="email" :value="__('Email')" />
        <x-input type="email" id="email" name="email" :value="old('email')" required autofocus />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
      </div>
      <div>
        <x-label for="password" :value="__('Password')" />
        <x-input type="password" id="password" name="password" required />
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
      </div>
      <div>
        <x-label for="password_confirmation" :value="__('Konfirmasi Password')" />
        <x-input type="password" id="password_confirmation" name="password_confirmation" required />
        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
      </div>
      <x-primary-button class="w-full px-5 py-3 sm:w-auto">Reset password</x-primary-button>
    </form>
  </div>
@endsection
