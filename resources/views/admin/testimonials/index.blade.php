<x-layouts.admin title="Testimonials">
    <div class="flex items-center justify-between mb-6">
        <p class="text-sm text-ink-600">{{ $testimonials->count() }} testimonials</p>
        <a href="{{ route('admin.testimonials.create') }}" class="rounded-full bg-accent px-4 py-2 text-sm font-semibold text-white hover:bg-accent-600 transition">+ Add</a>
    </div>

    <div class="overflow-x-auto rounded-2xl border border-primary/10 bg-surface-0 shadow-sm">
        <table class="w-full text-sm">
            <thead class="bg-primary text-left text-white">
                <tr>
                    <th class="px-4 py-3 font-medium">#</th>
                    <th class="px-4 py-3 font-medium">Name</th>
                    <th class="px-4 py-3 font-medium">Rating</th>
                    <th class="px-4 py-3 font-medium">Quote</th>
                    <th class="px-4 py-3 font-medium">Status</th>
                    <th class="px-4 py-3 font-medium text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-primary/10">
                @forelse($testimonials as $testimonial)
                    <tr class="hover:bg-secondary-50">
                        <td class="px-4 py-3 text-ink-500">{{ $testimonial->sort_order }}</td>
                        <td class="px-4 py-3 text-primary">
                            {{ $testimonial->name }}
                            @if($testimonial->role)<div class="text-xs text-ink-500">{{ $testimonial->role }}</div>@endif
                        </td>
                        <td class="px-4 py-3 text-accent">
                            @for($s = 1; $s <= 5; $s++)<i class="fa-star {{ $s <= $testimonial->rating ? 'fa-solid' : 'fa-regular' }}"></i>@endfor
                        </td>
                        <td class="px-4 py-3 text-ink-600 max-w-xs truncate">{{ $testimonial->quote }}</td>
                        <td class="px-4 py-3"><x-admin.status-badge :active="$testimonial->is_active" /></td>
                        <td class="px-4 py-3 text-right whitespace-nowrap">
                            <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="text-accent hover:text-accent-700">Edit</a>
                            <form method="POST" action="{{ route('admin.testimonials.destroy', $testimonial) }}" class="inline" onsubmit="return confirm('Delete this testimonial?')">
                                @csrf @method('DELETE')
                                <button class="ml-3 text-rose-400 hover:text-rose-300">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="px-4 py-8 text-center text-ink-500">No testimonials yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layouts.admin>
