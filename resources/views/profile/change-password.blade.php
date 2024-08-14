<div
  class="mb-4 rounded-lg border border-slate-200 bg-white p-4 shadow dark:border-slate-700 dark:bg-slate-800 sm:p-6 2xl:col-span-2">
  <h3 class="mb-4 text-xl font-semibold dark:text-white">Password information</h3>
  <form action="{{ route('update.password') }}" method="post">
    @csrf
    @method('put')
    <div class="grid grid-cols-6 gap-6">
      <div class="col-span-6">
        <x-label for="current_password" :value="__('Current Password')" />
        <x-input id="current_password" class="block w-full" type="password" name="current_password"
          autocomplete="current-password" required />
        <x-input-error :messages="$errors->get('current_password')" class="mt-2" />
      </div>
      <div class="col-span-6">
        <x-label for="password" :value="__('New Password')" />
        <x-input id="password" class="block w-full" type="password" name="password" autocomplete="new-password"
          required />
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
      </div>
      <div class="col-span-6">
        <x-label for="password_confirmation" :value="__('Confirm Password')" />
        <x-input id="password_confirmation" class="block w-full" type="password" name="password_confirmation"
          autocomplete="new-password" />
        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
      </div>
      <div class="sm:col-full col-span-6">
        <x-primary-button class="px-5 py-2.5">
          Simpan
        </x-primary-button>
      </div>
    </div>
  </form>
</div>
