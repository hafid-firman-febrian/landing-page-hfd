<section id="testimonials" class="border-t border-primary/10 bg-surface-100/60">
    <div class="mx-auto max-w-6xl px-4 py-20">
        <div data-aos="fade-up" class="text-center max-w-2xl mx-auto mb-14">
            <span class="text-accent font-semibold text-sm uppercase tracking-wide">Testimonials</span>
            <h2 data-aos="fade-up" data-aos-delay="100" class="text-3xl md:text-4xl font-bold text-primary mt-3">Clients
                enjoy working with me</h2>
        </div>

        @php
            // Swiper's centeredSlides+loop needs at least slidesPerView(3) + loopedSlides(2) = 5
            // physical slides to reposition on either side without running out mid-cycle (see
            // resources/js/testimonials-carousel.js breakpoints: slidesPerView tops out at 3).
            // Below that, pad by repeating from the start so the loop never runs dry.
            $swiperMinimumSlides = 5;
            $testimonialSlides = $testimonials;
            if ($testimonialSlides->count() > 0 && $testimonialSlides->count() < $swiperMinimumSlides) {
                $testimonialSlides = $testimonialSlides->concat(
                    $testimonialSlides->take($swiperMinimumSlides - $testimonialSlides->count()),
                );
            }
        @endphp
        <div class="swiper testimonials-swiper [--swiper-theme-color:var(--color-accent)]">
            <div class="swiper-wrapper">
                @foreach ($testimonialSlides as $testimonial)
                    <div class="swiper-slide h-full">
                        <figure
                            class="h-full min-h-80 rounded-2xl border border-primary/10 bg-surface-0 p-6 flex flex-col shadow-sm transition-all  duration-300 ease-in-out hover:-translate-y-2 hover:border-accent/60 hover:shadow-md ">
                            <div class="text-accent mb-4" aria-label="{{ $testimonial->rating }} out of 5 stars">
                                @for ($s = 1; $s <= 5; $s++)
                                    <i class="fa-star {{ $s <= $testimonial->rating ? 'fa-solid' : 'fa-regular' }}"></i>
                                @endfor
                            </div>
                            <blockquote class="text-ink-700 mb-6 leading-relaxed flex-1">"{{ $testimonial->quote }}"
                            </blockquote>
                            <figcaption class="text-sm">
                                @if ($testimonial->source_url)
                                    <a href="{{ $testimonial->source_url }}" target="_blank" rel="noopener noreferrer"
                                        class="text-primary font-semibold hover:text-accent">{{ $testimonial->name }}</a>
                                @else
                                    <span class="text-primary font-semibold">{{ $testimonial->name }}</span>
                                @endif
                                @if ($testimonial->role)
                                    <span class="text-ink-500"> · {{ $testimonial->role }}</span>
                                @endif
                            </figcaption>
                        </figure>
                    </div>
                @endforeach
            </div>

            <div class="swiper-pagination mt-8"></div>

            <button type="button" class="swiper-button-prev !text-accent" aria-label="Previous testimonial"></button>
            <button type="button" class="swiper-button-next !text-accent" aria-label="Next testimonial"></button>
        </div>
    </div>
</section>
