<x-primary-button class="w-1/2 items-center justify-center sm:w-auto" data-modal-target="add-user-modal"
  data-modal-toggle="add-user-modal">
  <i class="fas fa-plus mr-3"></i>
  Tambah
</x-primary-button>
<x-modal-form id="add-user-modal" title="Tambah pengguna" formAction="{{ route('admin.users.store') }}">
  <div class="grid grid-cols-6 gap-6">
    <div class="col-span-6">
      <x-label for="name" :value="__('Name')" />
      <x-input id="name" type="text" name="name" required />
    </div>
    <div class="col-span-6">
      <x-label for="email" :value="__('Email')" />
      <x-input id="email" type="email" name="email" required />
    </div>
    <div class="col-span-6">
      <x-label for="role_id" :value="__('Role')" />
      <select name="role_id" id="role_id"
        class="block w-full rounded-lg border border-slate-300 bg-slate-50 p-2.5 text-slate-900 shadow-sm focus:border-primary-500 focus:ring-primary-500 dark:border-slate-600 dark:bg-slate-700 dark:text-white dark:placeholder-slate-400 dark:focus:border-primary-500 dark:focus:ring-primary-500 sm:text-sm">
        <option value="">Pilih...</option>
        @foreach ($roles as $role)
          <option value="{{ $role->id_role }}">{{ $role->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="col-span-6">
      <x-label for="password" :value="__('Password')" />
      <x-input id="password" type="password" name="password" required />
    </div>
  </div>
</x-modal-form>
