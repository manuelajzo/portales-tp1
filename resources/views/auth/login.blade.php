<x-layout>
    <x-slot:title>Iniciar sesión</x-slot:title>

    <h1 class="mt-4">Iniciar sesión</h1>

    <form method="POST" action="{{ route('login.submit') }}" class="mt-4">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" aria-label="Ingresa tu correo electrónico">
            @error('email')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" name="password" class="form-control" aria-label="Ingresa tu contraseña">
            @error('password')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Ingresar</button>
    </form>

    <div class="text-center mt-3">
        <span>¿No tenés cuenta?</span>
        <a href="{{ route('register') }}" class="text-primary fw-bold">Registrate</a>
    </div>
</x-layout>
