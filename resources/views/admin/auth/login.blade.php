<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login · Admin</title>
    @fonts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-ink-900 text-slate-300 antialiased font-sans min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-sm">
        <h1 class="text-2xl font-bold text-white text-center mb-1">{{ config('app.name') }}</h1>
        <p class="text-center text-slate-500 text-sm mb-8">Masuk ke panel admin</p>

        <form method="POST" action="{{ route('admin.login') }}" class="rounded-2xl border border-white/10 bg-ink-800 p-6 space-y-5">
            @csrf

            @if($errors->any())
                <div class="rounded-lg border border-rose-500/30 bg-rose-500/10 px-4 py-3 text-sm text-rose-300">
                    {{ $errors->first() }}
                </div>
            @endif

            <div>
                <label for="email" class="block text-sm mb-1.5">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus
                       class="w-full rounded-lg border border-white/10 bg-ink-900 px-3 py-2 text-white focus:border-brand-500 focus:outline-none">
            </div>

            <div>
                <label for="password" class="block text-sm mb-1.5">Password</label>
                <input id="password" name="password" type="password" required
                       class="w-full rounded-lg border border-white/10 bg-ink-900 px-3 py-2 text-white focus:border-brand-500 focus:outline-none">
            </div>

            <label class="flex items-center gap-2 text-sm text-slate-400">
                <input type="checkbox" name="remember" class="rounded border-white/20 bg-ink-900"> Ingat saya
            </label>

            <button type="submit" class="w-full rounded-full bg-brand-600 px-4 py-2.5 font-semibold text-white hover:bg-brand-700 transition">
                Masuk
            </button>
        </form>
    </div>
</body>
</html>
