<section>
    <header>
        <h2 class="text-lg font-semibold text-primary">Profile Information</h2>
        <p class="mt-1 text-sm text-ink-600">Update your account name and email address.</p>
    </header>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-5">
        @csrf
        @method('patch')

        <div>
            <label for="name" class="block text-sm mb-1.5">Name <span class="text-accent">*</span></label>
            <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name"
                   class="w-full rounded-lg border border-primary/15 bg-surface-0 px-3 py-2 text-primary focus:border-secondary focus:outline-none focus:ring-2 focus:ring-secondary/20">
            @error('name')<p class="mt-1 text-xs text-rose-400">{{ $message }}</p>@enderror
        </div>

        <div>
            <label for="email" class="block text-sm mb-1.5">Email <span class="text-accent">*</span></label>
            <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required autocomplete="username"
                   class="w-full rounded-lg border border-primary/15 bg-surface-0 px-3 py-2 text-primary focus:border-secondary focus:outline-none focus:ring-2 focus:ring-secondary/20">
            @error('email')<p class="mt-1 text-xs text-rose-400">{{ $message }}</p>@enderror
        </div>

        <div class="pt-1">
            <button type="submit" class="rounded-full bg-accent px-5 py-2 text-sm font-semibold text-white hover:bg-accent-600 transition">Save</button>
        </div>
    </form>
</section>
