@extends('layouts.app')
@section('title', 'Agenda')

@section('content')
  <div class="px-4 pt-4">
    <div
      class="block items-center justify-between rounded-t-lg border border-slate-200 bg-white p-4 dark:border-slate-700 dark:bg-slate-800 sm:flex lg:mt-1.5">
      <div class="mb-1 w-full">
        <div class="mb-4">
          <nav class="mb-5 flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 text-sm font-medium md:space-x-2">
              <li class="inline-flex items-center">
                <a href="{{ route(currentRole() . '.dashboard') }}"
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
                  <span class="ml-1 text-slate-400 dark:text-slate-500 md:ml-2" aria-current="page">Agenda</span>
                </div>
              </li>
            </ol>
          </nav>
          <h1 class="text-xl font-semibold text-slate-900 dark:text-white sm:text-2xl">Daftar agenda</h1>
        </div>
        <div class="sm:flex">
          <div class="mb-3 block items-center dark:divide-slate-700 sm:mb-0 sm:divide-x sm:divide-slate-100">
            <div class="relative mt-1 lg:w-64 xl:w-96">
              <form action="/{{ currentRole() }}/agenda" method="get" class="flex items-center lg:pr-3">
                <x-input type="search" name="q" class="text-sm" placeholder="Cari agenda..."
                  value="{{ request('q') }}" autocomplete="off" />
                <button
                  class="clear-query absolute inset-y-0 right-0 me-16 hidden text-xl text-slate-500 hover:text-slate-400 dark:text-slate-400 dark:hover:text-slate-300 lg:me-[4.5rem]"
                  type="button" tabindex="-1">&times;</button>
                <x-primary-button class="search-btn ms-2 px-2.5 py-2.5">
                  <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                  </svg>
                </x-primary-button>
                <x-primary-button class="reset-query ms-2 hidden px-2.5 py-2.5">
                  <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M6 18 17.94 6M18 18 6.06 6" />
                  </svg>
                </x-primary-button>
              </form>
            </div>
          </div>
          <div class="ml-auto flex items-center space-x-2 sm:space-x-3">
            @include('admin.agenda.partial.add')
            <a href="/{{ currentRole() }}/agenda/export/pdf"
              class="inline-flex w-1/2 items-center justify-center rounded-lg border border-slate-300 bg-white px-3 py-2 text-center text-sm font-medium text-slate-900 hover:bg-slate-100 focus:ring-4 focus:ring-primary-300 dark:border-slate-600 dark:bg-slate-800 dark:text-slate-400 dark:hover:bg-slate-700 dark:hover:text-white dark:focus:ring-slate-700 sm:w-auto">
              <i class="fas fa-file-export mr-2"></i>
              Export
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="card flex flex-col rounded-lg shadow">
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
                    class="whitespace-nowrap p-4 text-left text-xs font-medium uppercase text-slate-500 dark:text-slate-400">
                    Nama Acara
                  </th>
                  <th scope="col"
                    class="p-4 text-left text-xs font-medium uppercase text-slate-500 dark:text-slate-400">
                    Tempat
                  </th>
                  <th scope="col"
                    class="whitespace-nowrap p-4 text-left text-xs font-medium uppercase text-slate-500 dark:text-slate-400">
                    Tanggal Mulai
                  </th>
                  <th scope="col"
                    class="whitespace-nowrap p-4 text-left text-xs font-medium uppercase text-slate-500 dark:text-slate-400">
                    Tanggal Selesai
                  </th>
                  <th scope="col"
                    class="p-4 text-left text-xs font-medium uppercase text-slate-500 dark:text-slate-400">
                    Waktu
                  </th>
                  <th scope="col"
                    class="p-4 text-left text-xs font-medium uppercase text-slate-500 dark:text-slate-400">
                    Deskripsi
                  </th>
                  <th scope="col"
                    class="p-4 text-left text-xs font-medium uppercase text-slate-500 dark:text-slate-400">
                    Status
                  </th>
                  <th scope="col"
                    class="p-4 text-left text-xs font-medium uppercase text-slate-500 dark:text-slate-400">
                    Aksi
                  </th>
                </tr>
              </thead>
              <tbody class="divide-y divide-slate-200 bg-white dark:divide-slate-700 dark:bg-slate-800">
                @forelse ($agendas as $agenda)
                  <tr>
                    <td class="whitespace-nowrap px-4 py-3 text-sm font-medium text-slate-700 dark:text-slate-300">
                      {{ $loop->index + 1 }}
                    </td>
                    <td
                      class="max-w-xs overflow-hidden truncate px-4 py-3 text-sm font-medium text-slate-700 dark:text-slate-300">
                      {{ $agenda->nama_acara }}
                    </td>
                    <td
                      class="max-w-xs overflow-hidden truncate px-4 py-3 text-sm font-medium text-slate-700 dark:text-slate-300">
                      {{ $agenda->tempat }}
                    </td>
                    <td
                      class="max-w-xs overflow-hidden truncate px-4 py-3 text-sm font-medium text-slate-700 dark:text-slate-300">
                      {{ Carbon\Carbon::parse($agenda->tgl_mulai)->translatedFormat('j F Y') }}
                    </td>
                    <td
                      class="max-w-xs overflow-hidden truncate px-4 py-3 text-sm font-medium text-slate-700 dark:text-slate-300">
                      {{ Carbon\Carbon::parse($agenda->tgl_selesai)->translatedFormat('j F Y') }}
                    </td>
                    <td
                      class="max-w-xs overflow-hidden truncate px-4 py-3 text-sm font-medium text-slate-700 dark:text-slate-300">
                      {{ Carbon\Carbon::parse($agenda->waktu)->format('g:i A') }}
                    </td>
                    <td
                      class="max-w-xs overflow-hidden truncate px-4 py-3 text-sm font-medium text-slate-700 dark:text-slate-300">
                      {{ $agenda->deskripsi }}
                    </td>
                    @if ($agenda->status == 'completed')
                      <td class="py-3 text-left">
                        <span
                          class="me-2 rounded-md border border-green-100 bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800 dark:border-green-500 dark:bg-slate-700 dark:text-green-400">{{ $agenda->status }}</span>
                      </td>
                    @elseif ($agenda->status == 'pending')
                      <td class="py-3 text-left">
                        <span
                          class="mr-2 rounded-md border border-red-100 bg-red-100 px-2.5 py-0.5 text-xs font-medium text-red-800 dark:border-red-400 dark:bg-slate-700 dark:text-red-400">{{ $agenda->status }}</span>
                      </td>
                    @endif
                    <td class="space-x-1 whitespace-nowrap px-4 py-3">
                      @include('admin.agenda.partial.edit')
                      <x-confirm-delete modalId="delete-agenda-{{ $agenda->id_agenda }}" title="Agenda"
                        :url="route(currentRole() . '.agenda.destroy', $agenda)" />
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="9"
                      class="whitespace-nowrap px-4 py-3 text-center text-sm font-medium text-slate-600 dark:text-slate-400">
                      Tidak ada data
                    </td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div
        class="pagination-container rounded-b-lg border border-slate-200 bg-white p-4 shadow dark:border-slate-700 dark:bg-slate-800">
        {{ $agendas->links('components.pagination') }}
      </div>
    </div>
  </div>
@endsection
