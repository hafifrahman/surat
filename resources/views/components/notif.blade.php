@if (session('success') || session('info') || session('danger'))
  @php
    $type = session('success') ? 'success' : (session('danger') ? 'danger' : 'info');
    $message = session($type);
    $color = $type === 'success' ? 'green' : ($type === 'danger' ? 'red' : 'yellow');
    $icon =
        $type === 'success'
            ? 'M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z'
            : ($type === 'danger'
                ? 'M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z'
                : 'M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z');
  @endphp
  <div class="flex justify-center">
    <div id="toast"
      class="fixed top-32 mb-4 flex w-full max-w-xs items-center rounded-lg border border-slate-200 bg-white p-4 text-slate-500 opacity-100 shadow transition-opacity duration-500 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-400"
      role="alert">
      <div
        class="bg-{{ $color }}-100 text-{{ $color }}-500 dark:bg-{{ $color }}-800 dark:text-{{ $color }}-200 inline-flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-lg">
        <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
          <path d="{{ $icon }}" />
        </svg>
      </div>
      <div class="ms-3 text-sm font-normal">{{ $message }}</div>
      <button type="button"
        class="-mx-1.5 -my-1.5 ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-white p-1.5 text-slate-400 hover:bg-slate-100 hover:text-slate-900 focus:ring-2 focus:ring-slate-300 dark:bg-slate-800 dark:text-slate-500 dark:hover:bg-slate-700 dark:hover:text-white"
        data-dismiss-target="#toast" aria-label="Close">
        <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
      </button>
    </div>
  </div>
@endif

<script>
  setTimeout(() => {
    const toast = document.getElementById('toast');
    if (toast) {
      toast.classList.remove('opacity-100');
      toast.classList.add('opacity-0');
      setTimeout(() => {
        toast.style.display = 'none';
      }, 500);
    }
  }, 3000);
</script>
