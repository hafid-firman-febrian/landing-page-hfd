<header class="sticky top-0 z-50 backdrop-blur bg-ink-900/80 border-b border-white/5">
    <nav class="mx-auto max-w-6xl px-4 h-16 flex items-center justify-between">
        <a href="#hero" class="font-bold text-white text-lg">{{ config('app.name') }}</a>

        <div class="hidden md:flex items-center gap-8 text-sm">
            <a href="#services" class="hover:text-white transition">Layanan</a>
            <a href="#portfolio" class="hover:text-white transition">Portofolio</a>
            <a href="#testimonials" class="hover:text-white transition">Testimoni</a>
            <a href="#cta" class="rounded-full bg-brand-600 px-4 py-2 text-white hover:bg-brand-700 transition">Hubungi</a>
        </div>

        <button data-menu-toggle class="md:hidden text-white text-2xl leading-none" aria-label="Buka menu">☰</button>
    </nav>

    <div data-menu class="hidden md:hidden px-4 pb-4 space-y-1 text-sm border-t border-white/5">
        <a href="#services" class="block py-2 hover:text-white">Layanan</a>
        <a href="#portfolio" class="block py-2 hover:text-white">Portofolio</a>
        <a href="#testimonials" class="block py-2 hover:text-white">Testimoni</a>
        <a href="#cta" class="block py-2 text-brand-400">Hubungi</a>
    </div>
</header>
