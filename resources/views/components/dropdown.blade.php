@props(['id', 'title', 'active', 'icon' => ''])

@php
  $classes =
      $active ?? false
          ? 'group flex w-full items-center rounded-lg p-2 text-base text-dark bg-slate-100 transition duration-75 hover:bg-slate-100 dark:text-slate-200 dark:bg-slate-700'
          : 'group flex w-full items-center rounded-lg p-2 text-base text-slate-900 transition duration-75 hover:bg-slate-100 dark:text-slate-200 dark:hover:bg-slate-700';

  $isShow = $active ?? false ? 'space-y-2 py-2' : 'hidden space-y-2 py-2';

  $classIcon =
      $active ?? false
          ? 'h-5 w-5 flex-shrink-0 text-dark transition duration-75 group-hover:text-slate-900 dark:text-white dark:group-hover:text-white'
          : 'h-5 w-5 flex-shrink-0 text-slate-500 transition duration-75 group-hover:text-slate-900 dark:text-slate-400 dark:group-hover:text-white';
@endphp

<li>
  <button type="button" class="{{ $classes }}" aria-controls="{{ $id }}"
    data-collapse-toggle="{{ $id }}">
    <i class="{{ $icon }} {{ $classIcon }}"></i>
    <span class="ml-3 flex-1 whitespace-nowrap text-left" sidebar-toggle-item>{{ $title }}</span>
    <i class="fas fa-chevron-down text-left text-sm"></i>
  </button>
  <ul id="{{ $id }}" class="{{ $isShow }}">
    {{ $slot }}
  </ul>
</li>
