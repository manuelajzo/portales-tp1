<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    private $validationRules = [
        'title' => 'required|max:255',
        'content' => 'required',
        'category' => 'required|max:255',
        'short_description' => 'nullable',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ];

    /**
     * return a list of posts.
     */
    public function index()
    {
        $posts = BlogPost::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new post.
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
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
     * Display the specified resource.
     */
    public function show(BlogPost $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogPost $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
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
     * Remove the specified resource from storage.
     */
    public function destroy(BlogPost $post)
    {
        $this->deleteImage($post);
        $post->delete();

        return redirect()->route('posts.index')
            ->with('success', 'Post eliminado exitosamente.');
    }

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

    private function deleteImage(?BlogPost $post): void
    {
        if ($post && $post->image && file_exists(public_path($post->image))) {
            unlink(public_path($post->image));
        }
    }
}
