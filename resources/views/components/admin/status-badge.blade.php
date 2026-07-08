@props(['active' => false])

@if($active)
    <span class="inline-flex items-center gap-1 rounded-full bg-secondary-50 px-2.5 py-0.5 text-xs text-secondary-800">Active</span>
@else
    <span class="inline-flex items-center gap-1 rounded-full bg-ink-100 px-2.5 py-0.5 text-xs text-ink-600">Inactive</span>
@endif
