@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-accent text-start text-base font-medium text-primary bg-accent-50 focus:outline-none focus:text-primary focus:bg-accent-100 focus:border-accent-700 transition duration-150 ease-in-out'
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-ink-600 hover:text-primary hover:bg-secondary-50 hover:border-secondary focus:outline-none focus:text-primary focus:bg-secondary-50 focus:border-secondary transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
