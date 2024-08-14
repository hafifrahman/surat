@props(['active', 'icon' => '', 'svg' => ''])

@php
  $classes =
      $active ?? false
          ? 'group flex items-center rounded-lg p-2 text-base text-dark bg-slate-100 hover:bg-slate-100 dark:text-white dark:bg-slate-700 dark:hover:bg-slate-700'
          : 'group flex items-center rounded-lg p-2 text-base text-slate-900 hover:bg-slate-100 dark:text-slate-200 dark:hover:bg-slate-700';

  $classIcon =
      $active ?? false
          ? 'h-5 w-5 text-dark transition duration-75 group-hover:text-slate-900 dark:text-white dark:group-hover:text-white'
          : 'h-5 w-5 text-slate-500 transition duration-75 group-hover:text-slate-900 dark:text-slate-400 dark:group-hover:text-white';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
  @if ($svg)
    <svg class="{{ $classIcon }} -ml-0.5 -mr-1 h-6 w-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
      fill="currentColor" viewBox="0 0 24 24">
      <path fill-rule="evenodd"
        d="M4.857 3A1.857 1.857 0 0 0 3 4.857v4.286C3 10.169 3.831 11 4.857 11h4.286A1.857 1.857 0 0 0 11 9.143V4.857A1.857 1.857 0 0 0 9.143 3H4.857Zm10 0A1.857 1.857 0 0 0 13 4.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 21 9.143V4.857A1.857 1.857 0 0 0 19.143 3h-4.286Zm-10 10A1.857 1.857 0 0 0 3 14.857v4.286C3 20.169 3.831 21 4.857 21h4.286A1.857 1.857 0 0 0 11 19.143v-4.286A1.857 1.857 0 0 0 9.143 13H4.857Zm10 0A1.857 1.857 0 0 0 13 14.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 21 19.143v-4.286A1.857 1.857 0 0 0 19.143 13h-4.286Z"
        clip-rule="evenodd" />
    </svg>
  @elseif ($icon)
    <i class="{{ $icon }} {{ $classIcon }}"></i>
  @endif
  <span class="ml-3" sidebar-toggle-item>{{ $slot }}</span>
</a>
