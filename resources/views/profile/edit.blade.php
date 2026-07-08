<x-layouts.admin title="Profile">
    <div class="max-w-2xl space-y-6">
        <div class="rounded-2xl border border-primary/10 bg-surface-0 p-6 shadow-sm">
            @include('profile.partials.update-profile-information-form')
        </div>

        <div class="rounded-2xl border border-primary/10 bg-surface-0 p-6 shadow-sm">
            @include('profile.partials.update-password-form')
        </div>
    </div>
</x-layouts.admin>
