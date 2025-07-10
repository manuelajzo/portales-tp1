<x-layout>
    <x-slot:title>Inicio - Magia Potagia</x-slot:title>

    <!-- Hero Section -->
    <div class="hero-section text-center py-5 mb-5">
        <h1 class="display-4 mb-3">✨ Bienvenidx a Magia Potagia ✨</h1>
        <p class="lead mb-4">Descubrí el poder de la espiritualidad y encontrá tu camino hacia el equilibrio interior</p>
        <div class="hero-buttons">
            <a href="{{ url('/products') }}" class="btn btn-primary btn-lg me-2">
                <i class="bi bi-gem"></i> Ver Productos
            </a>
            <a href="{{ url('/blog') }}" class="btn btn-outline-primary btn-lg">
                <i class="bi bi-journal-text"></i> Leer Blog
            </a>
        </div>
    </div>

    <!-- Servicios -->
    <section class="mb-5">
        <h2 class="tp-title">Nuestros Servicios</h2>
        <div class="row g-4">
            @foreach($services as $service)
                <div class="col-md-4">
                    <div class="tp-card h-100">
                        <img src="{{ asset($service['image']) }}" class="tp-card-img" alt="{{ $service['title'] }}">
                        <div class="card-body text-center">
                            <i class="bi {{ $service['icon'] }} service-icon mb-2"></i>
                            <div class="tp-card-title">{{ $service['title'] }}</div>
                            <div class="tp-card-text">{{ $service['description'] }}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Productos Destacados -->
    @if($featuredProducts->count() > 0)
        <section class="mb-5">
            <h2 class="tp-title">Productos Destacados</h2>
            <div class="row g-4">
                @foreach($featuredProducts as $product)
                    <div class="col-md-4">
                        <div class="tp-card h-100">
                            <img src="{{ asset($product->image) }}" class="tp-card-img" alt="{{ $product->name }}">
                            <div class="card-body">
                                <div class="tp-card-title">{{ $product->name }}</div>
                                <div class="tp-card-text">{{ $product->description }}</div>
                                <div class="mt-2"><strong>${{ $product->price }}</strong></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center mt-4">
                <a href="{{ url('/products') }}" class="tp-link">
                    Ver todos los productos <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </section>
    @endif

    <!-- Blog Posts Recientes -->
    @if($latestPosts->count() > 0)
        <section class="mb-5">
            <h2 class="text-center mb-4">Últimas Publicaciones</h2>
            <div class="row g-4">
                @foreach($latestPosts as $post)
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
            <div class="text-center mt-4">
                <a href="{{ route('blog.index') }}" class="btn btn-outline-primary">
                    Ver todas las publicaciones <i class="bi bi-arrow-right"></i>
                </a>
            </div>
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
        </section>
    @endif

</x-layout>
