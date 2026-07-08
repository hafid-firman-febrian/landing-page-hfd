<x-layouts.admin title="Tambah Proyek">
    <form method="POST" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data" class="max-w-2xl">
        @csrf
        @include('admin.projects._form')
    </form>
</x-layouts.admin>
