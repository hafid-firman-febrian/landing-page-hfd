<div class="space-y-5 rounded-2xl border border-white/10 bg-ink-800 p-6">
    <x-admin.input name="title" label="Judul" :value="$service->title" required />
    <x-admin.input name="icon" label="Ikon (emoji)" :value="$service->icon" help="Contoh: 🚀 🤖 🛠️" />
    <x-admin.input name="slug" label="Slug" :value="$service->slug" help="Kosongkan untuk dibuat otomatis dari judul." />
    <x-admin.input name="description" label="Deskripsi" type="textarea" :value="$service->description" required />

    <div class="grid grid-cols-2 gap-4">
        <x-admin.input name="sort_order" label="Urutan" type="number" :value="$service->sort_order ?? 0" />
        <label class="flex items-end gap-2 pb-2 text-sm">
            <input type="hidden" name="is_active" value="0">
            <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $service->is_active ?? true)) class="rounded border-white/20 bg-ink-900">
            Aktif (tampil di landing)
        </label>
    </div>

    <div class="flex items-center gap-3 pt-2">
        <button type="submit" class="rounded-full bg-brand-600 px-5 py-2 text-sm font-semibold text-white hover:bg-brand-700 transition">Simpan</button>
        <a href="{{ route('admin.services.index') }}" class="text-sm text-slate-400 hover:text-white">Batal</a>
    </div>
</div>
