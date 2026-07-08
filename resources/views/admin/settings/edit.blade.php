<x-layouts.admin title="Hero & CTA">
    <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data" class="max-w-2xl">
        @csrf @method('PUT')

        <div class="space-y-5 rounded-2xl border border-primary/10 bg-surface-0 p-6 shadow-sm">
            @foreach($fields as $key => $label)
                @php $type = \Illuminate\Support\Str::endsWith($key, 'subtitle') ? 'textarea' : 'text'; @endphp
                <x-admin.input :name="$key" :label="$label" :type="$type" :value="$settings[$key] ?? ''" />
            @endforeach

            <div>
                <x-admin.input name="hero_image" label="Hero: Image" type="file" help="Optional. Leave empty to show the default illustration." />
                @if(!empty($settings['hero_image']))
                    <img src="{{ asset($settings['hero_image']) }}" alt="" class="mt-3 h-32 w-32 rounded-2xl object-cover">
                @endif
            </div>

            <div class="flex items-center gap-3 pt-2">
                <button type="submit" class="rounded-full bg-accent px-5 py-2 text-sm font-semibold text-white hover:bg-accent-600 transition">Save</button>
                <a href="{{ route('landing') }}" target="_blank" class="text-sm text-ink-600 hover:text-primary">View landing <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
            </div>
        </div>
    </form>
</x-layouts.admin>
