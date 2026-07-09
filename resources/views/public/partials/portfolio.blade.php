<section id="portfolio" class="border-t border-primary/10 ">
    <div class="mx-auto max-w-6xl px-4 py-20">
        <div class="text-center max-w-2xl mx-auto mb-14">
            <div data-aos="fade-up"><span
                    class="text-accent font-semibold text-sm uppercase tracking-wide">Portfolio</span></div>

            <h2 data-aos="fade-up" data-aos-delay="100" class="text-3xl md:text-4xl font-bold text-primary mt-3">Latest
                Projects</h2>
            <p data-aos="fade-up" data-aos-delay="200" class="text-ink-600 mt-4">Real case studies: the problem, what I
                built, and what changed.</p>
        </div>

        @php $flagship = $projects->firstWhere('is_flagship', true); @endphp
        @if ($flagship)
        <div data-aos="fade-up" data-aos-delay="200">
     <article 
                class="grid lg:grid-cols-2 rounded-3xl overflow-hidden border border-primary/10 bg-surface-0 mb-8 shadow-sm hover:border-secondary/60 hover:shadow-md hover:-translate-y-2  transition-all  duration-300 ease-in-out">
                <div data-aos="fade-up" data-aos-delay="300"
                    class="p-8 md:p-12 flex flex-col justify-center order-2 lg:order-1">
                    <span class="text-xs text-accent mb-3 font-mono">// Featured Project</span>
                    <h3 class="text-2xl md:text-3xl font-bold text-primary mb-4">{{ $flagship->title }}</h3>
                    <p class="text-ink-600 mb-6 leading-relaxed">{{ $flagship->summary }}</p>
                    @if ($flagship->category)
                        <span
                            class="inline-block w-fit rounded-full border border-secondary/30 bg-secondary-50 px-3 py-1 text-xs text-secondary-800">{{ $flagship->category }}</span>
                    @endif
                </div>
                <div class="order-1 lg:order-2 min-h-64">
                    @if ($flagship->thumbnail)
                        <img src="{{ asset($flagship->thumbnail) }}" alt="{{ $flagship->title }}"
                            class="w-full h-full object-cover" loading="lazy">
                    @else
                        <div class="w-full h-full min-h-64 bg-gradient-to-br from-secondary to-accent"></div>
                    @endif
                </div>
            </article>
        </div>
       
        @endif

        <div class="grid md:grid-cols-2 gap-6">
            @foreach ($projects->where('is_flagship', false)->take(4) as $project)
                <div data-aos="fade-up" data-aos-delay="300">
                    <article
                        class="rounded-2xl border border-primary/10 bg-surface-0 overflow-hidden shadow-sm hover:border-secondary/60 hover:shadow-md  hover:-translate-y-2  transition-all  duration-300 ease-in-out">
                        @if ($project->thumbnail)
                            <img src="{{ asset($project->thumbnail) }}" alt="{{ $project->title }}"
                                class="w-full h-48 object-cover" loading="lazy">
                        @else
                            <div
                                class="w-full h-40 bg-gradient-to-br from-secondary-100 to-secondary-300 flex items-center justify-center text-4xl text-primary/30">
                                {{ mb_substr($project->title, 0, 1) }}
                            </div>
                        @endif
                        <div class="p-6">
                            <div class="text-xs text-accent mb-2">{{ $project->category }}</div>
                            <h3 class="text-lg font-semibold text-primary mb-2">{{ $project->title }}</h3>
                            <p class="text-sm text-ink-600 leading-relaxed">{{ Str::limit($project->summary, 110) }}
                            </p>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</section>
