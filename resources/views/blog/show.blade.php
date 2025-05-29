<x-layout>
    <x-slot:title>{{ $post->title }}</x-slot:title>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('blog.index') }}">Blog</a></li>
                        <li class="breadcrumb-item active">{{ $post->title }}</li>
                    </ol>
                </nav>

                <article>
                    <h1 class="mb-4">{{ $post->title }}</h1>

                    <img src="{{ asset($post->image) }}" class="img-fluid rounded mb-4" alt="{{ $post->title }}">

                    <div class="mb-4">
                        <span class="badge bg-primary">{{ $post->category }}</span>
                        <span class="text-muted ms-2">{{ $post->published_at->format('d/m/Y') }}</span>
                    </div>

                    <div class="content">
                        {{ $post->content }}
                    </div>
                </article>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</x-layout>
