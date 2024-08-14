<nav class="fixed z-30 w-full border-b border-slate-200 bg-white dark:border-slate-700 dark:bg-slate-800">
  <div class="px-3 py-3 lg:px-5 lg:pl-3">
    <div class="flex items-center justify-between">
      <div class="flex items-center justify-start">
        <button id="toggleSidebarMobile" aria-expanded="true" aria-controls="sidebar"
          class="cursor-pointer rounded p-2 text-slate-600 hover:bg-slate-100 hover:text-slate-900 focus:bg-slate-100 focus:ring-2 focus:ring-slate-100 dark:text-slate-400 dark:hover:bg-slate-700 dark:hover:text-white dark:focus:bg-slate-700 dark:focus:ring-slate-700 lg:hidden">
          <svg id="toggleSidebarMobileHamburger" class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
              d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
              clip-rule="evenodd"></path>
          </svg>
          <svg id="toggleSidebarMobileClose" class="hidden h-6 w-6" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
              clip-rule="evenodd"></path>
          </svg>
        </button>
        <div class="ml-2 flex items-center">
          <i class="fa-solid fa-envelope-open-text me-3 text-3xl text-slate-700 dark:text-slate-300"></i>
          <span
            class="self-center whitespace-nowrap text-xl font-semibold uppercase dark:text-slate-100 sm:text-2xl">{{ config('app.name') }}</span>
        </div>
      </div>
      <div class="flex items-center">
        <!-- Search mobile -->
        <button id="toggleSidebarMobileSearch" class="hidden"></button>
        <button id="theme-toggle" data-tooltip-target="tooltip-toggle" type="button"
          class="rounded-lg p-2.5 text-sm text-slate-500 hover:bg-slate-100 focus:outline-none focus:ring-4 focus:ring-slate-200 dark:text-slate-400 dark:hover:bg-slate-700 dark:focus:ring-slate-700">
          <svg id="theme-toggle-dark-icon" class="hidden h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
          </svg>
          <svg id="theme-toggle-light-icon" class="hidden h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path
              d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
              fill-rule="evenodd" clip-rule="evenodd"></path>
          </svg>
        </button>
        <div id="tooltip-toggle" role="tooltip"
          class="tooltip invisible absolute z-10 inline-block rounded-lg bg-slate-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300">
          Toggle dark mode
          <div class="tooltip-arrow" data-popper-arrow></div>
        </div>
        <!-- Profile -->
        <div class="ml-2 flex items-center">
          <div>
            <button type="button"
              class="flex rounded-full bg-slate-300 text-sm focus:ring-4 focus:ring-slate-400 dark:bg-slate-700 dark:focus:ring-slate-600"
              id="user-menu-button-2" aria-expanded="false" data-dropdown-toggle="dropdown-2">
              <span class="sr-only">Open user menu</span>
              <svg class="h-10 w-10 text-slate-500 dark:text-slate-400" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                viewBox="0 0 24 24">
                <path fill-rule="evenodd"
                  d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z"
                  clip-rule="evenodd" />
              </svg>
            </button>
          </div>
          <!-- Dropdown menu -->
          <div
            class="z-50 my-4 hidden list-none divide-y divide-slate-100 rounded bg-white text-base shadow dark:divide-slate-600 dark:bg-slate-700"
            id="dropdown-2">
            <div class="px-4 py-3" role="none">
              <p class="text-sm text-slate-900 dark:text-white" role="none">
                {{ Auth::user()->name }}
              </p>
              <p class="truncate text-sm font-medium text-slate-900 dark:text-slate-300" role="none">
                {{ Auth::user()->email }}
              </p>
            </div>
            <ul class="py-1" role="none">
              <li>
                <a href="/profile"
                  class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-600 dark:hover:text-white"
                  role="menuitem">Profile</a>
              </li>
              <li>
                <form id="logout-form" action="/logout" method="post" class="hidden">
                  @csrf
                </form>
                <a href="/logout"
                  class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-600 dark:hover:text-white"
                  onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                  role="menuitem">Sign out</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</nav>
