<x-layouts.admin title="Edit Testimoni">
    <form method="POST" action="{{ route('admin.testimonials.update', $testimonial) }}" enctype="multipart/form-data" class="max-w-2xl">
        @csrf @method('PUT')
        @include('admin.testimonials._form')
    </form>
</x-layouts.admin>
