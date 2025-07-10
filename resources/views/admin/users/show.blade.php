<x-layout>
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Detalle de Usuario</h1>
            <a href="{{ route('admin.users.index') }}" class="btn btn-outline-primary">
                <i class="bi bi-arrow-left"></i> Volver a Usuarios
            </a>
        </div>

        <div class="row">
            <!-- Información del Usuario -->
            <div class="col-md-4">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="card-title mb-3">
                            <i class="bi bi-person-circle"></i> Información Personal
                        </h5>
                        <div class="mb-3">
                            <strong>ID:</strong> {{ $user->id }}
                        </div>
                        <div class="mb-3">
                            <strong>Nombre:</strong> {{ $user->name }}
                        </div>
                        <div class="mb-3">
                            <strong>Email:</strong> {{ $user->email }}
                        </div>
                        <div class="mb-3">
                            <strong>Rol:</strong>
                            <span class="badge {{ $user->role === 'admin' ? 'bg-danger' : 'bg-primary' }}">
                                {{ ucfirst($user->role) }}
                            </span>
                        </div>
                        <div class="mb-3">
                            <strong>Fecha de Registro:</strong> {{ $user->created_at->format('d/m/Y H:i') }}
                        </div>
                        <div class="mb-3">
                            <strong>Última Actualización:</strong> {{ $user->updated_at->format('d/m/Y H:i') }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Servicios Contratados -->
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title mb-3">
                            <i class="bi bi-list-check"></i> Servicios Contratados
                        </h5>

                        @if($user->orders->count() > 0)
                            <div class="row g-3">
                                @foreach($user->orders as $order)
                                    <div class="col-md-6">
                                        <div class="card border">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center mb-3">
                                                    @if($order->product->image)
                                                        <img src="{{ asset($order->product->image) }}"
                                                             alt="Imagen de {{ $order->product->name }}"
                                                             class="rounded me-3"
                                                             style="width: 60px; height: 60px; object-fit: cover;"
                                                             aria-label="Imagen del producto {{ $order->product->name }}">
                                                    @endif
                                                    <div>
                                                        <h6 class="card-title mb-1">{{ $order->product->name }}</h6>
                                                        <span class="badge {{ $order->status === 'completed' ? 'bg-success' : ($order->status === 'pending' ? 'bg-warning' : 'bg-danger') }}">
                                                            {{ ucfirst($order->status) }}
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="mb-2">
                                                    <strong>Precio:</strong> ${{ number_format($order->total_amount, 0, ',', '.') }}
                                                </div>
                                                <div class="mb-2">
                                                    <strong>Fecha de Contratación:</strong> {{ $order->order_date->format('d/m/Y') }}
                                                </div>
                                                @if($order->notes)
                                                    <div class="mb-2">
                                                        <strong>Notas:</strong> {{ $order->notes }}
                                                    </div>
                                                @endif
                                                <div class="small text-muted">
                                                    <strong>ID de Orden:</strong> #{{ $order->id }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="alert alert-info">
                                <i class="bi bi-info-circle"></i> Este usuario aún no ha contratado ningún servicio.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
