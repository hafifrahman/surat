@props(['href', 'text', 'active'])

@php

  $classes =
      $active ?? false
          ? 'group flex items-center rounded-lg p-2 pl-8 text-base text-slate-900 bg-slate-100 transition duration-75 hover:bg-slate-100 dark:text-slate-200 dark:bg-slate-700'
          : 'group flex items-center rounded-lg p-2 pl-8 text-base text-slate-900 transition duration-75 hover:bg-slate-100 dark:text-slate-200 dark:hover:bg-slate-700';

  $classIcon =
      $active ?? false
          ? 'h-2 w-2 text-dark group-hover:text-slate-900 dark:text-white dark:group-hover:text-white transition duration-75'
          : 'h-2 w-2 text-slate-400 group-hover:text-slate-900 dark:text-slate-500 dark:group-hover:text-white transition duration-75';

@endphp

<li>
  <a href="{{ $href }}" class="{{ $classes }}">
    <i class="fa-solid fa-circle {{ $classIcon }} mr-3"></i>
    <span>{{ $text }}</span>
  </a>
</li>
