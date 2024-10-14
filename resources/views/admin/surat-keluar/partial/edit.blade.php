 <button type="button" data-modal-target="edit-sk-modal-{{ $surat->id_sk }}"
   data-modal-toggle="edit-sk-modal-{{ $surat->id_sk }}">
   <i
     class="fa-solid fa-pen-to-square cursor-pointer text-lg text-primary-700 hover:text-primary-800 dark:text-primary-600 dark:hover:text-primary-700"></i>
 </button>

 <x-modal-form id="edit-sk-modal-{{ $surat->id_sk }}" title="Edit surat keluar"
   formAction="{{ route(currentRole() . '.surat-keluar.update', $surat) }}">
   @method('patch')
   <div class="grid grid-cols-6 gap-6">
     <div class="col-span-6 sm:col-span-3">
       <x-label for="nomor_surat" :value="__('Nomor Surat')" />
       <x-input id="nomor_surat" type="text" name="nomor_surat" :value="__($surat->nomor_surat)" />
     </div>
     <div class="col-span-6 sm:col-span-3">
       <x-label for="pengirim" :value="__('Pengirim')" />
       <x-input id="pengirim" type="text" name="pengirim" :value="__($surat->pengirim)" />
     </div>
     <div class="col-span-6 sm:col-span-3">
       <x-label for="upload" :value="__('Lampiran')" />
       <x-input id="upload" class="px-0 py-0" type="file" name="upload" />
     </div>
     <div class="col-span-6 sm:col-span-3">
       <x-label :value="__('Tanggal Surat')" />
       <x-date-input name="tgl_surat" :value="__($surat->tgl_surat)" />
     </div>
     <div class="col-span-6">
       <x-label for="perihal" :value="__('Perihal')" />
       <textarea id="perihal" name="perihal" rows="4"
         class="block w-full rounded-lg border border-slate-300 bg-slate-50 p-2.5 text-sm text-slate-900 focus:border-primary-500 focus:ring-primary-500 dark:border-slate-600 dark:bg-slate-700 dark:text-white dark:placeholder-slate-400 dark:focus:border-primary-500 dark:focus:ring-primary-500">{{ __($surat->perihal) }}</textarea>
     </div>
   </div>
 </x-modal-form>
