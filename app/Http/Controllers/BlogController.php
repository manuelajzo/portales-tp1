<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;

class BlogController extends Controller
{
    public function index()
    {
        $posts = BlogPost::where('is_published', true)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('blog', compact('posts'));
    }

    public function show(BlogPost $post)
    {
        if (!$post->is_published) {
            return redirect()->route('blog.index');
        }

        return view('blog.show', compact('post'));
    }
}
