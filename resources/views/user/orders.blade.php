<x-layout>
    <div class="container py-5">
        <h1 class="mb-4">Mis Órdenes</h1>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                @if($orders->count() > 0)
                    <div class="row g-4">
                        @foreach($orders as $order)
                            <div class="col-md-6 col-lg-4">
                                <div class="card h-100 shadow-sm">
                                    @if($order->product->image)
                                        <img src="{{ asset($order->product->image) }}" alt="{{ $order->product->name }}" class="card-img-top" style="height: 180px; object-fit: cover;">
                                    @endif
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title mb-1">{{ $order->product->name }}</h5>
                                        <div class="mb-2"><span class="text-muted small">Número de orden:</span> <span class="text-dark">#{{ $order->id }}</span></div>
                                        <p class="card-text text-muted small mb-2">{{ $order->product->description }}</p>
                                        <div class="mb-2">
                                            <span class="fw-bold text-purple">${{ number_format($order->total_amount, 0, ',', '.') }}</span>
                                        </div>
                                        <div class="mb-2">
                                            <span class="text-muted small">Fecha: {{ $order->order_date->format('d/m/Y') }}</span>
                                        </div>
                                        @if($order->notes)
                                            <div class="alert alert-secondary p-2 small mb-2">
                                                <strong>Notas:</strong> {{ $order->notes }}
                                            </div>
                                        @endif
                                        <div class="mb-2">
                                            @if($order->isPending())
                                                <span class="badge bg-warning text-dark">Pendiente</span>
                                            @elseif($order->isCompleted())
                                                <span class="badge bg-success">Completado</span>
                                            @else
                                                <span class="badge bg-danger">Cancelado</span>
                                            @endif
                                        </div>
                                        <form action="{{ route('user.orders.cancel', $order) }}" method="POST" class="mt-auto" onsubmit="return confirm('¿Estás seguro que deseas cancelar este servicio?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm w-100">Cancelar servicio</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @if($orders->hasPages())
                        <div class="mt-4">
                            {{ $orders->links() }}
                        </div>
                    @endif
                @else
                    <div class="text-center py-12">
                        <div class="mb-6">
                            <svg width="40" height="40" class="text-gray-400 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">No tienes órdenes aún</h3>
                        <p class="text-gray-600 mb-6">Explora nuestros productos y contrata tu primera sesión</p>
                        <a href="{{ route('user.products') }}" class="btn btn-primary px-6 py-3 rounded-lg">
                            Ver productos
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-layout>
