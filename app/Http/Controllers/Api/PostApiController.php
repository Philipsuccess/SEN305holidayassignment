<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class PostApiController extends Controller
{
    // Fetch all published posts
    public function index()
    {
        return Post::where('is_published', true)->get();
    }

    // Fetch single post by slug
    public function show($slug)
    {
        return Post::where('slug', $slug)
                   ->where('is_published', true)
                   ->firstOrFail();
    }

    // Fetch comments for a post
    public function comments($slug)
    {
        $post = Post::where('slug', $slug)
                    ->where('is_published', true)
                    ->firstOrFail();

        return $post->comments;
    }

    // Submit a comment for a post
    public function storeComment(Request $request, $slug)
    {
        $request->validate([
            'author' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post = Post::where('slug', $slug)
                    ->where('is_published', true)
                    ->firstOrFail();

        return Comment::create([
            'author' => $request->author,
            'content' => $request->content,
            'post_id' => $post->id,
        ]);
    }
}