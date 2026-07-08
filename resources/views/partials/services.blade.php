<section id="services" class="border-t border-white/5">
    <div class="mx-auto max-w-6xl px-4 py-20">
        <div class="text-center max-w-2xl mx-auto mb-14">
            <span class="text-brand-500 font-semibold text-sm uppercase tracking-wide">Layanan</span>
            <h2 class="text-3xl md:text-4xl font-bold text-white mt-3">Apa yang bisa Anda percayakan</h2>
            <p class="text-slate-400 mt-4">Dibuat untuk founder yang mencari partner, bukan sekadar vendor.</p>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($services as $service)
                <article class="rounded-2xl border border-white/10 bg-ink-800 p-6 hover:border-brand-500/50 transition">
                    <div class="text-3xl mb-4">{{ $service->icon }}</div>
                    <h3 class="text-lg font-semibold text-white mb-2">{{ $service->title }}</h3>
                    <p class="text-sm text-slate-400 leading-relaxed">{{ $service->description }}</p>
                </article>
            @endforeach
        </div>
    </div>
</section>
