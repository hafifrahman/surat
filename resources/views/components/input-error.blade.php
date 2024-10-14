@props(['messages', 'type' => ''])

@if ($type == 'alert' && $messages)
  <div class="flex justify-center">
    <div
      class="absolute top-24 flex rounded border border-red-300 bg-red-50 p-4 text-sm text-red-800 opacity-100 transition-opacity duration-500 dark:border-red-500 dark:bg-slate-800 dark:text-red-400"
      role="alert" id="alert">
      <svg class="me-3 mt-[2px] inline h-4 w-4 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
        fill="currentColor" viewBox="0 0 20 20">
        <path
          d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
      </svg>
      <span class="sr-only">Danger</span>
      <div>
        <span class="font-medium">Terjadi kesalahan saat mengirim data:</span>
        <ul class="mt-1.5 list-inside list-disc">
          @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
  <script>
    setTimeout(() => {
      const alert = document.getElementById('alert');
      if (alert) {
        alert.classList.remove('opacity-100');
        alert.classList.add('opacity-0');
        setTimeout(() => {
          alert.style.display = 'none';
        }, 500);
      }
    }, 15000);
  </script>
@elseif($messages)
  <ul {{ $attributes->merge(['class' => 'text-sm text-red-600 dark:text-red-500']) }}>
    @foreach ((array) $messages as $message)
      <li>{{ $message }}</li>
    @endforeach
  </ul>
@endif
