<x-layouts.admin title="Edit Layanan">
    <form method="POST" action="{{ route('admin.services.update', $service) }}" class="max-w-2xl">
        @csrf @method('PUT')
        @include('admin.services._form')
    </form>
</x-layouts.admin>
