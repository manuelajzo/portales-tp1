<x-layout>
    <x-slot:title>Crear Nuevo Post</x-slot:title>

     <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2 class="mb-0">Crear Nuevo Post</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                            @include('admin.posts._form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
