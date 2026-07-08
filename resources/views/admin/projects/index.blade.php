<x-layouts.admin title="Portfolio">
    <div class="flex items-center justify-between mb-6">
        <p class="text-sm text-ink-600">{{ $projects->count() }} projects</p>
        <a href="{{ route('admin.projects.create') }}" class="rounded-full bg-accent px-4 py-2 text-sm font-semibold text-white hover:bg-accent-600 transition">+ Add</a>
    </div>

    <div class="overflow-x-auto rounded-2xl border border-primary/10 bg-surface-0 shadow-sm">
        <table class="w-full text-sm">
            <thead class="bg-primary text-left text-white">
                <tr>
                    <th class="px-4 py-3 font-medium">#</th>
                    <th class="px-4 py-3 font-medium">Thumbnail</th>
                    <th class="px-4 py-3 font-medium">Title</th>
                    <th class="px-4 py-3 font-medium">Category</th>
                    <th class="px-4 py-3 font-medium">Status</th>
                    <th class="px-4 py-3 font-medium text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-primary/10">
                @forelse($projects as $project)
                    <tr class="hover:bg-secondary-50">
                        <td class="px-4 py-3 text-ink-500">{{ $project->sort_order }}</td>
                        <td class="px-4 py-3">
                            @if($project->thumbnail)
                                <img src="{{ asset($project->thumbnail) }}" alt="" class="h-10 w-16 rounded object-cover">
                            @else
                                <span class="text-ink-400">—</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-primary">
                            {{ $project->title }}
                            @if($project->is_flagship)
                                <span class="ml-1 rounded-full bg-accent-50 px-2 py-0.5 text-xs text-accent-700">Flagship</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-ink-600">{{ $project->category }}</td>
                        <td class="px-4 py-3"><x-admin.status-badge :active="$project->is_active" /></td>
                        <td class="px-4 py-3 text-right whitespace-nowrap">
                            <a href="{{ route('admin.projects.edit', $project) }}" class="text-accent hover:text-accent-700">Edit</a>
                            <form method="POST" action="{{ route('admin.projects.destroy', $project) }}" class="inline" onsubmit="return confirm('Delete this project?')">
                                @csrf @method('DELETE')
                                <button class="ml-3 text-rose-400 hover:text-rose-300">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="px-4 py-8 text-center text-ink-500">No projects yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layouts.admin>
