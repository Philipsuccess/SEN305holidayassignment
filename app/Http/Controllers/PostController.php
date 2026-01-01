<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    // ADMIN: list all posts
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    // ADMIN: show create form
    public function create()
    {
        return view('posts.create');
    }

    // ADMIN: store post
    public function store(Request $request)
    {
        Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'is_published' => $request->has('is_published'),
            'user_id' => auth()->id(),
        ]);

        return redirect('/admin/posts');
    }

    // ADMIN: show edit form
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    // ADMIN: update post
    public function update(Request $request, Post $post)
    {
        $post->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'is_published' => $request->has('is_published'),
        ]);

        return redirect('/admin/posts');
    }

    // ADMIN: delete post
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/admin/posts');
    }

    // PUBLIC: list published posts
    // public function publicIndex()
    // {
    //     $posts = Post::where('is_published', true)->get();
    //     return view('posts.public', compact('posts'));
    // }

    // PUBLIC: single post by slug
    public function show($slug)
    {
        $post = Post::where('slug', $slug)
                    ->where('is_published', true)
                    ->firstOrFail();

        return view('posts.show', compact('post'));
    }

    public function publicIndex()
{
    // Fetch only published posts
    $posts = \App\Models\Post::where('is_published', true)
                ->orderBy('created_at', 'desc')
                ->get();

    return view('home', compact('posts'));
}
}