<x-layout>
    <x-slot:title>Nuestros productos</x-slot:title>
    <section aria-labelledby="productos-titulo">
        <h1 id="productos-titulo">Conocé nuestros productos</h1>
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        <div class="products-container" style="display:flex; flex-wrap:wrap; gap: 20px;">
            @foreach ($products as $product)
                <article class="card" style="width: 18rem; border: 1px solid #ccc; padding: 10px;">
                    @if($product->image)
                        <figure>
                            <img src="{{ asset($product->image) }}" alt="Imagen de {{ $product->name }}" style="width: 100%; max-width: 300px;" aria-label="Imagen del producto {{ $product->name }}">
                            <figcaption class="visually-hidden">{{ $product->name }}</figcaption>
                        </figure>
                    @endif
                    <div class="card-body">
                        <h2 class="card-title">{{ $product->name }}</h2>
                        <p class="card-text">{{ $product->description }}</p>
                        <p><strong>${{ number_format($product->price, 2) }}</strong></p>
                        @auth
                            @php
                                $orden = Auth::user()->orders->where('product_id', $product->id)->first();
                            @endphp
                            @if($orden)
                                <form action="{{ route('user.orders.cancel', $orden) }}" method="POST" onsubmit="return confirm('¿Estás seguro que deseas cancelar este servicio? Esta acción no se puede deshacer.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger w-100 mt-2" aria-label="Cancelar servicio {{ $product->name }}">Cancelar servicio</button>
                                </form>
                            @else
                                <form action="{{ route('user.orders.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <button type="submit" class="btn btn-primary w-100 mt-2" aria-label="Contratar servicio {{ $product->name }}">Contratar Servicio</button>
                                </form>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary w-100 mt-2">
                                Iniciar Sesión para Contratar
                            </a>
                        @endauth
                    </div>
                </article>
            @endforeach
        </div>
    </section>
</x-layout>
