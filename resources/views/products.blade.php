<x-layout>
    <x-slot:title>Nuestros productos</x-slot:title>
    <h1>Conocé nuestros productos</h1>
    <ul>
        @foreach ($products as $product)
            <div class="card" style="width: 18rem;">
                <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}">
                <div class="card-body">
                    <h2 class="card-title">{{ $product->name }}</h2>
                    <p class="card-text">{{ $product->description }}</p>
                    <p><strong>${{ $product->price }}</strong></p>
                </div>
            </div>
        @endforeach
    </ul>
</x-layout>
