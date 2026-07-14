@props(['nav'])

<a href="{{ route('admin.dashboard') }}" class="font-bold text-primary text-lg px-2 py-3">{{ config('app.name') }}</a>
<nav class="mt-4 space-y-1 text-sm flex-1">
    @foreach($nav as $item)
        @php $active = request()->routeIs(str_replace('.index', '.*', $item['route'])) || request()->routeIs($item['route']); @endphp
        <a href="{{ route($item['route']) }}"
           {{ $attributes }}
           class="flex items-center gap-3 rounded-lg px-3 py-2 transition {{ $active ? 'bg-primary text-white' : 'text-ink-700 hover:bg-secondary-50 hover:text-primary' }}">
            <span class="w-5 text-center"><i class="{{ $item['icon'] }}"></i></span> {{ $item['label'] }}
        </a>
    @endforeach
</nav>
<a href="{{ route('landing') }}" target="_blank" class="text-xs text-ink-500 hover:text-primary px-3 py-2"><i class="fa-solid fa-arrow-up-right-from-square"></i> View site</a>
