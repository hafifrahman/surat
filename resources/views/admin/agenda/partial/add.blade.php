<x-primary-button class="w-1/2 items-center justify-center sm:w-auto" data-modal-target="add-agenda-modal"
  data-modal-toggle="add-agenda-modal">
  <i class="fas fa-plus mr-2"></i>
  Tambah
</x-primary-button>

<x-modal-form id="add-agenda-modal" title="Tambah agenda" formAction="{{ route(currentRole() . '.agenda.store') }}">
  <div class="grid grid-cols-6 gap-6">
    <div class="col-span-6 sm:col-span-3">
      <x-label for="nama_acara" :value="__('Nomor Arsip')" />
      <x-input id="nama_acara" class="block w-full" type="text" name="nama_acara" :value="old('nama_acara')" required
        autofocus />
    </div>
    <div class="col-span-6 sm:col-span-3">
      <x-label for="tempat" :value="__('Tempat')" />
      <x-input id="tempat" type="text" name="tempat" />
    </div>
    <div class="col-span-6 sm:col-span-3">
      <x-label for="tgl_mulai" :value="__('Tanggal Mulai')" />
      <x-date-input name="tgl_mulai" :value="old('tgl_mulai')" required />
    </div>
    <div class="col-span-6 sm:col-span-3">
      <x-label for="tgl_selesai" :value="__('Tanggal Selesai')" />
      <x-date-input :name="__('tgl_selesai')" :value="old('tgl_selesai')" required />
    </div>
    <div class="col-span-6 sm:col-span-3">
      <x-label for="waktu" :value="__('Waktu')" />
      <div class="relative">
        <div class="pointer-events-none absolute inset-y-0 end-0 top-0 flex items-center pe-3.5">
          <svg class="h-4 w-4 text-slate-500 dark:text-slate-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="currentColor" viewBox="0 0 24 24">
            <path fill-rule="evenodd"
              d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z"
              clip-rule="evenodd" />
          </svg>
        </div>
        <x-input id="waktu" type="time" name="waktu" :value="old('waktu')" required />
      </div>
    </div>
    <div class="col-span-6 sm:col-span-3">
      <x-label for="status" :value="__('Status')" />
      <select name="status" id="status"
        class="block w-full rounded-lg border border-slate-300 bg-slate-50 p-2.5 text-slate-900 shadow-sm focus:border-primary-500 focus:ring-primary-500 dark:border-slate-600 dark:bg-slate-700 dark:text-white dark:placeholder-slate-400 dark:focus:border-primary-500 dark:focus:ring-primary-500 sm:text-sm">
        <option value="">Pilih...</option>
        <option value="pending">Pending</option>
        <option value="completed">Selesai</option>
      </select>
    </div>
    <div class="col-span-6">
      <x-label for="deskripsi" :value="__('Deskripsi')" />
      <textarea id="deskripsi" name="deskripsi" rows="4"
        class="block w-full rounded-lg border border-slate-300 bg-slate-50 p-2.5 text-sm text-slate-900 focus:border-primary-500 focus:ring-primary-500 dark:border-slate-600 dark:bg-slate-700 dark:text-white dark:placeholder-slate-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"></textarea>
    </div>
  </div>
</x-modal-form>
