<div class="space-y-5 rounded-2xl border border-primary/10 bg-surface-0 p-6 shadow-sm">
    <x-admin.input name="title" label="Title" :value="$service->title" required />
    <x-admin.input name="icon" label="Icon (emoji)" :value="$service->icon" help="Example: 🚀 🤖 🛠️" />
    <x-admin.input name="slug" label="Slug" :value="$service->slug" help="Leave empty to generate it automatically from the title." />
    <x-admin.input name="description" label="Description" type="textarea" :value="$service->description" required />

    <div class="grid grid-cols-2 gap-4">
        <x-admin.input name="sort_order" label="Order" type="number" :value="$service->sort_order ?? 0" />
        <label class="flex items-end gap-2 pb-2 text-sm">
            <input type="hidden" name="is_active" value="0">
            <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $service->is_active ?? true)) class="rounded border-primary/20 bg-surface-0 text-accent focus:ring-accent">
            Active (show on landing page)
        </label>
    </div>

    <div class="flex items-center gap-3 pt-2">
        <button type="submit" class="rounded-full bg-accent px-5 py-2 text-sm font-semibold text-white hover:bg-accent-600 transition">Save</button>
        <a href="{{ route('admin.services.index') }}" class="text-sm text-ink-600 hover:text-primary">Cancel</a>
    </div>
</div>
