<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center rounded-full border border-transparent bg-accent-700 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white hover:bg-accent-600 active:bg-accent-800 focus:outline-none focus:ring-2 focus:ring-accent focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
