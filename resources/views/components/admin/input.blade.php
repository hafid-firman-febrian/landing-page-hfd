@props([
    'name',
    'label',
    'type' => 'text',
    'value' => null,
    'required' => false,
    'help' => null,
    'rows' => 4,
])

@php
    $val = old($name, $value);
    $base = 'w-full rounded-lg border border-white/10 bg-ink-900 px-3 py-2 text-white focus:border-brand-500 focus:outline-none';
@endphp

<div>
    <label for="{{ $name }}" class="block text-sm mb-1.5">
        {{ $label }} @if($required)<span class="text-rose-400">*</span>@endif
    </label>

    @if($type === 'textarea')
        <textarea id="{{ $name }}" name="{{ $name }}" rows="{{ $rows }}" @if($required) required @endif
                  class="{{ $base }}">{{ $val }}</textarea>
    @elseif($type === 'file')
        <input id="{{ $name }}" name="{{ $name }}" type="file" accept="image/*"
               class="w-full text-sm text-slate-400 file:mr-3 file:rounded-full file:border-0 file:bg-brand-600 file:px-4 file:py-2 file:text-white hover:file:bg-brand-700">
    @else
        <input id="{{ $name }}" name="{{ $name }}" type="{{ $type }}" value="{{ $val }}" @if($required) required @endif
               class="{{ $base }}">
    @endif

    @if($help)<p class="mt-1 text-xs text-slate-500">{{ $help }}</p>@endif
    @error($name)<p class="mt-1 text-xs text-rose-400">{{ $message }}</p>@enderror
</div>
