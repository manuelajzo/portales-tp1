<x-layout>
    <x-slot:title>Blog</x-slot:title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <div class="container py-5">
        <h1 class="text-center mb-5">Blog</h1>

        <div class="row g-4">
            <!-- Post 1 - Tarot -->
            <div class="col-md-4">
                <div class="card h-100">
                    <img src="/img/tarot.jpg" class="card-img-top" alt="Lectura de Tarot" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">Lectura de Tarot para Principiantes</h5>
                        <p class="card-text">Descubre los secretos básicos para empezar a leer el tarot y conectar con tu intuición.</p>
                        <a href="#" class="btn btn-primary">Leer más</a>
                    </div>
                </div>
            </div>

            <!-- Post 2 - Cristales -->
            <div class="col-md-4">
                <div class="card h-100">
                    <img src="/img/cristales.jpg" class="card-img-top" alt="Cristales y Energía" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">El Poder Sanador de los Cristales</h5>
                        <p class="card-text">Aprende sobre las propiedades curativas de los cristales más populares y cómo utilizarlos.</p>
                        <a href="#" class="btn btn-primary">Leer más</a>
                    </div>
                </div>
            </div>

            <!-- Post 3 - Astrología -->
            <div class="col-md-4">
                <div class="card h-100">
                    <img src="/img/astrologia.jpg" class="card-img-top" alt="Astrología" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">Introducción a la Carta Astral</h5>
                        <p class="card-text">Comprende los elementos básicos de una carta astral y su significado en tu vida.</p>
                        <a href="#" class="btn btn-primary">Leer más</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</x-layout>
