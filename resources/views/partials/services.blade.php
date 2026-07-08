<section id="services" class="border-t border-primary/10">
    <div class="mx-auto max-w-6xl px-4 py-20">
        <div class="text-center max-w-2xl mx-auto mb-14">
            <span class="text-accent font-semibold text-sm uppercase tracking-wide">Services</span>
            <h2 class="text-3xl md:text-4xl font-bold text-primary mt-3">What you can trust me with</h2>
            <p class="text-ink-600 mt-4">Built for founders looking for a partner, not just a vendor.</p>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($services as $service)
                <article class="rounded-2xl border border-primary/10 bg-surface-0 p-6 shadow-sm hover:border-secondary/60 hover:shadow-md transition">
                    <div class="text-3xl mb-4 text-secondary">
                        @if($service->icon)<i class="{{ $service->icon }}"></i>@endif
                    </div>
                    <h3 class="text-lg font-semibold text-primary mb-2">{{ $service->title }}</h3>
                    <p class="text-sm text-ink-600 leading-relaxed">{{ $service->description }}</p>
                </article>
            @endforeach
        </div>
    </div>
</section>
