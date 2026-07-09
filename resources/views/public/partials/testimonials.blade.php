<section id="testimonials" class="border-t border-primary/10">
    <div class="mx-auto max-w-6xl px-4 py-20">
        <div class="text-center max-w-2xl mx-auto mb-14">
            <span class="text-accent font-semibold text-sm uppercase tracking-wide">Testimonials</span>
            <h2 class="text-3xl md:text-4xl font-bold text-primary mt-3">Clients enjoy working with me</h2>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($testimonials as $testimonial)
                <figure class="rounded-2xl border border-primary/10 bg-surface-0 p-6 flex flex-col shadow-sm">
                    <div class="text-accent mb-4" aria-label="{{ $testimonial->rating }} out of 5 stars">
                        @for($s = 1; $s <= 5; $s++)
                            <i class="fa-star {{ $s <= $testimonial->rating ? 'fa-solid' : 'fa-regular' }}"></i>
                        @endfor
                    </div>
                    <blockquote class="text-ink-700 mb-6 leading-relaxed flex-1">"{{ $testimonial->quote }}"</blockquote>
                    <figcaption class="text-sm">
                        @if($testimonial->source_url)
                            <a href="{{ $testimonial->source_url }}" target="_blank" rel="noopener noreferrer" class="text-primary font-semibold hover:text-accent">{{ $testimonial->name }}</a>
                        @else
                            <span class="text-primary font-semibold">{{ $testimonial->name }}</span>
                        @endif
                        @if($testimonial->role)<span class="text-ink-500"> · {{ $testimonial->role }}</span>@endif
                    </figcaption>
                </figure>
            @endforeach
        </div>
    </div>
</section>
