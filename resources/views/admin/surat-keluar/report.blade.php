@extends('layouts.app')
@section('title', 'Laporan Surat Keluar')

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
                  <span class="ml-1 text-slate-400 dark:text-slate-500 md:ml-2" aria-current="page">Laporan Surat
                    Keluar</span>
                </div>
              </li>
            </ol>
          </nav>
          <h1 class="text-xl font-semibold text-slate-900 dark:text-white sm:text-2xl">Laporan Surat Keluar</h1>
        </div>
        <div class="sm:flex">
          <div class="mb-3 block items-center dark:divide-slate-700 sm:mb-0 sm:divide-x sm:divide-slate-100">
            <form class="flex items-center justify-center">
              <select
                class="w-full rounded-lg border border-slate-200 bg-white px-4 py-2 text-sm font-medium text-slate-900 hover:bg-slate-100 focus:z-10 focus:border-slate-200 focus:outline-none focus:ring-4 focus:ring-slate-200 dark:border-slate-600 dark:bg-slate-800 dark:text-slate-400 dark:hover:bg-slate-700 dark:hover:text-white dark:focus:ring-slate-700 md:w-auto"
                name="tahun" id="tahun" onchange="handleYearChange()">
                @for ($year = date('Y'); $year >= 2020; $year--)
                  <option value="{{ $year }}" {{ $tahun == $year ? 'selected' : '' }}>
                    {{ $year }}
                  </option>
                @endfor
              </select>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="flex flex-col">
      <div class="overflow-x-auto rounded-b-lg border border-slate-200 dark:border-slate-700">
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
                    Bulan
                  </th>
                  <th scope="col"
                    class="p-4 text-left text-xs font-medium uppercase text-slate-500 dark:text-slate-400">
                    Jumlah
                  </th>
                  <th scope="col"
                    class="p-4 text-center text-xs font-medium uppercase text-slate-500 dark:text-slate-400">
                    Aksi
                  </th>
                </tr>
              </thead>
              <tbody class="divide-y divide-slate-200 bg-white dark:divide-slate-700 dark:bg-slate-800">
                @foreach (range(1, 12) as $bulan)
                  <tr>
                    <td class="whitespace-nowrap px-4 py-2 text-sm font-medium text-slate-700 dark:text-slate-300">
                      {{ $loop->index + 1 }}
                    </td>
                    <td
                      class="max-w-sm overflow-hidden truncate px-4 py-2 text-sm font-medium text-slate-700 dark:text-slate-300 xl:max-w-xs">
                      {{ \Carbon\Carbon::create(null, $bulan, 1)->translatedFormat('F') }}
                    </td>
                    <td
                      class="max-w-sm overflow-hidden truncate px-4 py-2 text-sm font-medium text-slate-700 dark:text-slate-300 xl:max-w-xs">
                      {{ $laporanPerBulan[$bulan]['total'] ?? 0 }}
                    </td>
                    <td class="space-x-2 whitespace-nowrap px-4 py-2 text-center">
                      <a href="{{ route(currentRole() . '.laporan-sk.report', ['bulan' => $bulan, 'tahun' => $tahun]) }}">
                        <x-danger-button>
                          Cetak
                        </x-danger-button>
                      </a>
                    </td>
                  </tr>
                @endforeach
                <tr>
                  <td colspan="4" class="bg-white p-1 dark:bg-slate-800">
                    &nbsp;
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    function handleYearChange() {
      const selectedYear = document.getElementById('tahun').value;
      window.location.href = `{{ url('admin/laporan-sk') }}?tahun=${selectedYear}`;
    }
  </script>
@endsection
