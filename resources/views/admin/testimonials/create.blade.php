<x-layouts.admin title="Add Testimonial">
    <form method="POST" action="{{ route('admin.testimonials.store') }}" enctype="multipart/form-data" class="max-w-2xl">
        @csrf
        @include('admin.testimonials._form')
    </form>
</x-layouts.admin>
