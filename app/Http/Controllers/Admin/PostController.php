<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * Controlador para administrar los posts del blog.
 */
class PostController extends Controller
{
    /**
     * Reglas de validación para los posts.
     *
     * @var array<string, string>
     */
    private $validationRules = [
        'title' => 'required|max:255',
        'content' => 'required',
        'category' => 'required|max:255',
        'short_description' => 'nullable',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ];

    /**
     * Muestra una lista de posts.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $posts = BlogPost::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Muestra el formulario para crear un nuevo post.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Almacena un nuevo post en la base de datos.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate($this->validationRules);
        $validated = $this->handleImageUpload($request, $validated);
        $validated = $this->preparePostData($request, $validated);

        BlogPost::create($validated);

        return redirect()->route('posts.index')
            ->with('success', 'Post creado exitosamente.');
    }

    /**
     * Muestra un post específico.
     *
     * @param \App\Models\BlogPost $post
     * @return \Illuminate\View\View
     */
    public function show(BlogPost $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Muestra el formulario para editar un post.
     *
     * @param \App\Models\BlogPost $post
     * @return \Illuminate\View\View
     */
    public function edit(BlogPost $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Actualiza un post específico en la base de datos.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\BlogPost $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, BlogPost $post)
    {
        $validated = $request->validate($this->validationRules);
        $validated = $this->handleImageUpload($request, $validated, $post);
        $validated = $this->preparePostData($request, $validated, $post);

        $post->update($validated);

        return redirect()->route('posts.index')
            ->with('success', 'Post actualizado exitosamente.');
    }

    /**
     * Elimina un post específico de la base de datos.
     *
     * @param \App\Models\BlogPost $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(BlogPost $post)
    {
        $this->deleteImage($post);
        $post->delete();

        return redirect()->route('posts.index')
            ->with('success', 'Post eliminado exitosamente.');
    }

    /**
     * Maneja la subida de imágenes para los posts.
     *
     * @param \Illuminate\Http\Request $request
     * @param array $validated
     * @param \App\Models\BlogPost|null $post
     * @return array
     */
    private function handleImageUpload(Request $request, array $validated, ?BlogPost $post = null): array
    {
        if ($request->hasFile('image')) {
            if ($post && $post->image) {
                $this->deleteImage($post);
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('img/blog'), $imageName);
            $validated['image'] = 'img/blog/' . $imageName;
        }

        return $validated;
    }

    /**
     * Prepara los datos del post antes de guardar.
     *
     * @param \Illuminate\Http\Request $request
     * @param array $validated
     * @param \App\Models\BlogPost|null $post
     * @return array
     */
    private function preparePostData(Request $request, array $validated, ?BlogPost $post = null): array
    {
        if (!isset($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        $validated['is_published'] = $request->has('is_published');

        if ($validated['is_published'] && (!$post || !$post->published_at)) {
            $validated['published_at'] = now();
        }

        return $validated;
    }

    /**
     * Elimina la imagen de un post del servidor.
     *
     * @param \App\Models\BlogPost|null $post
     * @return void
     */
    private function deleteImage(?BlogPost $post): void
    {
        if ($post && $post->image && file_exists(public_path($post->image))) {
            unlink(public_path($post->image));
        }
    }
}
