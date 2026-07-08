@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'rounded-lg border border-secondary/30 bg-secondary-50 px-4 py-3 text-sm text-secondary-800']) }}>
        {{ $status }}
    </div>
@endif
