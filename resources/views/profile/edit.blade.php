@extends('layouts.app')
@section('title', 'Profile')
@section('content')
  <div class="grid grid-cols-1 px-4 pt-6 dark:bg-slate-900 xl:grid-cols-3 xl:gap-4">
    <div class="col-span-full mb-4 xl:mb-2">
      <nav class="mb-5 flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 text-sm font-medium md:space-x-2">
          <li class="inline-flex items-center">
            <a href="{{ currentRole() . '/dashboard' }}"
              class="inline-flex items-center text-slate-700 hover:text-primary-600 dark:text-slate-300 dark:hover:text-white">
              <svg class="mr-2.5 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                </path>
              </svg>
              Home
            </a>
          </li>
          <li>
            <div class="flex items-center">
              <svg class="h-6 w-6 text-slate-400" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                  clip-rule="evenodd"></path>
              </svg>
              <span class="ml-1 text-slate-400 dark:text-slate-500 md:ml-2" aria-current="page">Profile</span>
            </div>
          </li>
        </ol>
      </nav>
      <h1 class="text-xl font-semibold text-slate-900 dark:text-white sm:text-2xl">Profile Pengguna</h1>
    </div>
    <div class="col-span-2">
      <div
        class="mb-4 rounded-lg border border-slate-200 bg-white p-4 shadow dark:border-slate-700 dark:bg-slate-800 sm:p-6 2xl:col-span-2">
        <h3 class="mb-4 text-xl font-semibold dark:text-white">General information</h3>
        <form action="{{ route('profile.update') }}" method="post">
          @csrf
          @method('patch')
          <div class="grid grid-cols-6 gap-6">
            <div class="col-span-6">
              <x-label for="name" :value="__('Name')" />
              <x-input id="name" type="text" name="name" value="{{ $user->name }}" required />
            </div>
            <div class="col-span-6 sm:col-span-3">
              <x-label for="email" :value="__('Email')" />
              <x-input id="email" type="email" name="email" value="{{ $user->email }}" required />
            </div>

            <div class="col-span-6 sm:col-span-3">
              <x-label for="role_id" :value="__('Role')" />
              @if (currentRole() === 'admin')
                <select id="role_id" name="role_id"
                  class="block w-full rounded-lg border border-slate-300 bg-slate-50 p-2.5 text-slate-900 shadow-sm focus:border-primary-500 focus:ring-primary-500 dark:border-slate-600 dark:bg-slate-700 dark:text-white dark:placeholder-slate-400 dark:focus:border-primary-500 dark:focus:ring-primary-500 sm:text-sm">
                  @foreach ($roles as $role)
                    <option value="{{ $role->id_role }}" {{ $role->id_role == $user->role_id ? 'selected' : '' }}>
                      {{ $role->name }}</option>
                  @endforeach
                </select>
              @else
                <x-input type="hidden" name="role_id" value="{{ $user->role_id }}" />
                <x-input type="text" value="{{ $user->roles->name }}" readonly />
              @endif
            </div>
            <div class="col-span-6 sm:col-span-3">
              <x-label :value="__('Created At')" />
              <x-input type="text" value="{{ $user->created_at->format('g:i A l, d F Y') }}" readonly />
            </div>
            <div class="col-span-6 sm:col-span-3">
              <x-label :value="__('Updated At')" />
              <x-input type="text" value="{{ $user->updated_at->format('g:i A l, d F Y') }}" readonly />
            </div>
            <div class="sm:col-full col-span-6">
              <x-primary-button class="px-5 py-2.5">
                Simpan
              </x-primary-button>
        </form>
        @include('profile.delete-account')
      </div>
    </div>
  </div>
  </div>
  <!-- Right Content -->
  <div class="col-span-full xl:col-auto">
    @include('profile.change-password')
  </div>
  </div>
@endsection
