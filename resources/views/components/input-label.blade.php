@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-sm mb-1.5 text-primary']) }}>
    {{ $value ?? $slot }}
</label>
