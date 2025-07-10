<x-layout>
    <x-slot:content>
        <div class="container mx-auto px-4 py-8">
            <div class="max-w-4xl mx-auto">
                <!-- Breadcrumb -->
                <nav class="mb-6">
                    <a href="{{ route('user.products') }}" class="text-purple-600 hover:text-purple-800">
                        ← Volver a Servicios
                    </a>
                </nav>

                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <!-- Product Image -->
                    @if($product->image)
                        <div class="w-full h-64 md:h-96 bg-gray-200">
                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                        </div>
                    @endif

                    <div class="p-6 md:p-8">
                        <!-- Product Header -->
                        <div class="flex flex-col md:flex-row md:justify-between md:items-start mb-6">
                            <div class="mb-4 md:mb-0">
                                <h1 class="text-3xl font-bold text-gray-800 mb-2">{{ $product->name }}</h1>
                                <p class="text-gray-600 text-lg">{{ $product->description }}</p>
                            </div>
                            <div class="text-right">
                                <div class="text-4xl font-bold text-purple-600 mb-2">{{ $product->formatted_price }}</div>
                                @if($product->isAvailable())
                                    <span class="inline-block bg-green-100 text-green-800 text-sm px-3 py-1 rounded-full">Disponible</span>
                                @else
                                    <span class="inline-block bg-red-100 text-red-800 text-sm px-3 py-1 rounded-full">No Disponible</span>
                                @endif
                            </div>
                        </div>

                        <!-- Product Details -->
                        <div class="grid md:grid-cols-2 gap-6 mb-8">
                            <div class="space-y-4">
                                @if($product->duration_minutes)
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 mr-3 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <div>
                                            <div class="font-semibold text-gray-800">Duración</div>
                                            <div class="text-gray-600">{{ $product->formatted_duration }}</div>
                                        </div>
                                    </div>
                                @endif

                                @if($product->difficulty_level)
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 mr-3 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                                        </svg>
                                        <div>
                                            <div class="font-semibold text-gray-800">Nivel</div>
                                            <div class="text-gray-600">{{ $product->difficulty_level }}</div>
                                        </div>
                                    </div>
                                @endif

                                @if($product->delivery_method)
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 mr-3 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9v-9m0-9v9"></path>
                                        </svg>
                                        <div>
                                            <div class="font-semibold text-gray-800">Método de Entrega</div>
                                            <div class="text-gray-600">{{ $product->delivery_method }}</div>
                                        </div>
                                    </div>
                                @endif

                                @if($product->category)
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 mr-3 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                        </svg>
                                        <div>
                                            <div class="font-semibold text-gray-800">Categoría</div>
                                            <div class="text-gray-600">{{ $product->category }}</div>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            @if($product->whats_included)
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-800 mb-3">¿Qué incluye?</h3>
                                    <div class="bg-purple-50 rounded-lg p-4">
                                        <p class="text-gray-700">{{ $product->whats_included }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <!-- Order Form -->
                        @if($product->isAvailable())
                            <div class="border-t pt-6">
                                <h3 class="text-xl font-semibold text-gray-800 mb-4">Contratar Servicio</h3>

                                <form action="{{ route('user.orders.store') }}" method="POST" class="space-y-4">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                                    <div>
                                        <label for="notes" class="block text-sm font-medium text-gray-700 mb-2">
                                            Notas adicionales (opcional)
                                        </label>
                                        <textarea
                                            name="notes"
                                            id="notes"
                                            rows="4"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                            placeholder="Cuéntanos sobre tus expectativas, preguntas específicas, o cualquier información adicional que consideres importante..."
                                        ></textarea>
                                    </div>

                                    <div class="bg-gray-50 rounded-lg p-4">
                                        <div class="flex justify-between items-center">
                                            <span class="text-gray-600">Total a pagar:</span>
                                            <span class="text-2xl font-bold text-purple-600">{{ $product->formatted_price }}</span>
                                        </div>
                                    </div>

                                    <button type="submit" class="w-full bg-purple-600 text-white py-3 px-6 rounded-lg hover:bg-purple-700 transition font-semibold">
                                        Confirmar Contratación
                                    </button>
                                </form>
                            </div>
                        @else
                            <div class="border-t pt-6">
                                <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                                    <p class="text-yellow-800">Este servicio no está disponible en este momento. Por favor, contacta con nosotros para más información.</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </x-slot:content>
</x-layout>
