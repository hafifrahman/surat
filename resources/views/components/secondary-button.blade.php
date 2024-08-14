<button
  {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center justify-center rounded-lg bg-slate-600 px-3 py-2 text-sm font-medium text-white hover:bg-slate-700 focus:ring-4 focus:ring-slate-300 dark:bg-slate-500 dark:hover:bg-slate-600 dark:focus:ring-slate-700 transition ease-in-out duration-150']) }}>
  {{ $slot }}
</button>
