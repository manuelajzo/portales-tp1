@csrf

<div class="mb-3">
    <label for="title" class="form-label">Título</label>
    <input type="text" class="form-control @error('title') is-invalid @enderror" 
        id="title" name="title" value="{{ old('title', $post->title ?? '') }}" required>
    @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="category" class="form-label">Categoría</label>
    <select class="form-select @error('category') is-invalid @enderror" 
        id="category" name="category" required>
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
        id="content" name="content" rows="6" required>{{ old('content', $post->content ?? '') }}</textarea>
    @error('content')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="image" class="form-label">Imagen</label>
    @if(isset($post) && $post->image)
        <div class="mb-2">
            <img src="{{ asset($post->image) }}" alt="Current image" class="img-thumbnail" style="max-height: 200px">
        </div>
    @endif
    <input type="file" class="form-control @error('image') is-invalid @enderror" 
        id="image" name="image">
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
    <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Cancelar</a>
    <button type="submit" class="btn btn-primary">
        {{ isset($post) ? 'Actualizar Post' : 'Crear Post' }}
    </button>
</div> 