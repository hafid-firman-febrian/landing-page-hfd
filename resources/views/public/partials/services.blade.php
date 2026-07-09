<section id="services" class="border-t border-primary/10 bg-surface-100/60">
    <div class="mx-auto max-w-6xl px-4 py-20">
        <div class="text-center max-w-2xl mx-auto mb-14">
            <div data-aos="fade-up">
                <span class="text-accent font-semibold text-sm uppercase tracking-wide">Services</span>
            </div>

            <h2 data-aos="fade-up" data-aos-delay="200" class="text-3xl md:text-4xl font-bold text-primary mt-3">What you
                can
                trust me with</h2>
            <p data-aos="fade-up" data-aos-delay="300" class="text-ink-600 mt-4">Built for founders looking for a
                partner, not just a vendor.</p>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($services as $service)
                <div data-aos="flip-right" data-aos-delay="{{ $loop->index * 250 }}" class="h-full">
                    <article
                        class="h-full rounded-2xl border border-primary/10 bg-surface-0 p-6 shadow-sm hover:border-accent/60 hover:shadow-md transition-all  duration-300 ease-in-out hover:-translate-y-2">
                        <div class="text-3xl mb-4 text-secondary">
                            @if ($service->icon)
                                <i class="{{ $service->icon }}"></i>
                            @endif
                        </div>
                        <h3 class="text-lg font-semibold text-primary mb-2">{{ $service->title }}</h3>
                        <p class="text-sm text-ink-600 leading-relaxed">{{ $service->description }}</p>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</section>
