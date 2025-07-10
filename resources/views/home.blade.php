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
        <h2 class="text-center mb-4">Nuestros Servicios</h2>
        <div class="row g-4">
            @foreach($services as $service)
                <div class="col-md-4">
                    <div class="card h-100 service-card">
                        <img src="{{ asset($service['image']) }}" class="card-img-top" alt="Imagen de {{ $service['title'] }}" aria-label="Imagen representativa de {{ $service['title'] }}">
                        <div class="card-body text-center">
                            <i class="bi {{ $service['icon'] }} service-icon"></i>
                            <h3 class="card-title h4">{{ $service['title'] }}</h3>
                            <p class="card-text">{{ $service['description'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Productos Destacados -->
    @if($featuredProducts->count() > 0)
        <section class="mb-5">
            <h2 class="text-center mb-4">Productos Destacados</h2>
            <div class="row g-4">
                @foreach($featuredProducts as $product)
                    <div class="col-md-4">
                        <div class="card h-100 product-card">
                            <img src="{{ asset($product->image) }}" class="card-img-top" alt="Imagen de {{ $product->name }}" aria-label="Imagen del producto {{ $product->name }}">
                            <div class="card-body">
                                <h3 class="card-title h5">{{ $product->name }}</h3>
                                <p class="card-text">{{ $product->description }}</p>
                                <p class="card-text"><strong>${{ $product->price }}</strong></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center mt-4">
                <a href="{{ url('/products') }}" class="btn btn-outline-primary">
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
                        <div class="card h-100 blog-card">
                            <img src="{{ asset($post->image) }}" class="card-img-top" alt="Imagen de {{ $post->title }}" aria-label="Imagen del post {{ $post->title }}">
                            <div class="card-body">
                                <span class="badge bg-primary mb-2">{{ $post->category }}</span>
                                <h3 class="card-title h5">{{ $post->title }}</h3>
                                <p class="card-text">{{ $post->short_description }}</p>
                            </div>
                            <div class="card-footer bg-transparent border-0">
                                <a href="{{ route('blog.show', $post->slug) }}" class="btn btn-link text-primary p-0">
                                    Leer más <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('blog.index') }}" class="btn btn-outline-primary">
                    Ver todas las publicaciones <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </section>
    @endif

</x-layout>
