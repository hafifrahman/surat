<button type="button" data-modal-target="edit-agenda-modal-{{ $agenda->id_agenda }}"
  data-modal-toggle="edit-agenda-modal-{{ $agenda->id_agenda }}">
  <i
    class="fas fa-pen-to-square text-lg text-primary-700 hover:text-primary-800 dark:text-primary-600 dark:hover:text-primary-700"></i>
</button>

<x-modal-form id="edit-agenda-modal-{{ $agenda->id_agenda }}" title="Edit agenda"
  formAction="{{ route(currentRole() . '.agenda.update', $agenda) }}">
  @method('patch')
  <div class="grid grid-cols-6 gap-6">
    <div class="col-span-6 sm:col-span-3">
      <x-label for="nama_acara" :value="__('Nama Acara')" />
      <x-input id="nama_acara" type="text" name="nama_acara" :value="__($agenda->nama_acara)" />
    </div>
    <div class="col-span-6 sm:col-span-3">
      <x-label for="tempat" :value="__('Tempat')" />
      <x-input id="tempat" type="text" name="tempat" :value="__($agenda->tempat)" />
    </div>
    <div class="col-span-6 sm:col-span-3">
      <x-label :value="__('Tanggal Mulai')" />
      <x-date-input name="tgl_mulai" :value="__($agenda->tgl_mulai)" />
    </div>
    <div class="col-span-6 sm:col-span-3">
      <x-label :value="__('Tanggal Selesai')" />
      <x-date-input name="tgl_selesai" :value="__($agenda->tgl_selesai)" />
    </div>
    <div class="col-span-6 sm:col-span-3">
      <x-label for="waktu" :value="__('Waktu')" />
      <x-input id="waktu" type="time" name="waktu" :value="__($agenda->waktu)" />
    </div>
    <div class="col-span-6 sm:col-span-3">
      <x-label for="status" :value="__('Status')" />
      <select name="status" id="status"
        class="block w-full rounded-lg border border-slate-300 bg-slate-50 p-2.5 text-slate-900 shadow-sm focus:border-primary-500 focus:ring-primary-500 dark:border-slate-600 dark:bg-slate-700 dark:text-white dark:placeholder-slate-400 dark:focus:border-primary-500 dark:focus:ring-primary-500 sm:text-sm">
        <option value="pending" {{ $agenda->status == 'pending' ? 'selected' : '' }}>Pending</option>
        <option value="completed" {{ $agenda->status == 'completed' ? 'selected' : '' }}>Selesai</option>
      </select>
    </div>
    <div class="col-span-6">
      <x-label for="deskripsi" :value="__('Deskripsi')" />
      <textarea id="deskripsi" rows="4" name="deskripsi"
        class="block w-full rounded-lg border border-slate-300 bg-slate-50 p-2.5 text-sm text-slate-900 focus:border-primary-500 focus:ring-primary-500 dark:border-slate-600 dark:bg-slate-700 dark:text-white dark:placeholder-slate-400 dark:focus:border-primary-500 dark:focus:ring-primary-500">{{ $agenda->deskripsi }}</textarea>
    </div>
  </div>
</x-modal-form>
