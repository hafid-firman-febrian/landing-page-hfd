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
    $base = 'w-full rounded-lg border border-primary/15 bg-surface-0 px-3 py-2 text-primary placeholder:text-ink-400 focus:border-secondary focus:outline-none focus:ring-2 focus:ring-secondary/20';
@endphp

<div>
    <label for="{{ $name }}" class="block text-sm mb-1.5">
        {{ $label }} @if($required)<span class="text-accent">*</span>@endif
    </label>

    @if($type === 'textarea')
        <textarea id="{{ $name }}" name="{{ $name }}" rows="{{ $rows }}" @if($required) required @endif
                  class="{{ $base }}">{{ $val }}</textarea>
    @elseif($type === 'file')
        <input id="{{ $name }}" name="{{ $name }}" type="file" accept="image/*"
               class="w-full text-sm text-ink-600 file:mr-3 file:rounded-full file:border-0 file:bg-accent file:px-4 file:py-2 file:text-white hover:file:bg-accent-600">
    @else
        <input id="{{ $name }}" name="{{ $name }}" type="{{ $type }}" value="{{ $val }}" @if($required) required @endif
               class="{{ $base }}">
    @endif

    @if($help)<p class="mt-1 text-xs text-ink-500">{{ $help }}</p>@endif
    @error($name)<p class="mt-1 text-xs text-rose-400">{{ $message }}</p>@enderror
</div>
