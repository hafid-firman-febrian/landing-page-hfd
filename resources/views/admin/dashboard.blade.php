<x-layouts.admin title="Dashboard">
    @php
        $cards = [
            ['label' => 'Services', 'count' => $serviceCount, 'route' => 'admin.services.index', 'icon' => '🧩'],
            ['label' => 'Portfolio', 'count' => $projectCount, 'route' => 'admin.projects.index', 'icon' => '📁'],
            ['label' => 'Testimonials', 'count' => $testimonialCount, 'route' => 'admin.testimonials.index', 'icon' => '💬'],
        ];
    @endphp

    <div class="grid sm:grid-cols-3 gap-6">
        @foreach($cards as $card)
            <a href="{{ route($card['route']) }}" class="rounded-2xl border border-primary/10 bg-surface-0 p-6 shadow-sm hover:border-secondary/60 hover:shadow-md transition">
                <div class="text-3xl mb-3">{{ $card['icon'] }}</div>
                <div class="text-3xl font-bold text-primary">{{ $card['count'] }}</div>
                <div class="text-sm text-ink-600 mt-1">{{ $card['label'] }}</div>
            </a>
        @endforeach
    </div>

    <div class="mt-8 rounded-2xl border border-primary/10 bg-surface-0 p-6 shadow-sm">
        <h2 class="text-primary font-semibold mb-2">Manage landing page content</h2>
        <p class="text-sm text-ink-600">Changes to Services, Portfolio, Testimonials, and Hero & CTA copy appear directly on the homepage.</p>
        <a href="{{ route('admin.settings.edit') }}" class="inline-block mt-4 rounded-full bg-accent px-4 py-2 text-sm font-semibold text-white hover:bg-accent-600 transition">Edit Hero & CTA</a>
    </div>
</x-layouts.admin>
