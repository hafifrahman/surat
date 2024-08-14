<button
  {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center rounded-lg bg-red-600 px-3 py-2 text-center text-sm font-medium text-white hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900 transition ease-in-out duration-150']) }}>
  {{ $slot }}
</button>
