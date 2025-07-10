<x-layout>
    <x-slot:title>Editar Usuario - {{ $user->name }}</x-slot:title>

    <div class="container py-5">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Usuarios</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.users.show', $user) }}">{{ $user->name }}</a></li>
                <li class="breadcrumb-item active">Editar</li>
            </ol>
        </nav>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Editar Usuario</h1>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.users.show', $user) }}" class="btn btn-outline-secondary">
                    <i class="bi bi-eye"></i> Ver Detalle
                </a>
                <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Volver
                </a>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="bi bi-person-gear"></i> Información del Usuario
                        </h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.users.update', $user) }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Nombre completo</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                           id="name" name="name" value="{{ old('name', $user->name) }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                           id="email" name="email" value="{{ old('email', $user->email) }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="password" class="form-label">Nueva contraseña (opcional)</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                           id="password" name="password">
                                    <div class="form-text">Deja en blanco para mantener la contraseña actual</div>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label for="password_confirmation" class="form-label">Confirmar nueva contraseña</label>
                                    <input type="password" class="form-control" 
                                           id="password_confirmation" name="password_confirmation">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="role" class="form-label">Rol</label>
                                <select class="form-select @error('role') is-invalid @enderror" id="role" name="role" required>
                                    <option value="">Seleccionar rol</option>
                                    <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>Usuario</option>
                                    <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Administrador</option>
                                </select>
                                @error('role')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="alert alert-info">
                                <i class="bi bi-info-circle"></i>
                                <strong>Información:</strong> 
                                ID: {{ $user->id }} | 
                                Registrado: {{ $user->created_at->format('d/m/Y H:i') }} | 
                                Última actualización: {{ $user->updated_at->format('d/m/Y H:i') }}
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check-circle"></i> Actualizar Usuario
                                </button>
                                <a href="{{ route('admin.users.show', $user) }}" class="btn btn-outline-secondary">
                                    Cancelar
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout> 