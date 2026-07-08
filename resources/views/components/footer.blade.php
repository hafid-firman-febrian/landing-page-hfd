<footer class="bg-primary text-white">
    <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 md:py-12 lg:px-8">
        <div class="flex flex-col gap-y-10 lg:flex-row lg:items-center lg:justify-between">

            <div class="col-span-2 lg:col-span-4">
                <div>
                    <a href="{{ route('landing') }}" class="inline-flex items-center gap-3">
                        <span
                            class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-white/10 text-sm font-semibold text-white">
                            HF
                        </span>
                        <span class="text-sm font-semibold uppercase tracking-[0.2em] text-white">
                            Hafid Firman Febrian
                        </span>
                    </a>

                    <p class="mb-4 mt-4 max-w-sm text-[0.92rem] leading-[1.7] text-ink-500">
                        Mobile developer based in Semarang, Indonesia. I build seamless mobile applications using
                        Flutter, Kotlin, and Swift, alongside modern web experiences.
                    </p>

                    <nav class="flex items-center gap-4 text-white">
                        <a href="https://github.com/hafid-firman-febrian" target="_blank" rel="noopener noreferrer"
                            aria-label="GitHub" class="text-xl text-ink-500 transition hover:text-white">
                            <i class="fa-brands fa-github"></i>
                        </a>

                        <a href="https://id.linkedin.com/in/ridzwan-gigih-herdyantha" target="_blank"
                            rel="noopener noreferrer" aria-label="LinkedIn"
                            class="text-xl text-ink-500 transition hover:text-white">
                            <i class="fa-brands fa-linkedin"></i>
                        </a>
                        <a href="https://twitter.com/ridzwangigih" target="_blank" rel="noopener noreferrer"
                            aria-label="X / Twitter" class="text-xl text-ink-500 transition hover:text-white">
                            <i class="fa-brands fa-upwork"></i>
                        </a>


                    </nav>
                </div>
            </div>
            <div class="flex items-center gap-6">
                <a href="#services" class="hover:text-primary transition">Services</a>
                <a href="#portfolio" class="hover:text-primary transition">Portfolio</a>
                <a href="#cta" class="hover:text-primary transition">Contact</a>
            </div>




        </div>
    </div>

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="border-t border-background py-4 md:flex md:items-center md:justify-between">
            <p class="mb-2 text-sm text-slate-400 md:mb-0">
                &copy; {{ date('Y') }} Hafid Firman Febrian. All rights reserved.
            </p>

            <p class="mb-0 text-sm text-slate-400">
                <a href="https://hafidfirman.com" class="text-slate-400 transition hover:text-white">
                    hafidfirman.com
                </a>
            </p>
        </div>
    </div>
</footer>
