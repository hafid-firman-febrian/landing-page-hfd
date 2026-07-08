<div class="space-y-5 rounded-2xl border border-white/10 bg-ink-800 p-6">
    <x-admin.input name="name" label="Nama" :value="$testimonial->name" required />
    <x-admin.input name="role" label="Peran / Jabatan" :value="$testimonial->role" help="Contoh: Founder, Kirana" />
    <x-admin.input name="quote" label="Kutipan" type="textarea" :value="$testimonial->quote" required />

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label for="rating" class="block text-sm mb-1.5">Rating <span class="text-rose-400">*</span></label>
            <select id="rating" name="rating" class="w-full rounded-lg border border-white/10 bg-ink-900 px-3 py-2 text-white focus:border-brand-500 focus:outline-none">
                @for($i = 5; $i >= 1; $i--)
                    <option value="{{ $i }}" @selected(old('rating', $testimonial->rating ?? 5) == $i)>{{ $i }} ★</option>
                @endfor
            </select>
            @error('rating')<p class="mt-1 text-xs text-rose-400">{{ $message }}</p>@enderror
        </div>
        <x-admin.input name="sort_order" label="Urutan" type="number" :value="$testimonial->sort_order ?? 0" />
    </div>

    <x-admin.input name="source_url" label="URL Sumber" type="url" :value="$testimonial->source_url" help="Opsional, mis. tautan review Upwork." />

    <div>
        <x-admin.input name="avatar" label="Avatar" type="file" help="Opsional. JPG/PNG, maks 4MB." />
        @if($testimonial->avatar)
            <img src="{{ asset($testimonial->avatar) }}" alt="" class="mt-3 h-16 w-16 rounded-full object-cover">
        @endif
    </div>

    <label class="flex items-center gap-2 text-sm">
        <input type="hidden" name="is_active" value="0">
        <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $testimonial->is_active ?? true)) class="rounded border-white/20 bg-ink-900">
        Aktif (tampil di landing)
    </label>

    <div class="flex items-center gap-3 pt-2">
        <button type="submit" class="rounded-full bg-brand-600 px-5 py-2 text-sm font-semibold text-white hover:bg-brand-700 transition">Simpan</button>
        <a href="{{ route('admin.testimonials.index') }}" class="text-sm text-slate-400 hover:text-white">Batal</a>
    </div>
</div>
