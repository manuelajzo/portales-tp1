<x-layout>
    <x-slot:title>Administrar Posts</x-slot:title>



    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Administrar Posts</h1>
            <div>
                <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary me-2">
                    <i class="bi bi-people"></i> Gestionar Usuarios
                </a>
                <a href="{{ route('posts.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i> Crear Nuevo Post
                </a>
            </div>
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
                                <th class="text-end">Acciones</th>
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
                                        <div class="d-flex justify-content-end gap-2">
                                            <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-primary">
                                                <i class="bi bi-pencil-square"></i> Editar
                                            </a>
                                            <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro que deseas eliminar este post?')">
                                                    <i class="bi bi-trash"></i> Eliminar
                                                </button>
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
</x-layout>
