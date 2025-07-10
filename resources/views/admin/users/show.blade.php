<x-layout>
    <x-slot:title>Detalle de Usuario - {{ $user->name }}</x-slot:title>

    <div class="container py-5">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Usuarios</a></li>
                <li class="breadcrumb-item active">{{ $user->name }}</li>
            </ol>
        </nav>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Detalle de Usuario</h1>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary">
                    <i class="bi bi-pencil-square"></i> Editar Usuario
                </a>
                <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Volver
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="bi bi-person-circle"></i> Información Personal
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-sm-4"><strong>ID:</strong></div>
                            <div class="col-sm-8">{{ $user->id }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-4"><strong>Nombre:</strong></div>
                            <div class="col-sm-8">{{ $user->name }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-4"><strong>Email:</strong></div>
                            <div class="col-sm-8">{{ $user->email }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-4"><strong>Rol:</strong></div>
                            <div class="col-sm-8">
                                <span class="badge {{ $user->isAdmin() ? 'bg-danger' : 'bg-primary' }}">
                                    {{ $user->isAdmin() ? 'Administrador' : 'Usuario' }}
                                </span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-4"><strong>Fecha de Registro:</strong></div>
                            <div class="col-sm-8">{{ $user->created_at->format('d/m/Y H:i:s') }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-4"><strong>Última Actualización:</strong></div>
                            <div class="col-sm-8">{{ $user->updated_at->format('d/m/Y H:i:s') }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="bi bi-gear"></i> Servicios Contratados
                        </h5>
                    </div>
                    <div class="card-body">
                        @if($userServices->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>Servicio</th>
                                            <th>Precio</th>
                                            <th>Estado</th>
                                            <th>Expira</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($userServices as $service)
                                            <tr>
                                                <td>{{ $service->product->name }}</td>
                                                <td>${{ number_format($service->price, 2) }}</td>
                                                <td>
                                                    <span class="badge bg-{{ $service->status === 'active' ? 'success' : 'secondary' }}">
                                                        {{ $service->status }}
                                                    </span>
                                                </td>
                                                <td>{{ $service->expires_at ? $service->expires_at->format('d/m/Y') : 'No expira' }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="text-center text-muted">
                                <i class="bi bi-cart-plus" style="font-size: 2rem;"></i>
                                <p class="mt-2">No hay servicios contratados</p>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="bi bi-credit-card"></i> Historial de Compras
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="text-center text-muted">
                            <i class="bi bi-receipt" style="font-size: 2rem;"></i>
                            <p class="mt-2">No hay compras registradas</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout> 
