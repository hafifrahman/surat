<x-danger-button type="button" class="ms-2 px-5 py-2.5" data-modal-target="delete-account-modal"
  data-modal-toggle="delete-account-modal">
  Hapus akun
</x-danger-button>

<div
  class="fixed left-0 right-0 top-4 z-50 hidden h-modal items-center justify-center overflow-y-auto overflow-x-hidden sm:h-full md:inset-0"
  id="delete-account-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true">
  <div class="relative h-full w-full max-w-2xl px-4 md:h-auto">
    <!-- Modal content -->
    <div class="relative rounded-lg bg-white shadow dark:bg-slate-800">
      <!-- Modal header -->
      <div class="flex items-start justify-between rounded-t border-b p-5 dark:border-slate-700">
        <h3 class="text-xl font-semibold dark:text-white">
          Hapus akun
        </h3>
        <button type="button"
          class="ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-slate-400 hover:bg-slate-200 hover:text-slate-900 dark:hover:bg-slate-700 dark:hover:text-white"
          data-modal-toggle="delete-account-modal">
          <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
              clip-rule="evenodd"></path>
          </svg>
        </button>
      </div>
      <!-- Modal body -->
      <div class="p-6">
        <form action="{{ route('profile.destroy') }}" method="POST">
          @csrf
          @method('delete')
          <div class="space-y-6">
            <p class="text-base leading-relaxed text-slate-500 dark:text-slate-400">
              Yakin menghapus akun?
            </p>
            <div>
              <x-input name="password" type="password" placeholder="Password" required />
              <x-input-error :messages="$errors->get('hapus_password')" class="mt-2" />
            </div>
            <x-danger-button class="px-5 py-2.5">
              Hapus
            </x-danger-button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
