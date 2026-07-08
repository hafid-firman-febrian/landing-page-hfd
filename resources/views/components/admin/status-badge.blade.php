@props(['active' => false])

@if($active)
    <span class="inline-flex items-center gap-1 rounded-full bg-emerald-500/15 px-2.5 py-0.5 text-xs text-emerald-300">Aktif</span>
@else
    <span class="inline-flex items-center gap-1 rounded-full bg-slate-500/15 px-2.5 py-0.5 text-xs text-slate-400">Nonaktif</span>
@endif
