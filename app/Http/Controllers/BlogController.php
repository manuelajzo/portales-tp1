<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = BlogPost::where('is_published', true)
            ->orderBy('published_at', 'desc')
            ->get();

        return view('blog', compact('posts'));
    }

    public function show(BlogPost $post)
    {
        return view('blog.show', compact('post'));
    }
}
