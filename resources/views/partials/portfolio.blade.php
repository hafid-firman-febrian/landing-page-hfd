<section id="portfolio" class="border-t border-white/5">
    <div class="mx-auto max-w-6xl px-4 py-20">
        <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-12">
            <div>
                <span class="text-brand-500 font-semibold text-sm uppercase tracking-wide">Portofolio</span>
                <h2 class="text-3xl md:text-4xl font-bold text-white mt-3">Proyek Terbaru</h2>
                <p class="text-slate-400 mt-4 max-w-xl">Studi kasus nyata: masalah, apa yang saya bangun, dan apa yang berubah.</p>
            </div>
        </div>

        @php $flagship = $projects->firstWhere('is_flagship', true); @endphp
        @if($flagship)
            <article class="grid lg:grid-cols-2 rounded-3xl overflow-hidden border border-white/10 bg-ink-800 mb-8">
                <div class="p-8 md:p-12 flex flex-col justify-center order-2 lg:order-1">
                    <span class="text-xs text-brand-400 mb-3 font-mono">// Featured Project</span>
                    <h3 class="text-2xl md:text-3xl font-bold text-white mb-4">{{ $flagship->title }}</h3>
                    <p class="text-slate-400 mb-6 leading-relaxed">{{ $flagship->summary }}</p>
                    @if($flagship->category)
                        <span class="inline-block w-fit rounded-full border border-white/10 px-3 py-1 text-xs text-slate-400">{{ $flagship->category }}</span>
                    @endif
                </div>
                <div class="order-1 lg:order-2 min-h-64">
                    @if($flagship->thumbnail)
                        <img src="{{ asset($flagship->thumbnail) }}" alt="{{ $flagship->title }}"
                             class="w-full h-full object-cover" loading="lazy">
                    @else
                        <div class="w-full h-full min-h-64 bg-gradient-to-br from-brand-600 to-brand-700"></div>
                    @endif
                </div>
            </article>
        @endif

        <div class="grid md:grid-cols-2 gap-6">
            @foreach($projects->where('is_flagship', false)->take(4) as $project)
                <article class="rounded-2xl border border-white/10 bg-ink-800 overflow-hidden hover:border-brand-500/50 transition">
                    @if($project->thumbnail)
                        <img src="{{ asset($project->thumbnail) }}" alt="{{ $project->title }}"
                             class="w-full h-48 object-cover" loading="lazy">
                    @else
                        <div class="w-full h-40 bg-gradient-to-br from-ink-700 to-ink-800 flex items-center justify-center text-4xl text-white/20">
                            {{ mb_substr($project->title, 0, 1) }}
                        </div>
                    @endif
                    <div class="p-6">
                        <div class="text-xs text-brand-400 mb-2">{{ $project->category }}</div>
                        <h3 class="text-lg font-semibold text-white mb-2">{{ $project->title }}</h3>
                        <p class="text-sm text-slate-400 leading-relaxed">{{ Str::limit($project->summary, 110) }}</p>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
