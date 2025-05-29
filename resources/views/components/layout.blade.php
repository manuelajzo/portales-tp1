<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Magia Potagia' }}</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="bi bi-moon-stars"></i> Magia Potagia
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
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
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
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
                            <form method="POST" action="{{ url('logout') }}" id="logout-form" onsubmit="return confirm('¿Estás seguro que deseas cerrar sesión?');">
                                @csrf
                                <button type="submit" class="btn btn-link nav-link" style="display: inline; cursor: pointer;">
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

    <div class="container py-4">
        {{ $slot }}
    </div>

    <footer class="bg-dark text-light py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5 class="mb-3"><i class="bi bi-moon-stars"></i> Magia Potagia</h5>
                    <p>Tu portal holístico para el crecimiento espiritual y personal.</p>
                </div>
                <div class="col-md-4">
                    <h5 class="mb-3">Enlaces Rápidos</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ url('/blog')}}" class="text-light"><i class="bi bi-journal-text"></i> Blog</a></li>
                        <li><a href="{{ url('/products')}}" class="text-light"><i class="bi bi-gem"></i> Productos</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5 class="mb-3">Síguenos</h5>
                    <div class="social-links">
                        <a href="https://www.facebook.com" class="text-light me-2" target="_blank" rel="noopener noreferrer">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="https://www.instagram.com" class="text-light me-2" target="_blank" rel="noopener noreferrer">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="https://www.twitter.com" class="text-light" target="_blank" rel="noopener noreferrer">
                            <i class="bi bi-twitter-x"></i>
                        </a>
                    </div>
                </div>
            </div>
            <hr class="mt-4">
            <div class="text-center">
                <p class="mb-2">
                    <i class="bi bi-code-slash"></i> Desarrollado por:
                    <span class="text-light">Manuela Jaureguialzo</span> |
                    <span class="text-light">Florencia Fernandez Bugna</span>
                </p>
                <p class="mb-2">
                    <i class="bi bi-mortarboard"></i> DWN4AV - {{ date('Y') }}
                </p>
                <small class="text-muted">&copy; {{ date('Y') }} Magia Potagia. Todos los derechos reservados.</small>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
