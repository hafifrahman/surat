@if ($paginator->hasPages())
  <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between">
    <div class="flex flex-1 items-center justify-between md:hidden">
      @if ($paginator->onFirstPage())
        <span
          class="relative inline-flex cursor-default items-center rounded-md border border-slate-300 bg-white px-4 py-2 text-sm font-medium leading-5 text-slate-500 dark:border-slate-600 dark:bg-slate-800 dark:text-slate-600">
          <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd"
              d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
              clip-rule="evenodd" />
          </svg>
        </span>
      @else
        <a href="{{ $paginator->previousPageUrl() }}"
          class="relative inline-flex items-center rounded-md border border-slate-300 bg-white px-4 py-2 text-sm font-medium leading-5 text-slate-700 ring-slate-300 transition duration-150 ease-in-out hover:text-slate-500 focus:border-blue-300 focus:outline-none focus:ring active:bg-slate-100 active:text-slate-700 dark:border-slate-600 dark:bg-slate-800 dark:text-slate-300 dark:focus:border-blue-700 dark:active:bg-slate-700 dark:active:text-slate-300">
          <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd"
              d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
              clip-rule="evenodd" />
          </svg>
        </a>
      @endif

      <div>
        <p class="text-sm leading-5 text-slate-500 dark:text-slate-400">
          {!! __('Menampilkan') !!}
          @if ($paginator->firstItem())
            <span
              class="font-semibold text-slate-900 dark:text-white">{{ $paginator->firstItem() }}-{{ $paginator->lastItem() }}</span>
          @else
            {{ $paginator->count() }}
          @endif
          {!! __('dari') !!}
          <span class="font-semibold text-slate-900 dark:text-white">{{ $paginator->total() }}</span>
        </p>
      </div>

      @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}"
          class="relative ml-3 inline-flex items-center rounded-md border border-slate-300 bg-white px-4 py-2 text-sm font-medium leading-5 text-slate-700 ring-slate-300 transition duration-150 ease-in-out hover:text-slate-500 focus:border-blue-300 focus:outline-none focus:ring active:bg-slate-100 active:text-slate-700 dark:border-slate-600 dark:bg-slate-800 dark:text-slate-300 dark:focus:border-blue-700 dark:active:bg-slate-700 dark:active:text-slate-300">
          <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd"
              d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
              clip-rule="evenodd" />
          </svg>
        </a>
      @else
        <span
          class="relative ml-3 inline-flex cursor-default items-center rounded-md border border-slate-300 bg-white px-4 py-2 text-sm font-medium leading-5 text-slate-500 dark:border-slate-600 dark:bg-slate-800 dark:text-slate-600">
          <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd"
              d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
              clip-rule="evenodd" />
          </svg>
        </span>
      @endif
    </div>

    <div class="hidden md:flex md:flex-1 md:items-center md:justify-between">
      <div>
        <p class="text-sm leading-5 text-slate-500 dark:text-slate-400">
          {!! __('Menampilkan') !!}
          @if ($paginator->firstItem())
            <span
              class="font-semibold text-slate-900 dark:text-white">{{ $paginator->firstItem() }}-{{ $paginator->lastItem() }}</span>
          @else
            <span class="font-semibold text-slate-900 dark:text-white">{{ $paginator->count() }}</span>
          @endif
          {!! __('dari') !!}
          <span class="font-semibold text-slate-900 dark:text-white">{{ $paginator->total() }}</span>
        </p>
      </div>

      <div>
        <span class="relative z-0 inline-flex rounded-md shadow-sm rtl:flex-row-reverse">
          {{-- Previous Page Link --}}
          @if ($paginator->onFirstPage())
            <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
              <span
                class="relative inline-flex cursor-default items-center rounded-l-md border border-slate-300 bg-white px-2 py-2 text-sm font-medium leading-5 text-slate-500 dark:border-slate-600 dark:bg-slate-800"
                aria-hidden="true">
                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd"
                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                    clip-rule="evenodd" />
                </svg>
              </span>
            </span>
          @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
              class="relative inline-flex items-center rounded-l-md border border-slate-300 bg-white px-2 py-2 text-sm font-medium leading-5 text-slate-500 ring-slate-300 transition duration-150 ease-in-out hover:text-slate-400 focus:z-10 focus:border-blue-300 focus:outline-none focus:ring active:bg-slate-100 active:text-slate-500 dark:border-slate-600 dark:bg-slate-800 dark:focus:border-blue-800 dark:active:bg-slate-600"
              aria-label="{{ __('pagination.previous') }}">
              <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                  d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                  clip-rule="evenodd" />
              </svg>
            </a>
          @endif

          {{-- Pagination Elements --}}
          @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
              <span aria-disabled="true">
                <span
                  class="relative -ml-px inline-flex cursor-default items-center border border-slate-300 bg-white px-3 py-2 text-sm font-medium leading-5 text-slate-700 dark:border-slate-600 dark:bg-slate-800">{{ $element }}</span>
              </span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
              @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                  <span aria-current="page">
                    <span
                      class="relative -ml-px inline-flex cursor-default items-center border border-slate-300 bg-blue-50 px-3 py-2 text-sm font-medium leading-5 text-blue-500 dark:border-slate-600 dark:bg-slate-700 dark:text-white">{{ $page }}</span>
                  </span>
                @else
                  <a href="{{ $url }}"
                    class="relative -ml-px inline-flex items-center border border-slate-300 bg-white px-3 py-2 text-sm font-medium leading-5 text-slate-700 ring-slate-300 transition duration-150 ease-in-out hover:text-slate-500 focus:z-10 focus:border-blue-300 focus:outline-none focus:ring active:bg-slate-100 active:text-slate-700 dark:border-slate-600 dark:bg-slate-800 dark:text-slate-400 dark:hover:text-slate-300 dark:focus:border-blue-800 dark:active:bg-slate-700"
                    aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                    {{ $page }}
                  </a>
                @endif
              @endforeach
            @endif
          @endforeach

          {{-- Next Page Link --}}
          @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next"
              class="relative -ml-px inline-flex items-center rounded-r-md border border-slate-300 bg-white px-2 py-2 text-sm font-medium leading-5 text-slate-500 ring-slate-300 transition duration-150 ease-in-out hover:text-slate-400 focus:z-10 focus:border-blue-300 focus:outline-none focus:ring active:bg-slate-100 active:text-slate-500 dark:border-slate-600 dark:bg-slate-800 dark:focus:border-blue-800 dark:active:bg-slate-700"
              aria-label="{{ __('pagination.next') }}">
              <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                  clip-rule="evenodd" />
              </svg>
            </a>
          @else
            <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
              <span
                class="relative -ml-px inline-flex cursor-default items-center rounded-r-md border border-slate-300 bg-white px-2 py-2 text-sm font-medium leading-5 text-slate-500 dark:border-slate-600 dark:bg-slate-800"
                aria-hidden="true">
                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd"
                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                    clip-rule="evenodd" />
                </svg>
              </span>
            </span>
          @endif
        </span>
      </div>
    </div>
  </nav>
@endif
