<section>
    <header>
        <h2 class="text-lg font-semibold text-primary">Update Password</h2>
        <p class="mt-1 text-sm text-ink-600">Use a long, random password to keep your account secure.</p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-5">
        @csrf
        @method('put')

        <div>
            <label for="update_password_current_password" class="block text-sm mb-1.5">Current Password</label>
            <input id="update_password_current_password" name="current_password" type="password" autocomplete="current-password"
                   class="w-full rounded-lg border border-primary/15 bg-surface-0 px-3 py-2 text-primary focus:border-secondary focus:outline-none focus:ring-2 focus:ring-secondary/20">
            @error('current_password', 'updatePassword')<p class="mt-1 text-xs text-rose-400">{{ $message }}</p>@enderror
        </div>

        <div>
            <label for="update_password_password" class="block text-sm mb-1.5">New Password</label>
            <input id="update_password_password" name="password" type="password" autocomplete="new-password"
                   class="w-full rounded-lg border border-primary/15 bg-surface-0 px-3 py-2 text-primary focus:border-secondary focus:outline-none focus:ring-2 focus:ring-secondary/20">
            @error('password', 'updatePassword')<p class="mt-1 text-xs text-rose-400">{{ $message }}</p>@enderror
        </div>

        <div>
            <label for="update_password_password_confirmation" class="block text-sm mb-1.5">Confirm Password</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" autocomplete="new-password"
                   class="w-full rounded-lg border border-primary/15 bg-surface-0 px-3 py-2 text-primary focus:border-secondary focus:outline-none focus:ring-2 focus:ring-secondary/20">
            @error('password_confirmation', 'updatePassword')<p class="mt-1 text-xs text-rose-400">{{ $message }}</p>@enderror
        </div>

        <div class="pt-1">
            <button type="submit" class="rounded-full bg-accent px-5 py-2 text-sm font-semibold text-white hover:bg-accent-600 transition">Save</button>
        </div>
    </form>
</section>
