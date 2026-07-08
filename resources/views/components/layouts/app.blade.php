@props(['title' => null])

<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? config('app.name') }}</title>
    @fonts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://kit.fontawesome.com/5b0b01a2f2.js" crossorigin="anonymous"></script>
</head>

<body class="bg-background text-text antialiased font-sans">
    <x-navbar />
    <main>
        {{ $slot }}
    </main>
    <x-footer />
</body>

</html>
