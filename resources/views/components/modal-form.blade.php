@props(['id', 'title', 'formAction'])

<div id="{{ $id }}" data-modal-backdrop="static"
  {{ $attributes->merge(['class' => 'fixed left-0 right-0 top-4 z-50 hidden h-modal items-center justify-center overflow-y-auto overflow-x-hidden sm:h-full md:inset-0']) }}>
  <div class="relative h-full w-full max-w-2xl px-4 md:h-auto">
    <!-- Modal content -->
    <div class="relative rounded-lg bg-white shadow dark:bg-slate-800">
      <!-- Modal header -->
      <div class="flex items-start justify-between rounded-t border-b p-5 dark:border-slate-700">
        <h3 class="text-xl font-semibold dark:text-white">
          {{ $title }}
        </h3>
        <button type="button"
          class="ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-slate-400 hover:bg-slate-200 hover:text-slate-900 dark:hover:bg-slate-700 dark:hover:text-white"
          data-modal-toggle="{{ $id }}">
          <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
              clip-rule="evenodd"></path>
          </svg>
        </button>
      </div>
      <!-- Modal body -->
      <div class="space-y-6 p-6">
        <form action="{{ $formAction }}" method="POST" enctype="multipart/form-data">
          @csrf
          {{ $slot }}
      </div>
      <!-- Modal footer -->
      <div class="items-center rounded-b border-t border-slate-200 p-6 dark:border-slate-700">
        <x-primary-button class="px-5 py-2.5">
          Simpan
        </x-primary-button>
      </div>
      </form>
    </div>
  </div>
</div>
