<header class="sticky top-0 z-50 border-b border-primary/10 bg-background/85 backdrop-blur">
    <nav class="mx-auto max-w-6xl px-4 h-16 flex items-center sm:justify-center">
        {{-- <a href="#hero" class="font-bold text-white text-lg">{{ config('app.name') }}</a> --}}

        <div class="hidden md:flex items-center gap-8 text-sm text-ink-700">
            <a href="#services" class="hover:text-primary transition">Services</a>
            <a href="#portfolio" class="hover:text-primary transition">Portfolio</a>
            <a href="#testimonials" class="hover:text-primary transition">Testimonials</a>
            <a href="#cta"
                class="rounded-full bg-accent px-4 py-2 font-semibold text-white hover:bg-accent-600 transition">Contact</a>
        </div>

        <button data-menu-toggle class="sm:hidden text-primary text-2xl leading-none" aria-label="Buka menu">☰</button>
    </nav>

    <div data-menu class="hidden sm:hidden px-4 pb-4 space-y-1 text-sm text-ink-700 border-t border-primary/10">
        <a href="#services" class="block py-2 hover:text-primary">Services</a>
        <a href="#portfolio" class="block py-2 hover:text-primary">Portfolio</a>
        <a href="#testimonials" class="block py-2 hover:text-primary">Testimonials</a>
        <a href="#cta" class="block py-2 text-accent hover:text-accent-700">Contact</a>
    </div>
</header>
