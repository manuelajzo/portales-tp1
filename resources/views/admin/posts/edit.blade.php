<x-layout>
    <x-slot:title>Editar Post</x-slot:title>

    

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2 class="mb-0">Editar Post</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @include('admin.posts._form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
