@props(['title' => 'Admin'])

<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }} · Admin</title>
    @fonts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-ink-900 text-slate-300 antialiased font-sans min-h-screen flex">
    @php
        $nav = [
            ['route' => 'admin.dashboard', 'label' => 'Dashboard', 'icon' => '🏠'],
            ['route' => 'admin.services.index', 'label' => 'Layanan', 'icon' => '🧩'],
            ['route' => 'admin.projects.index', 'label' => 'Portofolio', 'icon' => '📁'],
            ['route' => 'admin.testimonials.index', 'label' => 'Testimoni', 'icon' => '💬'],
            ['route' => 'admin.settings.edit', 'label' => 'Hero & CTA', 'icon' => '⚙️'],
        ];
    @endphp

    <aside class="hidden md:flex w-64 shrink-0 flex-col border-r border-white/5 bg-ink-800 p-4">
        <a href="{{ route('admin.dashboard') }}" class="font-bold text-white text-lg px-2 py-3">{{ config('app.name') }}</a>
        <nav class="mt-4 space-y-1 text-sm flex-1">
            @foreach($nav as $item)
                @php $active = request()->routeIs(str_replace('.index', '.*', $item['route'])) || request()->routeIs($item['route']); @endphp
                <a href="{{ route($item['route']) }}"
                   class="flex items-center gap-3 rounded-lg px-3 py-2 transition {{ $active ? 'bg-brand-600 text-white' : 'hover:bg-white/5' }}">
                    <span>{{ $item['icon'] }}</span> {{ $item['label'] }}
                </a>
            @endforeach
        </nav>
        <a href="{{ route('landing') }}" target="_blank" class="text-xs text-slate-500 hover:text-white px-3 py-2">↗ Lihat situs</a>
    </aside>

    <div class="flex-1 flex flex-col min-w-0">
        <header class="flex items-center justify-between border-b border-white/5 px-6 h-16">
            <h1 class="text-lg font-semibold text-white">{{ $title }}</h1>
            <div class="flex items-center gap-4 text-sm">
                <span class="text-slate-400 hidden sm:inline">{{ auth()->user()?->name }}</span>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button class="rounded-full border border-white/15 px-4 py-1.5 hover:bg-white/5 transition">Logout</button>
                </form>
            </div>
        </header>

        <main class="p-6 flex-1">
            @if(session('status'))
                <div class="mb-6 rounded-lg border border-emerald-500/30 bg-emerald-500/10 px-4 py-3 text-sm text-emerald-300">
                    {{ session('status') }}
                </div>
            @endif

            {{ $slot }}
        </main>
    </div>
</body>
</html>
