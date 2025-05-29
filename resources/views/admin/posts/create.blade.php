<x-layout>
    <x-slot:title>Crear Nuevo Post</x-slot:title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2 class="mb-0">Crear Nuevo Post</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="title" class="form-label">Título</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                    id="title" name="title" value="{{ old('title') }}" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="category" class="form-label">Categoría</label>
                                <select class="form-select @error('category') is-invalid @enderror" 
                                    id="category" name="category" required>
                                    <option value="">Selecciona una categoría</option>
                                    <option value="Tarot" {{ old('category') == 'Tarot' ? 'selected' : '' }}>Tarot</option>
                                    <option value="Cristales" {{ old('category') == 'Cristales' ? 'selected' : '' }}>Cristales</option>
                                    <option value="Astrología" {{ old('category') == 'Astrología' ? 'selected' : '' }}>Astrología</option>
                                </select>
                                @error('category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="short_description" class="form-label">Descripción Corta</label>
                                <textarea class="form-control @error('short_description') is-invalid @enderror" 
                                    id="short_description" name="short_description" rows="2">{{ old('short_description') }}</textarea>
                                @error('short_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="content" class="form-label">Contenido</label>
                                <textarea class="form-control @error('content') is-invalid @enderror" 
                                    id="content" name="content" rows="6" required>{{ old('content') }}</textarea>
                                @error('content')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Imagen</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" 
                                    id="image" name="image">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="is_published" 
                                    name="is_published" {{ old('is_published') ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_published">Publicar inmediatamente</label>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-primary">Crear Post</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</x-layout> 