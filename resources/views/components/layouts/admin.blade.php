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
        <x-admin.sidebar-nav :nav="$nav" />
    </aside>

    <div data-menu class="hidden fixed inset-0 z-50 md:hidden">
        <div data-menu-close class="absolute inset-0 bg-primary/40"></div>
        <aside class="relative z-10 flex h-full w-64 flex-col border-r border-primary/10 bg-surface-0 p-4">
            <button data-menu-close type="button" class="self-end text-ink-500 hover:text-primary mb-2" aria-label="Tutup menu">
                <i class="fa-solid fa-xmark text-xl"></i>
            </button>
            <x-admin.sidebar-nav :nav="$nav" />
        </aside>
    </div>

    <div class="flex-1 flex flex-col min-w-0">
        <header class="flex items-center justify-between border-b border-primary/10 bg-background/80 px-4 md:px-6 h-16 backdrop-blur">
            <div class="flex items-center gap-3">
                <button data-menu-toggle type="button" class="text-primary text-xl leading-none md:hidden" aria-label="Buka menu">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <h1 class="text-lg font-semibold text-primary">{{ $title }}</h1>
            </div>
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
