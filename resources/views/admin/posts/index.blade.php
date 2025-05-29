<x-layout>
    <x-slot:title>Administrar Posts</x-slot:title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Administrar Posts</h1>
            <a href="{{ route('posts.create') }}" class="btn btn-primary">Crear Nuevo Post</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Título</th>
                                <th>Categoría</th>
                                <th>Estado</th>
                                <th>Fecha de Publicación</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->category }}</td>
                                    <td>
                                        @if($post->is_published)
                                            <span class="badge bg-success">Publicado</span>
                                        @else
                                            <span class="badge bg-secondary">Borrador</span>
                                        @endif
                                    </td>
                                    <td>{{ $post->published_at ? $post->published_at->format('d/m/Y') : 'No publicado' }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-primary">Editar</a>
                                            <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</x-layout> 