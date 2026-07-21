<div class="space-y-5 rounded-2xl border border-primary/10 bg-surface-0 p-6 shadow-sm">
    <x-admin.input name="title" label="Title" :value="$project->title" required />
    <x-admin.tag-input name="categories" label="Categories" :value="$project->categories ?? []" help="Type a category and press Enter or comma to add it. Example: SaaS Platform, AI Product" />
    <x-admin.input name="slug" label="Slug" :value="$project->slug" help="Leave empty to generate it automatically from the title." />
    <x-admin.input name="summary" label="Summary" type="textarea" :value="$project->summary" required />

    <div>
        <x-admin.input name="thumbnail" label="Thumbnail" type="file" help="JPG/PNG, max 4MB. Leave empty to keep the current image." />
        @if($project->thumbnail)
            <img src="{{ asset($project->thumbnail) }}" alt="" class="mt-3 h-24 rounded-lg object-cover">
        @endif
    </div>

    <div class="grid grid-cols-2 gap-4">
        <x-admin.input name="sort_order" label="Order" type="number" :value="$project->sort_order ?? 0" />
        <div class="flex flex-col justify-end gap-2 pb-1 text-sm">
            <label class="flex items-center gap-2">
                <input type="hidden" name="is_flagship" value="0">
                <input type="checkbox" name="is_flagship" value="1" @checked(old('is_flagship', $project->is_flagship ?? false)) class="rounded border-primary/20 bg-surface-0 text-accent focus:ring-accent">
                Mark as flagship
            </label>
            <label class="flex items-center gap-2">
                <input type="hidden" name="is_active" value="0">
                <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $project->is_active ?? true)) class="rounded border-primary/20 bg-surface-0 text-accent focus:ring-accent">
                Active
            </label>
        </div>
    </div>

    <div class="flex items-center gap-3 pt-2">
        <button type="submit" class="rounded-full bg-accent px-5 py-2 text-sm font-semibold text-white hover:bg-accent-600 transition">Save</button>
        <a href="{{ route('admin.projects.index') }}" class="text-sm text-ink-600 hover:text-primary">Cancel</a>
    </div>
</div>
