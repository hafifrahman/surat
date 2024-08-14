<button
  {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center rounded-lg bg-blue-700 px-3 py-2 text-sm font-medium text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 transition ease-in-out duration-150']) }}>
  {{ $slot }}
</button>
