@props(['name', 'value'])

<div class="relative max-w-sm">
  <div class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3">
    <svg class="h-4 w-4 text-slate-500 dark:text-slate-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
      fill="currentColor" viewBox="0 0 20 20">
      <path
        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
    </svg>
  </div>
  <x-input name="{{ $name }}" value="{{ $value }}" datepicker datepicker-autohide
    datepicker-format="yyyy/mm/dd" datepicker-buttons datepicker-autoselect-today type="text" class="ps-9"
    placeholder="Pilih tanggal" autocomplete="off" />
</div>
