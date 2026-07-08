@props(['title' => 'Admin'])

<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }} · Admin</title>
    @fonts
    <script src="https://kit.fontawesome.com/5b0b01a2f2.js" crossorigin="anonymous"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-background text-text antialiased font-sans min-h-screen flex">
    @php
        $nav = [
            ['route' => 'admin.dashboard', 'label' => 'Dashboard', 'icon' => 'fa-solid fa-house'],
            ['route' => 'admin.services.index', 'label' => 'Services', 'icon' => 'fa-solid fa-puzzle-piece'],
            ['route' => 'admin.projects.index', 'label' => 'Portfolio', 'icon' => 'fa-solid fa-folder'],
            ['route' => 'admin.testimonials.index', 'label' => 'Testimonials', 'icon' => 'fa-solid fa-comment-dots'],
            ['route' => 'admin.settings.edit', 'label' => 'Hero & CTA', 'icon' => 'fa-solid fa-gear'],
        ];
    @endphp

    <aside class="hidden md:flex w-64 shrink-0 flex-col border-r border-primary/10 bg-surface-0 p-4">
        <a href="{{ route('admin.dashboard') }}" class="font-bold text-primary text-lg px-2 py-3">{{ config('app.name') }}</a>
        <nav class="mt-4 space-y-1 text-sm flex-1">
            @foreach($nav as $item)
                @php $active = request()->routeIs(str_replace('.index', '.*', $item['route'])) || request()->routeIs($item['route']); @endphp
                <a href="{{ route($item['route']) }}"
                   class="flex items-center gap-3 rounded-lg px-3 py-2 transition {{ $active ? 'bg-primary text-white' : 'text-ink-700 hover:bg-secondary-50 hover:text-primary' }}">
                    <span class="w-5 text-center"><i class="{{ $item['icon'] }}"></i></span> {{ $item['label'] }}
                </a>
            @endforeach
        </nav>
        <a href="{{ route('landing') }}" target="_blank" class="text-xs text-ink-500 hover:text-primary px-3 py-2"><i class="fa-solid fa-arrow-up-right-from-square"></i> View site</a>
    </aside>

    <div class="flex-1 flex flex-col min-w-0">
        <header class="flex items-center justify-between border-b border-primary/10 bg-background/80 px-6 h-16 backdrop-blur">
            <h1 class="text-lg font-semibold text-primary">{{ $title }}</h1>
            <div class="flex items-center gap-4 text-sm">
                <a href="{{ route('profile.edit') }}" class="text-ink-600 hover:text-primary hidden sm:inline">{{ auth()->user()?->name }}</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="rounded-full border border-primary/15 px-4 py-1.5 text-primary hover:bg-primary hover:text-white transition">Logout</button>
                </form>
            </div>
        </header>

        <main class="p-6 flex-1">
            @if(session('status'))
                <div class="mb-6 rounded-lg border border-secondary/30 bg-secondary-50 px-4 py-3 text-sm text-secondary-800">
                    {{ session('status') }}
                </div>
            @endif

            {{ $slot }}
        </main>
    </div>
</body>
</html>
