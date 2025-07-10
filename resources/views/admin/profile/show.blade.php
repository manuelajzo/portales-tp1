<x-layout>
    <x-slot:title>Mi Perfil</x-slot:title>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <i class="bi bi-person-circle" style="font-size: 4rem; color: var(--morado);"></i>
                        <h3 class="mt-3 mb-1">{{ $user->name }}</h3>
                        <p class="mb-1 text-muted">{{ $user->email }}</p>
                        <span class="badge" style="background: var(--dorado); color: var(--azul-oscuro); font-size: 0.9em;">{{ $user->isAdmin() ? 'Administrador' : 'Usuario' }}</span>
                        <div class="mt-4 d-flex justify-content-center gap-2">
                            <a href="{{ route('admin.profile.edit') }}" class="btn btn-primary">
                                <i class="bi bi-pencil"></i> Editar perfil
                            </a>
                            <a href="/" class="btn btn-outline-secondary">
                                Volver
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout> 