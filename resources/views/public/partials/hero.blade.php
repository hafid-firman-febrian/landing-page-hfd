<section id="hero" class="relative overflow-hidden flex items-center min-h-[calc(100vh-4rem)] ">
    <div class="pointer-events-none absolute -top-40 -right-40 h-96 w-96 rounded-full bg-secondary/40 blur-3xl"></div>
    <div class="mx-auto w-full max-w-6xl px-4 py-12 grid md:grid-cols-2 gap-12 items-center relative">
        <div>
            @if (!empty($settings['hero_badge']))
                <span data-aos="fade-up" data-aos-delay="0"
                    class="inline-block rounded-full border border-secondary/30 bg-secondary-50 px-4 py-1.5 text-xs font-semibold text-secondary-800 mb-6">
                    {{ $settings['hero_badge'] }}
                </span>
            @endif

            <h1 data-aos="fade-up" data-aos-delay="200"
                class="text-3xl md:text-5xl font-bold text-primary leading-tight mb-6">
                {{ $settings['hero_title'] ?? '' }}
            </h1>

            <p data-aos="fade-up" data-aos-delay="300" class="text-lg text-ink-600 mb-8 max-w-xl leading-relaxed">
                {{ $settings['hero_subtitle'] ?? '' }}
            </p>

            <div data-aos="fade-up" data-aos-delay="400" class="flex flex-wrap gap-4">
                @if (!empty($settings['hero_cta_primary_label']))
                    <a href="{{ $settings['hero_cta_primary_url'] ?? '#cta' }}"
                        class="rounded-full bg-accent px-6 py-3 font-semibold text-white hover:bg-accent-600 transition">
                        {{ $settings['hero_cta_primary_label'] }}
                    </a>
                @endif
                @if (!empty($settings['hero_cta_secondary_label']))
                    <a href="{{ $settings['hero_cta_secondary_url'] ?? '#portfolio' }}"
                        class="rounded-full border border-primary/20 px-6 py-3 font-semibold text-primary hover:bg-primary hover:text-white transition">
                        {{ $settings['hero_cta_secondary_label'] }}
                    </a>
                @endif
            </div>
        </div>

        @if (!empty($settings['hero_image']))
            <div data-aos="flip-up" class="justify-self-center">
                <img src="{{ asset($settings['hero_image']) }}" alt="Hero"
                    class="w-72 h-72 md:w-96 md:h-96 rounded-3xl object-cover shadow-2xl" loading="eager">
            </div>
        @else
            <div data-aos="flip-up" class="justify-self-center">
                <div
                    class="w-72 h-72 md:w-96 md:h-96 rounded-3xl bg-ink-100 border border-ink-200 shadow-2xl flex items-center justify-center text-ink-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-24 h-24 md:w-28 md:h-28">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909M18 8.25h.008v.008H18V8.25Zm.75 8.25a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H5.25A1.5 1.5 0 0 0 3.75 6v9a1.5 1.5 0 0 0 1.5 1.5h13.5Z" />
                    </svg>
                </div>
            </div>
        @endif
    </div>
</section>
