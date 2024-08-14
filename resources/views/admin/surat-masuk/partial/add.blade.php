<x-primary-button type="button" class="w-1/2 items-center justify-center sm:w-auto"
  data-modal-target="add-suratMasuk-modal" data-modal-toggle="add-suratMasuk-modal">
  <i class="fa-solid fa-plus mr-2"></i>
  Tambah
</x-primary-button>

<x-modal-form id="add-suratMasuk-modal" title="Tambah Surat Masuk"
  formAction="{{ route(currentRole() . '.surat-masuk.store') }}">
  <div class="grid grid-cols-6 gap-6">
    <div class="col-span-6 sm:col-span-3">
      <x-label for="nomor_surat" :value="__('Nomor Surat')" />
      <x-input id="nomor_surat" type="text" name="nomor_surat" :value="old('nomor_surat')" required autofocus />
    </div>
    <div class="col-span-6 sm:col-span-3">
      <x-label for="penerima" :value="__('Penerima')" />
      <x-input id="penerima" type="text" name="penerima" :value="old('penerima')" required />
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
        class="block w-full rounded-lg border border-slate-300 bg-slate-50 p-2.5 text-sm text-slate-900 focus:border-primary-500 focus:ring-primary-500 dark:border-slate-600 dark:bg-slate-700 dark:text-white dark:placeholder-slate-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
        required>{{ old('perihal') }}</textarea>
    </div>
  </div>
</x-modal-form>
