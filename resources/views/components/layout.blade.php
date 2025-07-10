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
                        <a class="nav-link" href="{{ url('/') }}">
                            <i class="bi bi-house-heart"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/products') }}">
                            <i class="bi bi-gem"></i> Productos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/blog') }}">
                            <i class="bi bi-journal-text"></i> Blog
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle me-1"></i>
                                <span>Hola, {{ auth()->user()->name }}</span>
                                @if(auth()->user()->isAdmin())
                                    <i class="bi bi-shield-lock ms-2" style="color: var(--dorado);" title="Admin"></i>
                                @endif
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.profile.show') }}">
                                        <i class="bi bi-person"></i> Mi perfil
                                    </a>
                                </li>
                                @if(auth()->user()->isAdmin())
                                    <li>
                                        <h6 class="dropdown-header">Administración</h6>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('admin.posts.index') }}">
                                            <i class="bi bi-pencil-square"></i> Administrar Blog
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('admin.users.index') }}">
                                            <i class="bi bi-people"></i> Administrar Usuarios
                                        </a>
                                    </li>
                                @endif
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="{{ url('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="bi bi-box-arrow-right"></i> Cerrar sesión
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endauth
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('login') }}">
                                <i class="bi bi-box-arrow-in-right"></i> Iniciar sesión
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/products') }}">
                                <i class="bi bi-gem"></i> Productos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/blog') }}">
                                <i class="bi bi-journal-text"></i> Blog
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        @auth
                            <li class="nav-item d-flex align-items-center">
                                <span style="color: #fff; font-weight: 500;">
                                    <i class="bi bi-person-circle"></i> Hola, {{ auth()->user()->name }}
                                </span>
                            </li>
                            @if((auth()->user()->role ?? '') === 'admin')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('admin/posts') }}">
                                        <i class="bi bi-pencil-square"></i> Administrar Blog
                                    </a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('user.dashboard') }}">
                                        <i class="bi bi-person"></i> Mi Perfil
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('user.orders') }}">
                                        <i class="bi bi-list-check"></i> Mis Órdenes
                                    </a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <form method="POST" action="{{ url('logout') }}" id="logout-form">
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
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('register') }}">
                                    <i class="bi bi-person-plus"></i> Registrarse
                                </a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container py-4">
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        {{ $slot }}
    </main>

    <footer class="footer-custom mt-5">
        <div class="footer-content">
            <div class="container">
                <div class="row g-4 text-center justify-content-center">
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
                    </section>
                    <section class="col-md-4">
                        <div class="footer-section">
                            <h5 class="footer-title">
                                <i class="bi bi-compass-fill"></i> Links
                            </h5>
                            <nav aria-label="Enlaces del footer">
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
                            </nav>
                        </div>
                    </section>
                    <section class="col-md-4">
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
                    </section>
                </div>
            </div>
        </div>
        <div class="footer-bottom text-center mt-3">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <p class="mb-1">
                            <i class="bi bi-code-slash"></i> Desarrollado por:
                        </p>
                        <p class="mb-1 developers">
                            Manuela Jaureguialzo | Florencia Fernandez Bugna
                        </p>
                        <p class="mb-0 course-info">
                            <i class="bi bi-mortarboard"></i> DWN4AV - {{ date('Y') }} Portales y Comercios Electrónicos
                        </p>
                        <p class="mb-0 copyright mt-2">
                            &copy; {{ date('Y') }} Magia Potagia
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <style>
        .footer-custom .footer-content {
            text-align: center;
        }
        .footer-custom .footer-title {
            margin-left: auto;
            margin-right: auto;
        }
        .footer-bottom {
            text-align: center;
        }
    </style>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
