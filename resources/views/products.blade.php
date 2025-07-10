<x-layout>
    <x-slot:title>Nuestros productos</x-slot:title>
    <div class="container">
        <h3 class="text-center mb-5">Conocé nuestros productos</h3>
        <div class="row justify-content-center g-4">
            @foreach ($products as $product)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex align-items-stretch">
                    <div class="card product-card w-100 h-100">
                        @if($product->image)
                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="card-img-top" style="object-fit:cover; max-height:220px;">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text flex-grow-1">{{ $product->description }}</p>
                            <p class="mt-2"><strong>${{ number_format($product->price, 2) }}</strong></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
