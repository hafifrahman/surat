@props(['value'])

<label {{ $attributes->merge(['class' => 'mb-2 block text-sm font-medium text-slate-900 dark:text-white']) }}>
  {{ $value ?? $slot }}
</label>
