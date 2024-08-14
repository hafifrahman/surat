<aside id="sidebar"
  class="fixed left-0 top-0 z-20 hidden h-full w-64 flex-shrink-0 flex-col pt-16 font-normal transition-width duration-75 lg:flex"
  aria-label="Sidebar">
  <div
    class="relative flex min-h-screen flex-1 flex-col border-r border-slate-200 bg-white pt-0 dark:border-slate-700 dark:bg-slate-800">
    <div class="flex flex-1 flex-col overflow-y-auto pb-4 pt-5">
      <div class="flex-1 space-y-1 divide-y divide-slate-200 bg-white px-3 dark:divide-slate-700 dark:bg-slate-800">
        <ul class="space-y-2 pb-2">
          <x-nav-link :href="route(currentRole() . '.dashboard')" :active="request()->is(currentRole() . '/dashboard')" svg>
            {{ __('Dashboard') }}
          </x-nav-link>

          @if (currentRole() === 'admin')
            <x-nav-link href="/admin/users" :active="request()->is('admin/users*')" icon="fas fa-user">
              {{ __('Pengguna') }}
            </x-nav-link>
          @endif

          <x-nav-link :href="route(currentRole() . '.agenda.index')" :active="request()->is(currentRole() . '/agenda*')" icon="fas fa-calendar-days">
            {{ __('Agenda') }}
          </x-nav-link>

          <x-dropdown id="dropdown-arsip" title="Kelola Arsip" icon="fas fa-box-archive" :active="request()->is([
              currentRole() . '/arsip*',
              currentRole() . '/surat-masuk*',
              currentRole() . '/surat-keluar*',
          ])">
            <x-dropdown-link :href="route(currentRole() . '.arsip.index')" text="Arsip" :active="request()->is(currentRole() . '/arsip*')" />
            <x-dropdown-link :href="route(currentRole() . '.surat-masuk.index')" text="Surat Masuk" :active="request()->is(currentRole() . '/surat-masuk*')" />
            <x-dropdown-link :href="route(currentRole() . '.surat-keluar.index')" text="Surat Keluar" :active="request()->is(currentRole() . '/surat-keluar*')" />
          </x-dropdown>

          <x-dropdown id="dropdown-laporan" title="Laporan" icon="fas fa-file-lines" :active="request()->is([currentRole() . '/laporan-sm*', currentRole() . '/laporan-sk*'])">
            <x-dropdown-link :href="route(currentRole() . '.laporan-sm')" text="Laporan Surat Masuk" :active="request()->is(currentRole() . '/laporan-sm*')" />
            <x-dropdown-link :href="route(currentRole() . '.laporan-sk')" text="Laporan Surat Keluar" :active="request()->is(currentRole() . '/laporan-sk*')" />
          </x-dropdown>
        </ul>
      </div>
    </div>
  </div>
</aside>

<div class="fixed inset-0 z-10 hidden bg-slate-900/50 dark:bg-slate-900/90" id="sidebarBackdrop"></div>
