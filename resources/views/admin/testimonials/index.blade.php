<x-layouts.admin title="Testimoni">
    <div class="flex items-center justify-between mb-6">
        <p class="text-sm text-slate-400">{{ $testimonials->count() }} testimoni</p>
        <a href="{{ route('admin.testimonials.create') }}" class="rounded-full bg-brand-600 px-4 py-2 text-sm font-semibold text-white hover:bg-brand-700 transition">+ Tambah</a>
    </div>

    <div class="overflow-x-auto rounded-2xl border border-white/10">
        <table class="w-full text-sm">
            <thead class="bg-ink-800 text-left text-slate-400">
                <tr>
                    <th class="px-4 py-3 font-medium">#</th>
                    <th class="px-4 py-3 font-medium">Nama</th>
                    <th class="px-4 py-3 font-medium">Rating</th>
                    <th class="px-4 py-3 font-medium">Kutipan</th>
                    <th class="px-4 py-3 font-medium">Status</th>
                    <th class="px-4 py-3 font-medium text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                @forelse($testimonials as $testimonial)
                    <tr class="hover:bg-white/5">
                        <td class="px-4 py-3 text-slate-500">{{ $testimonial->sort_order }}</td>
                        <td class="px-4 py-3 text-white">
                            {{ $testimonial->name }}
                            @if($testimonial->role)<div class="text-xs text-slate-500">{{ $testimonial->role }}</div>@endif
                        </td>
                        <td class="px-4 py-3 text-amber-400">{{ str_repeat('★', $testimonial->rating) }}</td>
                        <td class="px-4 py-3 text-slate-400 max-w-xs truncate">{{ $testimonial->quote }}</td>
                        <td class="px-4 py-3"><x-admin.status-badge :active="$testimonial->is_active" /></td>
                        <td class="px-4 py-3 text-right whitespace-nowrap">
                            <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="text-brand-400 hover:text-brand-300">Edit</a>
                            <form method="POST" action="{{ route('admin.testimonials.destroy', $testimonial) }}" class="inline" onsubmit="return confirm('Hapus testimoni ini?')">
                                @csrf @method('DELETE')
                                <button class="ml-3 text-rose-400 hover:text-rose-300">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="px-4 py-8 text-center text-slate-500">Belum ada testimoni.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layouts.admin>
