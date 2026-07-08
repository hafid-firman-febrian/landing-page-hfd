<div class="space-y-5 rounded-2xl border border-primary/10 bg-surface-0 p-6 shadow-sm">
    <x-admin.input name="name" label="Name" :value="$testimonial->name" required />
    <x-admin.input name="role" label="Role / Title" :value="$testimonial->role" help="Example: Founder, Kirana" />
    <x-admin.input name="quote" label="Quote" type="textarea" :value="$testimonial->quote" required />

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label for="rating" class="block text-sm mb-1.5">Rating <span class="text-accent">*</span></label>
            <select id="rating" name="rating" class="w-full rounded-lg border border-primary/15 bg-surface-0 px-3 py-2 text-primary focus:border-secondary focus:outline-none focus:ring-2 focus:ring-secondary/20">
                @for($i = 5; $i >= 1; $i--)
                    <option value="{{ $i }}" @selected(old('rating', $testimonial->rating ?? 5) == $i)>{{ $i }} ★</option>
                @endfor
            </select>
            @error('rating')<p class="mt-1 text-xs text-rose-400">{{ $message }}</p>@enderror
        </div>
        <x-admin.input name="sort_order" label="Order" type="number" :value="$testimonial->sort_order ?? 0" />
    </div>

    <x-admin.input name="source_url" label="Source URL" type="url" :value="$testimonial->source_url" help="Optional, for example an Upwork review link." />

    <div>
        <x-admin.input name="avatar" label="Avatar" type="file" help="Optional. JPG/PNG, max 4MB." />
        @if($testimonial->avatar)
            <img src="{{ asset($testimonial->avatar) }}" alt="" class="mt-3 h-16 w-16 rounded-full object-cover">
        @endif
    </div>

    <label class="flex items-center gap-2 text-sm">
        <input type="hidden" name="is_active" value="0">
        <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $testimonial->is_active ?? true)) class="rounded border-primary/20 bg-surface-0 text-accent focus:ring-accent">
        Active (show on landing page)
    </label>

    <div class="flex items-center gap-3 pt-2">
        <button type="submit" class="rounded-full bg-accent px-5 py-2 text-sm font-semibold text-white hover:bg-accent-600 transition">Save</button>
        <a href="{{ route('admin.testimonials.index') }}" class="text-sm text-ink-600 hover:text-primary">Cancel</a>
    </div>
</div>
