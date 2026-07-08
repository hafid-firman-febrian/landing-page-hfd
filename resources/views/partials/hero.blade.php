<section id="hero" class="relative overflow-hidden">
    <div class="pointer-events-none absolute -top-40 -right-40 h-96 w-96 rounded-full bg-secondary/30 blur-3xl"></div>
    <div class="mx-auto max-w-6xl px-4 py-20 md:py-28 grid md:grid-cols-2 gap-12 items-center relative">
        <div>
            @if(!empty($settings['hero_badge']))
                <span class="inline-block rounded-full border border-secondary/30 bg-secondary-50 px-4 py-1.5 text-xs font-semibold text-secondary-800 mb-6">
                    {{ $settings['hero_badge'] }}
                </span>
            @endif

            <h1 class="text-4xl md:text-6xl font-bold text-primary leading-tight mb-6">
                {{ $settings['hero_title'] ?? '' }}
            </h1>

            <p class="text-lg text-ink-600 mb-8 max-w-xl leading-relaxed">
                {{ $settings['hero_subtitle'] ?? '' }}
            </p>

            <div class="flex flex-wrap gap-4">
                @if(!empty($settings['hero_cta_primary_label']))
                    <a href="{{ $settings['hero_cta_primary_url'] ?? '#cta' }}"
                       class="rounded-full bg-accent px-6 py-3 font-semibold text-white hover:bg-accent-600 transition">
                        {{ $settings['hero_cta_primary_label'] }}
                    </a>
                @endif
                @if(!empty($settings['hero_cta_secondary_label']))
                    <a href="{{ $settings['hero_cta_secondary_url'] ?? '#portfolio' }}"
                       class="rounded-full border border-primary/20 px-6 py-3 font-semibold text-primary hover:bg-primary hover:text-white transition">
                        {{ $settings['hero_cta_secondary_label'] }}
                    </a>
                @endif
            </div>
        </div>

        @if(!empty($settings['hero_image']))
            <div class="justify-self-center">
                <img src="{{ asset($settings['hero_image']) }}" alt="Hero"
                     class="w-72 h-72 md:w-96 md:h-96 rounded-3xl object-cover shadow-2xl" loading="eager">
            </div>
        @else
            <div class="justify-self-center hidden md:block">
                <div class="w-80 h-80 rounded-3xl bg-gradient-to-br from-secondary to-accent shadow-2xl flex items-center justify-center text-7xl">
                    🚀
                </div>
            </div>
        @endif
    </div>
</section>
