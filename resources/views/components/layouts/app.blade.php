@props(['title' => null])

<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? config('app.name') }}</title>
    @fonts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-ink-900 text-slate-300 antialiased font-sans">
    <x-navbar />
    <main>
        {{ $slot }}
    </main>
    <x-footer />
</body>
</html>
