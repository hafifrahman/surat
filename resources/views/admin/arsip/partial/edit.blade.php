<button type="button" data-modal-target="edit-arsip-modal-{{ $arsip->id_arsip }}"
  data-modal-toggle="edit-arsip-modal-{{ $arsip->id_arsip }}">
  <i
    class="fas fa-pen-to-square text-lg text-primary-700 hover:text-primary-800 dark:text-primary-600 dark:hover:text-primary-700"></i>
</button>

<x-modal-form id="edit-arsip-modal-{{ $arsip->id_arsip }}" title="Edit arsip"
  formAction="{{ route(currentRole() . '.arsip.update', $arsip) }}">
  @method('patch')
  <div class="grid grid-cols-6 gap-6">
    <div class="col-span-6">
      <x-label for="nama_arsip" :value="__('Nama Arsip')" />
      <x-input id="nama_arsip" type="text" name="nama_arsip" :value="__($arsip->nama_arsip)" />
    </div>
    <div class="col-span-6 sm:col-span-3">
      <x-label for="nomor_arsip" :value="__('Nomor Arsip')" />
      <x-input id="nomor_arsip" type="text" name="nomor_arsip" :value="__($arsip->nomor_arsip)" />
    </div>
    <div class="col-span-6 sm:col-span-3">
      <x-label :value="__('Tanggal Arsip')" />
      <x-date-input name="tgl_arsip" :value="__($arsip->tgl_arsip)" required />
    </div>
    <div class="col-span-6 sm:col-span-3">
      <x-label for="jenis_arsip" :value="__('Jenis Arsip')" />
      <select name="jenis_arsip" id="jenis_arsip"
        class="block w-full rounded-lg border border-slate-300 bg-slate-50 p-2.5 text-slate-900 shadow-sm focus:border-primary-500 focus:ring-primary-500 dark:border-slate-600 dark:bg-slate-700 dark:text-white dark:placeholder-slate-400 dark:focus:border-primary-500 dark:focus:ring-primary-500 sm:text-sm">
        <option value="gambar" {{ $arsip->jenis_arsip == 'gambar' ? 'selected' : '' }}>Gambar</option>
        <option value="dokumen" {{ $arsip->jenis_arsip == 'dokumen' ? 'selected' : '' }}>Dokumen</option>
        <option value="surat" {{ $arsip->jenis_arsip == 'surat' ? 'selected' : '' }}>Surat</option>
      </select>
    </div>
    <div class="col-span-6 sm:col-span-3">
      <x-label for="upload" :value="__('Unggah')" />
      <x-input id="upload" type="file" class="px-0 py-0" name="upload" />
    </div>
    <div class="col-span-6">
      <x-label for="deskripsi" :value="__('Deskripsi Arsip')" />
      <textarea id="deskripsi" rows="4" name="deskripsi"
        class="block w-full rounded-lg border border-slate-300 bg-slate-50 p-2.5 text-sm text-slate-900 focus:border-primary-500 focus:ring-primary-500 dark:border-slate-600 dark:bg-slate-700 dark:text-white dark:placeholder-slate-400 dark:focus:border-primary-500 dark:focus:ring-primary-500">{{ $arsip->deskripsi }}</textarea>
    </div>
  </div>
</x-modal-form>
