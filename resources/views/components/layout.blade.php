<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Magia Potagia' }}</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600&family=Quicksand:wght@300;400;500&display=swap" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Nuestro CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.svg') }}">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="bi bi-moon-stars"></i> Magia Potagia
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/')}}">
                            <i class="bi bi-house-heart"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/products')}}">
                            <i class="bi bi-gem"></i> Productos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/blog')}}">
                            <i class="bi bi-journal-text"></i> Blog
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    @auth
                        <li class="nav-item">
                            <span class="nav-link">
                                <i class="bi bi-person-circle"></i> Hola, {{ auth()->user()->name }}
                            </span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('admin/posts') }}">
                                <i class="bi bi-pencil-square"></i> Administrar Blog
                            </a>
                        </li>
                        <li class="nav-item">
                            <form method="POST" action="{{ url('logout') }}" id="logout-form" onsubmit="return confirm('¿Estás segura que deseas cerrar sesión?');">
                                @csrf
                                <button type="submit" class="btn btn-link nav-link">
                                    <i class="bi bi-box-arrow-right"></i> Cerrar sesión
                                </button>
                            </form>
                        </li>
                    @endauth

                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('login') }}">
                                <i class="bi bi-box-arrow-in-right"></i> Iniciar sesión
                            </a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <main class="container py-4">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="footer-custom mt-5">
        <div class="footer-content">
            <div class="container">
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="footer-section">
                            <h5 class="footer-title">
                                <i class="bi bi-moon-stars"></i> Magia Potagia
                            </h5>
                            <p class="footer-description">
                                Descubrí el poder de la espiritualidad a través del tarot,
                                los cristales y la astrología. Tu viaje hacia el autoconocimiento
                                comienza acá.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="footer-section">
                            <h5 class="footer-title">
                                <i class="bi bi-compass-fill"></i> Links
                            </h5>
                            <ul class="footer-links">
                                <li>
                                    <a href="{{ url('/blog')}}">
                                        <i class="bi bi-journal-text"></i> Blog
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/products')}}">
                                        <i class="bi bi-gem"></i> Productos
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="footer-section">
                            <h5 class="footer-title">
                                <i class="bi bi-stars"></i> Seguinos
                            </h5>
                            <div class="social-links mb-3">
                                <a href="https://www.facebook.com" target="_blank">
                                    <i class="bi bi-facebook"></i>
                                </a>
                                <a href="https://www.instagram.com" target="_blank">
                                    <i class="bi bi-instagram"></i>
                                </a>
                                <a href="https://www.twitter.com" target="_blank">
                                    <i class="bi bi-twitter-x"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p class="mb-1">
                            <i class="bi bi-code-slash"></i> Desarrollado por:
                        </p>
                        <p class="mb-1 developers">
                            Manuela Jaureguialzo | Florencia Fernandez Bugna
                        </p>
                        <p class="mb-0 course-info">
                            <i class="bi bi-mortarboard"></i> DWN4AV - {{ date('Y') }} Portales y Comercios Electrónicos
                        </p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <p class="mb-0 copyright">
                            &copy; {{ date('Y') }} Magia Potagia
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
