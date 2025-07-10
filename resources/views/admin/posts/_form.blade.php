@csrf

<div class="mb-3">
    <label for="title" class="form-label">Título</label>
    <input type="text" class="form-control @error('title') is-invalid @enderror" 
        id="title" name="title" value="{{ old('title', $post->title ?? '') }}" aria-label="Ingresa el título del post">
    @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="category" class="form-label">Categoría</label>
    <select class="form-select @error('category') is-invalid @enderror" 
        id="category" name="category" aria-label="Selecciona una categoría para el post">
        <option value="">Selecciona una categoría</option>
        @foreach(['Tarot', 'Cristales', 'Astrología'] as $category)
            <option value="{{ $category }}" {{ old('category', $post->category ?? '') == $category ? 'selected' : '' }}>
                {{ $category }}
            </option>
        @endforeach
    </select>
    @error('category')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="short_description" class="form-label">Descripción Corta</label>
    <textarea class="form-control @error('short_description') is-invalid @enderror" 
        id="short_description" name="short_description" rows="2">{{ old('short_description', $post->short_description ?? '') }}</textarea>
    @error('short_description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="content" class="form-label">Contenido</label>
    <textarea class="form-control @error('content') is-invalid @enderror" 
        id="content" name="content" rows="6" aria-label="Ingresa el contenido del post">{{ old('content', $post->content ?? '') }}</textarea>
    @error('content')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="image" class="form-label">Imagen</label>
    @if(isset($post) && $post->image)
        <div class="mb-2">
            <img src="{{ asset($post->image) }}" alt="Imagen actual del post" class="img-thumbnail" style="max-height: 200px" aria-label="Imagen actual del post">
        </div>
    @endif
    <input type="file" class="form-control @error('image') is-invalid @enderror" 
        id="image" name="image" aria-label="Selecciona una imagen para el post">
    @error('image')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="is_published" 
        name="is_published" {{ old('is_published', $post->is_published ?? false) ? 'checked' : '' }}>
    <label class="form-check-label" for="is_published">
        {{ isset($post) ? 'Publicado' : 'Publicar inmediatamente' }}
    </label>
</div>

<div class="d-flex justify-content-between">
    <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancelar</a>
    <button type="submit" class="btn btn-primary">
        {{ isset($post) ? 'Actualizar Post' : 'Crear Post' }}
    </button>
</div> 