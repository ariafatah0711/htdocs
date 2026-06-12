<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Firefly\FilamentBlog\Http\Controllers\PostController as BasePostController;
use Firefly\FilamentBlog\Models\Post;

class PostController extends BasePostController
{
    public function index(Request $request)
    {
        $posts = Post::query()
            ->with(['categories', 'user', 'tags'])
            ->published()
            ->latest()
            ->paginate(10);

        return view('filament-blog::blogs.index', [
            'posts' => $posts,
        ]);
    }
}
