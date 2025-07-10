<x-layout>
    <div class="container py-5">
        <h1 class="mb-4">Mi Perfil</h1>
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        <div class="row">
            <!-- Datos personales -->
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title mb-3"><i class="bi bi-person"></i> Datos personales</h5>
                        <p class="mb-1"><strong>Nombre:</strong> {{ Auth::user()->name }}</p>
                        <p class="mb-1"><strong>Email:</strong> {{ Auth::user()->email }}</p>
                        <p class="mb-1"><strong>Fecha de registro:</strong> {{ Auth::user()->created_at->format('d/m/Y') }}</p>
                    </div>
                </div>
                <!-- Soporte o contacto -->
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title mb-3"><i class="bi bi-headset"></i> Soporte</h5>
                        <p class="mb-2">¿Necesitás ayuda? ¡Contactanos!</p>
                        <a href="mailto:soporte@magiapotagia.com" class="btn btn-outline-primary btn-sm mb-2 w-100">
                            <i class="bi bi-envelope"></i> Email
                        </a>
                        <a href="https://wa.me/" target="_blank" class="btn btn-success btn-sm w-100">
                            <i class="bi bi-whatsapp"></i> WhatsApp
                        </a>
                    </div>
                </div>
            </div>
            <!-- Mis órdenes -->
            <div class="col-md-8">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="card-title mb-3"><i class="bi bi-list-check"></i> Mis Órdenes</h5>
                        @if($orders->count() > 0)
                            <ul class="list-group mb-3">
                                @foreach($orders->take(3) as $order)
                                    <li class="list-group-item d-flex align-items-center">
                                        @if($order->product->image)
                                            <img src="{{ asset($order->product->image) }}" alt="{{ $order->product->name }}" class="rounded me-3" style="width: 60px; height: 60px; object-fit: cover;">
                                        @endif
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">{{ $order->product->name }}</div>
                                            <span class="text-muted small">{{ $order->order_date->format('d/m/Y') }}</span>
                                            <div class="small">{{ $order->product->description }}</div>
                                        </div>
                                        <form action="{{ route('user.orders.cancel', $order) }}" method="POST" class="ms-3" onsubmit="return confirm('¿Estás seguro que deseas cancelar este servicio?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Cancelar servicio</button>
                                        </form>
                                    </li>
                                @endforeach
                            </ul>
                            <a href="{{ route('user.orders') }}" class="btn btn-primary">
                                Ver historial completo
                            </a>
                        @else
                            <div class="alert alert-info mb-3">
                                Aún no tienes órdenes. ¡Explora nuestros servicios!
                            </div>
                            <a href="{{ route('user.products') }}" class="btn btn-outline-primary">
                                Contratar un servicio
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
