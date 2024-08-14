<x-primary-button class="w-1/2 items-center justify-center sm:w-auto" data-modal-target="add-arsip-modal"
  data-modal-toggle="add-arsip-modal">
  <i class="fas fa-plus mr-2"></i>
  Tambah
</x-primary-button>

<x-modal-form id="add-arsip-modal" title="Tambah arsip" formAction="{{ route(currentRole() . '.arsip.store') }}">
  <div class="grid grid-cols-6 gap-6">
    <div class="col-span-6">
      <x-label for="nama_arsip" :value="__('Nama Arsip')" />
      <x-input id="nama_arsip" type="text" name="nama_arsip" :value="old('nama_arsip')" required />
    </div>
    <div class="col-span-6 sm:col-span-3">
      <x-label for="nomor_arsip" :value="__('Nomor Arsip')" />
      <x-input id="nomor_arsip" type="text" name="nomor_arsip" :value="old('nomor_arsip')" required />
    </div>
    <div class="col-span-6 sm:col-span-3">
      <x-label :value="__('Tanggal Arsip')" />
      <x-date-input name="tgl_arsip" :value="old('tgl_arsip')" required />
    </div>
    <div class="col-span-6 sm:col-span-3">
      <x-label for="jenis_arsip" :value="__('Jenis Arsip')" />
      <select name="jenis_arsip" id="jenis_arsip"
        class="block w-full rounded-lg border border-slate-300 bg-slate-50 p-2.5 text-slate-900 shadow-sm focus:border-primary-500 focus:ring-primary-500 dark:border-slate-600 dark:bg-slate-700 dark:text-white dark:placeholder-slate-400 dark:focus:border-primary-500 dark:focus:ring-primary-500 sm:text-sm">
        <option value="">Pilih...</option>
        <option value="dokumen">Dokumen</option>
        <option value="gambar">Gambar</option>
        <option value="surat">Surat</option>
      </select>
    </div>
    <div class="col-span-6 sm:col-span-3">
      <x-label for="upload" :value="__('Unggah')" />
      <x-input id="upload" type="file" name="upload" class="px-0 py-0" />
    </div>
    <div class="col-span-6">
      <x-label for="deskripsi" :value="__('Deskripsi')" />
      <textarea id="deskripsi" name="deskripsi" rows="4"
        class="block w-full rounded-lg border border-slate-300 bg-slate-50 p-2.5 text-sm text-slate-900 focus:border-primary-500 focus:ring-primary-500 dark:border-slate-600 dark:bg-slate-700 dark:text-white dark:placeholder-slate-400 dark:focus:border-primary-500 dark:focus:ring-primary-500">{{ old('deskripsi') }}</textarea>
    </div>
  </div>
</x-modal-form>
