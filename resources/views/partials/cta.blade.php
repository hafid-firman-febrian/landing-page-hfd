<section id="cta" class="border-t border-primary/10">
    <div class="mx-auto max-w-4xl px-4 py-24">
        <div class="rounded-3xl bg-gradient-to-br from-primary to-secondary-700 px-8 py-16 text-center shadow-2xl shadow-primary/15">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                {{ $settings['cta_title'] ?? 'Ready to get started?' }}
            </h2>
            <p class="text-white/80 mb-8 max-w-xl mx-auto leading-relaxed">
                {{ $settings['cta_subtitle'] ?? '' }}
            </p>
            @if(!empty($settings['cta_button_label']))
                <a href="{{ $settings['cta_button_url'] ?? '#' }}"
                   class="inline-block rounded-full bg-accent px-8 py-3 font-semibold text-white hover:bg-accent-600 transition">
                    {{ $settings['cta_button_label'] }}
                </a>
            @endif
        </div>
    </div>
</section>
