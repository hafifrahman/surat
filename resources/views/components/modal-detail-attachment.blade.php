@props(['btnValue' => 'Lihat lampiran', 'id', 'src'])

<button type="button" data-modal-target="{{ $id }}" data-modal-toggle="{{ $id }}"
  class="text-blue-600 hover:underline dark:text-blue-500">
  {{ $btnValue }}
</button>

<!-- Large Modal -->
<div id="{{ $id }}" tabindex="-1"
  class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full overflow-y-auto overflow-x-hidden p-4 md:inset-0">
  <div class="relative max-h-full w-full max-w-2xl">
    <!-- Modal content -->
    <div class="relative rounded-lg bg-white pb-4 shadow dark:bg-slate-800">
      <!-- Modal header -->
      <div class="flex items-center justify-between rounded-t border-b p-4 dark:border-slate-700 md:p-5">
        <h3 class="text-xl font-medium text-slate-900 dark:text-white">
          Pratinjau
        </h3>
        <button type="button"
          class="ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-slate-400 hover:bg-slate-200 hover:text-slate-900 dark:hover:bg-slate-700 dark:hover:text-white"
          data-modal-hide="{{ $id }}">
          <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
          </svg>
          <span class="sr-only">Close modal</span>
        </button>
      </div>
      <!-- Modal body -->
      <iframe src="{{ $src }}" class="h-96 w-full" frameborder="0"></iframe>
      <!-- Modal footer -->
    </div>
  </div>
</div>
