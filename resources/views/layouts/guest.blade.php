<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        @fonts
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-background text-text antialiased font-sans min-h-screen">
        <div class="min-h-screen flex flex-col justify-center items-center px-4 py-10">
            <a href="{{ route('landing') }}" class="text-2xl font-bold text-primary tracking-tight">
                {{ config('app.name') }}
            </a>

            <div class="w-full sm:max-w-md mt-8 rounded-2xl border border-primary/10 bg-surface-0 p-6 sm:p-8 shadow-xl shadow-primary/10">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
