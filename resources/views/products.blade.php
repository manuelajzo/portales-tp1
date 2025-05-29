<x-layout>
    <x-slot:title>Nuestros productos</x-slot:title>
    <h1>Conocé nuestros productos</h1>
    <div class="products-container" style="display:flex; flex-wrap:wrap; gap: 20px;">
        @foreach ($products as $product)
            <div class="card" style="width: 18rem; border: 1px solid #ccc; padding: 10px;">
                @if($product->image)
                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" style="width: 100%; max-width: 300px;">
                @endif
                <div class="card-body">
                    <h2 class="card-title">{{ $product->name }}</h2>
                    <p class="card-text">{{ $product->description }}</p>
                    <p><strong>${{ number_format($product->price, 2) }}</strong></p>
                </div>
            </div>
        @endforeach
    </div>
</x-layout>
