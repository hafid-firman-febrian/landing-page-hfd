<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center rounded-full border border-primary/20 bg-surface-0 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-primary shadow-sm hover:bg-secondary-50 focus:outline-none focus:ring-2 focus:ring-secondary focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
