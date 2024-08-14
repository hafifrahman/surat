@extends('layouts.app')
@section('title', 'Pengguna')
@section('content')
  <div class="px-4 pt-4">
    <div
      class="block items-center justify-between rounded-t-lg border border-slate-200 bg-white p-4 dark:border-slate-700 dark:bg-slate-800 sm:flex lg:mt-1.5">
      <div class="mb-1 w-full">
        <div class="mb-4">
          <nav class="mb-5 flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 text-sm font-medium md:space-x-2">
              <li class="inline-flex items-center">
                <a href="/admin/dashboard"
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
                  <span class="ml-1 text-slate-400 dark:text-slate-500 md:ml-2" aria-current="page">Pengguna</span>
                </div>
              </li>
            </ol>
          </nav>
          <h1 class="text-xl font-semibold text-slate-900 dark:text-white sm:text-2xl">Daftar pengguna</h1>
        </div>
        <div class="sm:flex">
          <div class="mb-3 block items-center dark:divide-slate-700 sm:mb-0 sm:divide-x sm:divide-slate-100">
            <form class="lg:pr-3" action="/admin/users" method="GET">
              <label for="users-search" class="sr-only">Search</label>
              <div class="relative mt-1 lg:w-64 xl:w-96">
                <x-input type="text" name="search" id="users-search" placeholder="Cari user..." autocomplete="off" />
              </div>
            </form>
          </div>
          <div class="ml-auto flex items-center space-x-2 sm:space-x-3">
            @include('admin.users.partial.add')
            @include('admin.users.partial.export')
          </div>
        </div>
      </div>
    </div>
    <div class="flex flex-col rounded-lg shadow">
      <div class="overflow-x-auto border-l border-r border-slate-200 dark:border-slate-700">
        <div class="inline-block min-w-full align-middle">
          <div class="overflow-hidden shadow">
            <table class="min-w-full table-fixed divide-y divide-slate-200 dark:divide-slate-600">
              <thead class="bg-slate-100 dark:bg-slate-700">
                <tr>
                  <th scope="col"
                    class="p-4 text-left text-xs font-medium uppercase text-slate-500 dark:text-slate-400">
                    #
                  </th>
                  <th scope="col"
                    class="p-4 text-left text-xs font-medium uppercase text-slate-500 dark:text-slate-400">
                    Nama
                  </th>
                  <th scope="col"
                    class="p-4 text-left text-xs font-medium uppercase text-slate-500 dark:text-slate-400">
                    Email
                  </th>
                  <th scope="col"
                    class="p-4 text-left text-xs font-medium uppercase text-slate-500 dark:text-slate-400">
                    Role
                  </th>
                  <th scope="col"
                    class="whitespace-nowrap p-4 text-left text-xs font-medium uppercase text-slate-500 dark:text-slate-400">
                    Tanggal dibuat
                  </th>
                  <th scope="col"
                    class="p-4 text-left text-xs font-medium uppercase text-slate-500 dark:text-slate-400">
                    Aksi
                  </th>
                </tr>
              </thead>
              <tbody class="divide-y divide-slate-200 bg-white dark:divide-slate-700 dark:bg-slate-800">
                @forelse ($users as $user)
                  <tr>
                    <td class="whitespace-nowrap px-4 py-3 text-sm font-medium text-slate-700 dark:text-slate-300">
                      {{ $loop->index + 1 }}
                    </td>
                    <td
                      class="max-w-sm overflow-hidden truncate px-4 py-3 text-sm font-medium text-slate-700 dark:text-slate-300 xl:max-w-xs">
                      {{ $user->name }}
                    </td>
                    <td
                      class="max-w-sm overflow-hidden truncate px-4 py-3 text-sm font-medium text-slate-700 dark:text-slate-300 xl:max-w-xs">
                      {{ $user->email }}
                    </td>
                    <td
                      class="max-w-sm overflow-hidden truncate px-4 py-3 text-sm font-medium text-slate-700 dark:text-slate-300 xl:max-w-xs">
                      {{ $user->roles->name }}</td>
                    <td
                      class="max-w-sm overflow-hidden truncate px-4 py-3 text-sm font-medium text-slate-700 dark:text-slate-300 xl:max-w-xs">
                      {{ $user->created_at->format('l, j F Y') }}</td>
                    <td class="space-x-1 whitespace-nowrap px-4 py-3">
                      @include('admin.users.partial.edit')
                      <x-confirm-delete modalId="delete-user-modal-{{ $user->id }}" title="{{ $user->name }}"
                        :url="route('admin.users.destroy', $user)" />
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="6"
                      class="px-4 py-3 text-center text-sm font-medium text-slate-600 dark:text-slate-400">
                      Tidak ada data
                    </td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="rounded-b-lg border border-slate-200 bg-white p-4 dark:border-slate-700 dark:bg-slate-800">
        {{ $users->links('components.pagination') }}
      </div>
    </div>
  </div>
@endsection
