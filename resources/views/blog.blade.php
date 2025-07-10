<x-layout>
    <x-slot:title>Blog</x-slot:title>

    <div class="container py-5">
        <h1 class="text-center mb-5">Blog</h1>

        <div class="row g-4">
            @foreach($posts as $post)
            <div class="col-md-4">
                <a href="{{ route('blog.show', $post->slug) }}" class="text-decoration-none blog-card-link">
                    <div class="card h-100 shadow-sm position-relative blog-card-hover" style="cursor:pointer;">
                        <img src="{{ asset($post->image) }}" class="card-img-top" alt="{{ $post->title }}" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            @if($post->category)
                                <span class="blog-category-label mb-2">{{ $post->category }}</span>
                            @endif
                            <h5 class="card-title text-dark">{{ $post->title }}</h5>
                            <p class="card-text text-dark">{{ $post->short_description }}</p>
                            <span class="blog-readmore stretched-link">Leer más <i class="bi bi-arrow-right"></i></span>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .blog-card-link {
            color: inherit;
        }
        .blog-card-hover:hover {
            box-shadow: 0 8px 24px rgba(155,107,158,0.15);
            border: 1.5px solid var(--morado);
            transition: box-shadow 0.2s, border 0.2s;
        }
        .blog-category-label {
            background: var(--morado);
            color: #fff;
            font-size: 0.95em;
            border-radius: 8px;
            padding: 0.25em 0.8em;
            font-weight: 500;
            display: inline-block;
        }
        .blog-readmore {
            color: var(--morado);
            font-weight: 600;
            font-size: 1em;
            text-decoration: underline;
            cursor: pointer;
        }
        .blog-card-link:hover .blog-readmore {
            color: var(--dorado);
            text-decoration: underline;
        }
        .blog-card-link:hover .card-title,
        .blog-card-link:hover .card-text {
            color: var(--morado);
        }
    </style>
</x-layout>
