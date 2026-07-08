<x-layouts.admin title="Add Service">
    <form method="POST" action="{{ route('admin.services.store') }}" class="max-w-2xl">
        @csrf
        @include('admin.services._form')
    </form>
</x-layouts.admin>
