<x-layouts.admin title="Edit Project">
    <form method="POST" action="{{ route('admin.projects.update', $project) }}" enctype="multipart/form-data" class="max-w-2xl">
        @csrf @method('PUT')
        @include('admin.projects._form')
    </form>
</x-layouts.admin>
