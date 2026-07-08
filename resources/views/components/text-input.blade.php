@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'w-full rounded-lg border border-primary/15 bg-surface-0 px-3 py-2 text-primary placeholder:text-ink-400 focus:border-secondary focus:outline-none focus:ring-2 focus:ring-secondary/20']) }}>
