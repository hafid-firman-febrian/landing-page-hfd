<x-layouts.admin title="Dashboard">
    @php
        $cards = [
            ['label' => 'Layanan', 'count' => $serviceCount, 'route' => 'admin.services.index', 'icon' => '🧩'],
            ['label' => 'Portofolio', 'count' => $projectCount, 'route' => 'admin.projects.index', 'icon' => '📁'],
            ['label' => 'Testimoni', 'count' => $testimonialCount, 'route' => 'admin.testimonials.index', 'icon' => '💬'],
        ];
    @endphp

    <div class="grid sm:grid-cols-3 gap-6">
        @foreach($cards as $card)
            <a href="{{ route($card['route']) }}" class="rounded-2xl border border-white/10 bg-ink-800 p-6 hover:border-brand-500/50 transition">
                <div class="text-3xl mb-3">{{ $card['icon'] }}</div>
                <div class="text-3xl font-bold text-white">{{ $card['count'] }}</div>
                <div class="text-sm text-slate-400 mt-1">{{ $card['label'] }}</div>
            </a>
        @endforeach
    </div>

    <div class="mt-8 rounded-2xl border border-white/10 bg-ink-800 p-6">
        <h2 class="text-white font-semibold mb-2">Kelola konten landing page</h2>
        <p class="text-sm text-slate-400">Perubahan pada Layanan, Portofolio, Testimoni, serta teks Hero & CTA langsung tampil di halaman utama.</p>
        <a href="{{ route('admin.settings.edit') }}" class="inline-block mt-4 rounded-full bg-brand-600 px-4 py-2 text-sm font-semibold text-white hover:bg-brand-700 transition">Atur Hero & CTA</a>
    </div>
</x-layouts.admin>
