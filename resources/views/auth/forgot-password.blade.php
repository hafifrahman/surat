@extends('layouts.guest')
@section('title', 'Forgot Password')

@section('content')
  <!-- Card -->
  <div
    class="w-full rounded-lg border border-slate-200 bg-white shadow dark:border-slate-700 dark:bg-slate-800 sm:max-w-md md:mt-0 xl:p-0">
    <div class="w-full p-6 sm:p-8">
      <h2 class="mb-3 text-2xl font-bold text-slate-900 dark:text-white">Lupa Password</h2>
      <p class="text-base font-normal text-slate-500 dark:text-slate-400">Masukkan email yang terdaftar!</p>
      @if (session('status'))
        <div class="text-sm font-medium text-green-500 dark:text-green-400">
          {{ session('status') }}
        </div>
      @endif
      <form id="forgot-password-form" class="mt-8 space-y-6" action="{{ route('password.email') }}" method="post">
        @csrf
        <div>
          <x-label for="email" :value="__('Email')" />
          <x-input type="email" id="email" name="email" required autofocus />
          <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div class="flex">
          <x-primary-button id="submit-button" class="w-full items-center px-5 py-3 sm:w-auto">
            <x-spinner />
            <span id="button-text">Reset password</span>
          </x-primary-button>
        </div>
      </form>
    </div>
  </div>

  @push('script')
    <script>
      new loadingSpinner('forgot-password-form', 'submit-button', 'button-text', 'loading-spinner');
    </script>
  @endpush
@endsection
