<x-layouts.admin title="Services">
    <div class="flex items-center justify-between mb-6">
        <p class="text-sm text-ink-600">{{ $services->count() }} services</p>
        <a href="{{ route('admin.services.create') }}" class="rounded-full bg-accent px-4 py-2 text-sm font-semibold text-white hover:bg-accent-600 transition">+ Add</a>
    </div>

    <div class="overflow-x-auto rounded-2xl border border-primary/10 bg-surface-0 shadow-sm">
        <table class="w-full text-sm">
            <thead class="bg-primary text-left text-white">
                <tr>
                    <th class="px-4 py-3 font-medium">#</th>
                    <th class="px-4 py-3 font-medium">Icon</th>
                    <th class="px-4 py-3 font-medium">Title</th>
                    <th class="px-4 py-3 font-medium">Status</th>
                    <th class="px-4 py-3 font-medium text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-primary/10">
                @forelse($services as $service)
                    <tr class="hover:bg-secondary-50">
                        <td class="px-4 py-3 text-ink-500">{{ $service->sort_order }}</td>
                        <td class="px-4 py-3 text-xl text-secondary">@if($service->icon)<i class="{{ $service->icon }}"></i>@endif</td>
                        <td class="px-4 py-3 text-primary">{{ $service->title }}</td>
                        <td class="px-4 py-3">
                            <x-admin.status-badge :active="$service->is_active" />
                        </td>
                        <td class="px-4 py-3 text-right whitespace-nowrap">
                            <a href="{{ route('admin.services.edit', $service) }}" class="text-accent hover:text-accent-700">Edit</a>
                            <form method="POST" action="{{ route('admin.services.destroy', $service) }}" class="inline" onsubmit="return confirm('Delete this service?')">
                                @csrf @method('DELETE')
                                <button class="ml-3 text-rose-400 hover:text-rose-300">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="px-4 py-8 text-center text-ink-500">No services yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layouts.admin>
