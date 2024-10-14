@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
  <div class="px-4 pt-6">
    <div class="grid w-full grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-4">
      <!-- Card 1: Agenda -->
      <div class="rounded-md border border-slate-200 bg-white p-4 shadow dark:border-slate-700 dark:bg-slate-800">
        <div class="flex items-center">
          <svg class="h-20 w-20 transform text-slate-500 transition-transform hover:scale-105 dark:text-slate-300"
            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
            viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
              d="M4 10h16m-8-3V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Zm3-7h.01v.01H8V13Zm4 0h.01v.01H12V13Zm4 0h.01v.01H16V13Zm-8 4h.01v.01H8V17Zm4 0h.01v.01H12V17Zm4 0h.01v.01H16V17Z" />
          </svg>
          <div class="block">
            <h5 class="text-2xl font-semibold text-slate-600 dark:text-slate-300">Agenda</h5>
            <p class="text-slate-500 dark:text-slate-400">Total:
              <strong>{{ $agendaCount }}</strong>
            </p>
          </div>
        </div>
        <a href="{{ route(currentRole() . '.agenda.index') }}"
          class="ms-1 inline-flex items-center text-sm font-medium text-blue-600 hover:underline dark:text-blue-700">
          Selengkapnya
          <svg class="ml-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
          </svg>
        </a>
      </div>

      <!-- Card 2: Arsip -->
      <div class="rounded-md border border-slate-200 bg-white p-4 shadow dark:border-slate-700 dark:bg-slate-800">
        <div class="flex items-center">
          <svg class="h-20 w-20 transform text-slate-500 transition-transform hover:scale-105 dark:text-slate-300"
            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
            viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linejoin="round" stroke-width="1"
              d="M10 12v1h4v-1m4 7H6a1 1 0 0 1-1-1V9h14v9a1 1 0 0 1-1 1ZM4 5h16a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Z" />
          </svg>
          <div class="block">
            <h5 class="text-2xl font-semibold text-slate-600 dark:text-slate-300">Arsip</h5>
            <p class="text-slate-500 dark:text-slate-400">Total:
              <strong>{{ $arsipCount }}</strong>
            </p>
          </div>
        </div>
        <a href="{{ route(currentRole() . '.arsip.index') }}"
          class="ms-1 inline-flex items-center text-sm font-medium text-blue-600 hover:underline dark:text-blue-700">
          Selengkapnya
          <svg class="ml-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
          </svg>
        </a>
      </div>

      <!-- Card 3: Surat Masuk -->
      <div class="rounded-md border border-slate-200 bg-white p-4 shadow dark:border-slate-700 dark:bg-slate-800">
        <div class="flex items-center">
          <svg class="h-20 w-20 transform text-slate-500 transition-transform hover:scale-105 dark:text-slate-300"
            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
            viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
              d="M5 12V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1v-4m5-13v4a1 1 0 0 1-1 1H5m0 6h9m0 0-2-2m2 2-2 2" />
          </svg>
          <div class="block">
            <h5 class="text-2xl font-semibold text-slate-600 dark:text-slate-300">Surat Masuk</h5>
            <p class="text-slate-500 dark:text-slate-300">Total:
              <strong>{{ $suratMasukCount }}</strong>
            </p>
          </div>
        </div>
        <a href="{{ route(currentRole() . '.surat-masuk.index') }}"
          class="ms-1 inline-flex items-center text-sm font-medium text-blue-600 hover:underline dark:text-blue-700">
          Selengkapnya
          <svg class="ml-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
          </svg>
        </a>
      </div>

      <!-- Card 4: Surat Keluar -->
      <div class="rounded-md border border-slate-200 bg-white p-4 shadow dark:border-slate-700 dark:bg-slate-800">
        <div class="flex items-center">
          <svg class="h-20 w-20 transform text-slate-500 transition-transform hover:scale-105 dark:text-slate-300"
            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
            viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
              d="M19 10V4a1 1 0 0 0-1-1H9.914a1 1 0 0 0-.707.293L5.293 7.207A1 1 0 0 0 5 7.914V20a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2M10 3v4a1 1 0 0 1-1 1H5m5 6h9m0 0-2-2m2 2-2 2" />
          </svg>
          <div class="block">
            <h5 class="text-2xl font-semibold text-slate-600 dark:text-slate-300">Surat Keluar</h5>
            <p class="text-slate-500 dark:text-slate-400">Total:
              <strong>{{ $suratKeluarCount }}</strong>
            </p>
          </div>
        </div>
        <a href="{{ route(currentRole() . '.surat-keluar.index') }}"
          class="ms-1 inline-flex items-center text-sm font-medium text-blue-600 hover:underline dark:text-blue-700">
          Selengkapnya
          <svg class="ml-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3">
            </path>
          </svg>
        </a>
      </div>

    </div>
  </div>
@endsection
