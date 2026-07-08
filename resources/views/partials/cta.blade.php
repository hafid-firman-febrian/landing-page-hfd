<section id="cta" class="border-t border-white/5">
    <div class="mx-auto max-w-4xl px-4 py-24">
        <div class="rounded-3xl bg-gradient-to-br from-brand-600 to-brand-700 px-8 py-16 text-center shadow-2xl">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                {{ $settings['cta_title'] ?? 'Siap memulai?' }}
            </h2>
            <p class="text-white/80 mb-8 max-w-xl mx-auto leading-relaxed">
                {{ $settings['cta_subtitle'] ?? '' }}
            </p>
            @if(!empty($settings['cta_button_label']))
                <a href="{{ $settings['cta_button_url'] ?? '#' }}"
                   class="inline-block rounded-full bg-white px-8 py-3 font-semibold text-brand-700 hover:bg-slate-100 transition">
                    {{ $settings['cta_button_label'] }}
                </a>
            @endif
        </div>
    </div>
</section>
