<x-layouts.admin title="Layanan">
    <div class="flex items-center justify-between mb-6">
        <p class="text-sm text-slate-400">{{ $services->count() }} layanan</p>
        <a href="{{ route('admin.services.create') }}" class="rounded-full bg-brand-600 px-4 py-2 text-sm font-semibold text-white hover:bg-brand-700 transition">+ Tambah</a>
    </div>

    <div class="overflow-x-auto rounded-2xl border border-white/10">
        <table class="w-full text-sm">
            <thead class="bg-ink-800 text-left text-slate-400">
                <tr>
                    <th class="px-4 py-3 font-medium">#</th>
                    <th class="px-4 py-3 font-medium">Ikon</th>
                    <th class="px-4 py-3 font-medium">Judul</th>
                    <th class="px-4 py-3 font-medium">Status</th>
                    <th class="px-4 py-3 font-medium text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                @forelse($services as $service)
                    <tr class="hover:bg-white/5">
                        <td class="px-4 py-3 text-slate-500">{{ $service->sort_order }}</td>
                        <td class="px-4 py-3 text-xl">{{ $service->icon }}</td>
                        <td class="px-4 py-3 text-white">{{ $service->title }}</td>
                        <td class="px-4 py-3">
                            <x-admin.status-badge :active="$service->is_active" />
                        </td>
                        <td class="px-4 py-3 text-right whitespace-nowrap">
                            <a href="{{ route('admin.services.edit', $service) }}" class="text-brand-400 hover:text-brand-300">Edit</a>
                            <form method="POST" action="{{ route('admin.services.destroy', $service) }}" class="inline" onsubmit="return confirm('Hapus layanan ini?')">
                                @csrf @method('DELETE')
                                <button class="ml-3 text-rose-400 hover:text-rose-300">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="px-4 py-8 text-center text-slate-500">Belum ada layanan.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layouts.admin>
