<x-layouts.admin title="Portofolio">
    <div class="flex items-center justify-between mb-6">
        <p class="text-sm text-slate-400">{{ $projects->count() }} proyek</p>
        <a href="{{ route('admin.projects.create') }}" class="rounded-full bg-brand-600 px-4 py-2 text-sm font-semibold text-white hover:bg-brand-700 transition">+ Tambah</a>
    </div>

    <div class="overflow-x-auto rounded-2xl border border-white/10">
        <table class="w-full text-sm">
            <thead class="bg-ink-800 text-left text-slate-400">
                <tr>
                    <th class="px-4 py-3 font-medium">#</th>
                    <th class="px-4 py-3 font-medium">Thumbnail</th>
                    <th class="px-4 py-3 font-medium">Judul</th>
                    <th class="px-4 py-3 font-medium">Kategori</th>
                    <th class="px-4 py-3 font-medium">Status</th>
                    <th class="px-4 py-3 font-medium text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                @forelse($projects as $project)
                    <tr class="hover:bg-white/5">
                        <td class="px-4 py-3 text-slate-500">{{ $project->sort_order }}</td>
                        <td class="px-4 py-3">
                            @if($project->thumbnail)
                                <img src="{{ asset($project->thumbnail) }}" alt="" class="h-10 w-16 rounded object-cover">
                            @else
                                <span class="text-slate-600">—</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-white">
                            {{ $project->title }}
                            @if($project->is_flagship)
                                <span class="ml-1 rounded-full bg-brand-500/15 px-2 py-0.5 text-xs text-brand-300">Flagship</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-slate-400">{{ $project->category }}</td>
                        <td class="px-4 py-3"><x-admin.status-badge :active="$project->is_active" /></td>
                        <td class="px-4 py-3 text-right whitespace-nowrap">
                            <a href="{{ route('admin.projects.edit', $project) }}" class="text-brand-400 hover:text-brand-300">Edit</a>
                            <form method="POST" action="{{ route('admin.projects.destroy', $project) }}" class="inline" onsubmit="return confirm('Hapus proyek ini?')">
                                @csrf @method('DELETE')
                                <button class="ml-3 text-rose-400 hover:text-rose-300">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="px-4 py-8 text-center text-slate-500">Belum ada proyek.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layouts.admin>
