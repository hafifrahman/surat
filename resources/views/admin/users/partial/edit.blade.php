<button type="button" data-modal-target="edit-modal-user-{{ $user->id }}"
  data-modal-toggle="edit-modal-user-{{ $user->id }}">
  <i
    class="fas fa-pen-to-square cursor-pointer text-lg text-primary-700 hover:text-primary-800 dark:text-primary-600 dark:hover:text-primary-700"></i>
</button>

<!-- Edit User Modal -->
<x-modal-form id="edit-modal-user-{{ $user->id }}" title="Edit user"
  formAction="{{ route('admin.users.update', $user) }}">
  @method('patch')
  <div class="grid grid-cols-6 gap-6">
    <div class="col-span-6">
      <x-label for="name" :value="__('Name')" />
      <x-input id="name" type="text" name="name" :value="__($user->name)" />
    </div>
    <div class="col-span-6">
      <x-label for="email" :value="__('Email')" />
      <x-input id="email" type="email" name="email" :value="__($user->email)" />
    </div>
    <div class="col-span-6">
      <x-label for="role_id" :value="__('Role')" />
      <select name="role_id" id="role_id"
        class="block w-full rounded-lg border border-slate-300 bg-slate-50 p-2.5 text-slate-900 shadow-sm focus:border-primary-500 focus:ring-primary-500 dark:border-slate-600 dark:bg-slate-700 dark:text-white dark:placeholder-slate-400 dark:focus:border-primary-500 dark:focus:ring-primary-500 sm:text-sm">
        @foreach ($roles as $role)
          <option value="{{ $role->id_role }}" {{ $user->role_id == $role->id_role ? 'selected' : '' }}>
            {{ $role->name }}
          </option>
        @endforeach
      </select>
    </div>
    <div class="col-span-6">
      <x-label for="password" :value="__('Password')" />
      <x-input id="password" type="password" name="password" />
    </div>
  </div>
</x-modal-form>
