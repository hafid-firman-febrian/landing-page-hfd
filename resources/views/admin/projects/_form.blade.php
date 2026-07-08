<div class="space-y-5 rounded-2xl border border-white/10 bg-ink-800 p-6">
    <x-admin.input name="title" label="Judul" :value="$project->title" required />
    <x-admin.input name="category" label="Kategori" :value="$project->category" help="Contoh: SaaS Platform, AI Product" />
    <x-admin.input name="slug" label="Slug" :value="$project->slug" help="Kosongkan untuk dibuat otomatis dari judul." />
    <x-admin.input name="summary" label="Ringkasan" type="textarea" :value="$project->summary" required />

    <div>
        <x-admin.input name="thumbnail" label="Thumbnail" type="file" help="JPG/PNG, maks 4MB. Kosongkan untuk mempertahankan gambar lama." />
        @if($project->thumbnail)
            <img src="{{ asset($project->thumbnail) }}" alt="" class="mt-3 h-24 rounded-lg object-cover">
        @endif
    </div>

    <div class="grid grid-cols-2 gap-4">
        <x-admin.input name="sort_order" label="Urutan" type="number" :value="$project->sort_order ?? 0" />
        <div class="flex flex-col justify-end gap-2 pb-1 text-sm">
            <label class="flex items-center gap-2">
                <input type="hidden" name="is_flagship" value="0">
                <input type="checkbox" name="is_flagship" value="1" @checked(old('is_flagship', $project->is_flagship ?? false)) class="rounded border-white/20 bg-ink-900">
                Jadikan Flagship
            </label>
            <label class="flex items-center gap-2">
                <input type="hidden" name="is_active" value="0">
                <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $project->is_active ?? true)) class="rounded border-white/20 bg-ink-900">
                Aktif
            </label>
        </div>
    </div>

    <div class="flex items-center gap-3 pt-2">
        <button type="submit" class="rounded-full bg-brand-600 px-5 py-2 text-sm font-semibold text-white hover:bg-brand-700 transition">Simpan</button>
        <a href="{{ route('admin.projects.index') }}" class="text-sm text-slate-400 hover:text-white">Batal</a>
    </div>
</div>
