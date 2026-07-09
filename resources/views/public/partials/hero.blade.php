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
            <div class="justify-self-center hidden md:block">
                <div
                    class="w-80 h-80 rounded-3xl bg-gradient-to-br from-secondary to-accent shadow-2xl flex items-center justify-center text-7xl text-white">
                    <i class="fa-solid fa-rocket"></i>
                </div>
            </div>
        @endif
    </div>
</section>
