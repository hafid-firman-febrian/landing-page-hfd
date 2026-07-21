@props([
    'name',
    'label',
    'value' => [],
    'help' => null,
])

@php
    $tags = old($name, $value ?? []);
@endphp

<div x-data="{
        tags: {{ json_encode(array_values($tags)) }},
        draft: '',
        addFromDraft() {
            const value = this.draft.trim().replace(/,$/, '').trim();
            this.draft = '';
            if (!value) return;
            if (this.tags.some(tag => tag.toLowerCase() === value.toLowerCase())) return;
            this.tags.push(value);
        },
        removeAt(index) {
            this.tags.splice(index, 1);
        },
        removeLast() {
            if (this.tags.length) this.tags.pop();
        },
    }">
    <label for="{{ $name }}-input" class="block text-sm mb-1.5">{{ $label }}</label>

    <div class="flex flex-wrap items-center gap-2 w-full rounded-lg border border-primary/15 bg-surface-0 px-3 py-2 focus-within:border-secondary focus-within:ring-2 focus-within:ring-secondary/20">
        <template x-for="(tag, index) in tags" :key="index">
            <span class="inline-flex items-center gap-1.5 rounded-full border border-secondary/30 bg-secondary-50 px-3 py-1 text-xs text-secondary-800">
                <span x-text="tag"></span>
                <button type="button" @click="removeAt(index)" class="text-secondary-800/60 hover:text-secondary-800" aria-label="Remove category">&times;</button>
            </span>
        </template>

        <input
            id="{{ $name }}-input"
            type="text"
            x-model="draft"
            @keydown.enter.prevent="addFromDraft()"
            @keydown.comma.prevent="addFromDraft()"
            @keydown.backspace="draft === '' && removeLast()"
            @blur="addFromDraft()"
            placeholder="Type a category and press Enter"
            class="min-w-[10rem] flex-1 border-0 bg-transparent p-0 text-sm text-primary placeholder:text-ink-400 focus:outline-none focus:ring-0"
        >

        <template x-for="(tag, index) in tags" :key="'hidden-' + index">
            <input type="hidden" name="{{ $name }}[]" :value="tag">
        </template>
    </div>

    @if($help)<p class="mt-1 text-xs text-ink-500">{{ $help }}</p>@endif
    @error($name)<p class="mt-1 text-xs text-rose-400">{{ $message }}</p>@enderror
</div>
