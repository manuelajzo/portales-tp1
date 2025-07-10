<x-layout>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <h1 class="h3 mb-4 text-center fw-bold">Crear Cuenta</h1>
                        <p class="text-center text-muted mb-4">Únete a Magia Potagia y descubre el poder de la espiritualidad</p>

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('register.submit') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nombre completo</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" placeholder="Tu nombre completo" required autofocus>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control" placeholder="ejemplo@mail.com" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Mínimo 8 caracteres" required>
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirmar contraseña</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Repite tu contraseña" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Crear Cuenta</button>
                        </form>

                        <div class="text-center mt-3">
                            <span>¿Ya tienes una cuenta?</span>
                            <a href="{{ route('login') }}" class="text-primary fw-bold">Inicia sesión</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
