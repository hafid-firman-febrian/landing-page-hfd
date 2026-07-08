<section id="testimonials" class="border-t border-white/5">
    <div class="mx-auto max-w-6xl px-4 py-20">
        <div class="text-center max-w-2xl mx-auto mb-14">
            <span class="text-brand-500 font-semibold text-sm uppercase tracking-wide">Testimoni</span>
            <h2 class="text-3xl md:text-4xl font-bold text-white mt-3">Klien senang bekerja dengan saya</h2>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($testimonials as $testimonial)
                <figure class="rounded-2xl border border-white/10 bg-ink-800 p-6 flex flex-col">
                    <div class="text-amber-400 mb-4" aria-label="{{ $testimonial->rating }} dari 5 bintang">
                        {{ str_repeat('★', $testimonial->rating) }}{{ str_repeat('☆', max(0, 5 - $testimonial->rating)) }}
                    </div>
                    <blockquote class="text-slate-300 mb-6 leading-relaxed flex-1">"{{ $testimonial->quote }}"</blockquote>
                    <figcaption class="text-sm">
                        @if($testimonial->source_url)
                            <a href="{{ $testimonial->source_url }}" target="_blank" rel="noopener noreferrer" class="text-white font-semibold hover:text-brand-400">{{ $testimonial->name }}</a>
                        @else
                            <span class="text-white font-semibold">{{ $testimonial->name }}</span>
                        @endif
                        @if($testimonial->role)<span class="text-slate-500"> · {{ $testimonial->role }}</span>@endif
                    </figcaption>
                </figure>
            @endforeach
        </div>
    </div>
</section>
