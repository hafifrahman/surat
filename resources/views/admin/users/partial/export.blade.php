<button type="button" id="dropdownDefaultButton" data-dropdown-toggle="exportUsers" data-dropdown-placement="left"
  class="inline-flex w-1/2 items-center justify-center rounded-lg border border-slate-300 bg-white px-3 py-2 text-center text-sm font-medium text-slate-900 hover:bg-slate-100 focus:ring-4 focus:ring-primary-300 dark:border-slate-600 dark:bg-slate-800 dark:text-slate-400 dark:hover:bg-slate-700 dark:hover:text-white dark:focus:ring-slate-700 sm:w-auto">
  <i class="fa-solid fa-ellipsis-vertical mr-2"></i>
  Export
</button>

<!-- Dropdown menu -->
<div id="exportUsers"
  class="z-10 hidden w-20 divide-y divide-slate-100 rounded border border-slate-200 bg-white shadow dark:border-slate-600 dark:bg-slate-700">
  <ul aria-labelledby="dropdownDefaultButton">
    <li class="flex justify-center">
      <a href="/admin/users/export/excel" class="inline-flex px-2 py-3">
        <i class="fa-solid fa-file-excel text-xl text-slate-900 dark:text-slate-200"></i>
      </a>

      <a href="/admin/users/export/pdf" class="inline-flex px-2 py-3">
        <i class="fa-solid fa-file-pdf text-xl text-slate-900 dark:text-slate-200"></i>
      </a>
    </li>
  </ul>
</div>
