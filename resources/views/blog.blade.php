<x-layout>
    <x-slot:title>Blog</x-slot:title>

    <div class="container py-5">
        <h1 class="text-center mb-5">Blog</h1>

        <div class="row g-4">
            @foreach($posts as $post)
            <div class="col-md-4">
                <div class="card h-100">
                    <img src="{{ asset($post->image) }}" class="card-img-top" alt="Imagen de {{ $post->title }}" style="height: 200px; object-fit: cover;" aria-label="Imagen del post {{ $post->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ $post->short_description }}</p>
                        <a href="{{ route('blog.show', $post->slug) }}" class="btn btn-primary">Leer más</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</x-layout>
