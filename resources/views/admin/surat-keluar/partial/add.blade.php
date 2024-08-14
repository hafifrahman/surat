<x-primary-button class="w-1/2 items-center justify-center sm:w-auto" data-modal-target="add-suratKeluar-modal"
  data-modal-toggle="add-suratKeluar-modal">
  <i class="fa-solid fa-plus mr-2"></i>
  Tambah
</x-primary-button>

<x-modal-form id="add-suratKeluar-modal" title="Tambah Surat Keluar"
  formAction="{{ route(currentRole() . '.surat-keluar.store') }}">
  <div class="grid grid-cols-6 gap-6">
    <div class="col-span-6 sm:col-span-3">
      <x-label for="nomor_surat" :value="__('Nomor Surat')" />
      <x-input id="nomor_surat" type="text" name="nomor_surat" :value="old('nomor_surat')" required autofocus />
    </div>
    <div class="col-span-6 sm:col-span-3">
      <x-label for="pengirim" :value="__('Pengirim')" />
      <x-input id="pengirim" type="text" name="pengirim" :value="old('pengirim')" required />
    </div>
    <div class="col-span-6 sm:col-span-3">
      <x-label for="upload" :value="__('Lampiran')" />
      <x-input id="upload" type="file" name="upload" class="px-0 py-0" />
    </div>
    <div class="col-span-6 sm:col-span-3">
      <x-label :value="__('Tanggal Surat')" />
      <x-date-input name="tgl_surat" :value="old('tgl_surat')" required />
    </div>
    <div class="col-span-6">
      <x-label for="perihal" :value="__('Perihal')" />
      <textarea id="perihal" name="perihal" rows="4"
        class="block w-full rounded-lg border border-slate-300 bg-slate-50 p-2.5 text-sm text-slate-900 focus:border-primary-500 focus:ring-primary-500 dark:border-slate-600 dark:bg-slate-700 dark:text-white dark:placeholder-slate-400 dark:focus:border-primary-500 dark:focus:ring-primary-500">{{ old('perihal') }}</textarea>
    </div>
  </div>
</x-modal-form>
