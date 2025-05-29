<x-layout>
<x-slot:title>Inicio</x-slot:title>
    <h1 class="mt-4">Bienvenidx a nuestro sitio esotérico ✨</h1>
    <h2>Conoce nuestros productos destacados:</h2>
    @if ($product)
        <div class="card mt-4" style="width: 18rem;">
            <img src="{{ asset($product->image) }}" class="card-img-top" alt="{{ $product->name }}">
            <div class="card-body">
                <h3 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">{{ $product->description }}</p>
                <p class="card-text"><strong>${{ $product->price }}</strong></p>
                <a href="{{ url('/products') }}" class="btn btn-primary">Ver todos los productos</a>
            </div>
        </div>
    @else
        <p>No hay productos disponibles todavía.</p>
    @endif
</x-layout>
