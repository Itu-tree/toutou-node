<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index()
    {
        $posts = Post::inStatus(['public'])->get();
        return view('guest.post.index', ['posts' => $posts]);
    }

    public function show(Post $post)
    {
        return view('guest.post.show', ['post' => $post]);
    }

    public function showAdmin(Post $post)
    {
        return view('auth.post.show', ['post' => $post]);
    }

    public function manage()
    {
        $posts = Post::all();
        return view('auth.post.index', ['posts' => $posts]);
    }

    public function create()
    {
        $post = Post::init();
        return view('auth.post.create', ['post' => $post]);
    }

    public function edit(Post $post)
    {
        return view('auth.post.edit', ['post' => $post]);
    }

    public function store(Request $request)
    {
        $post = Post::create($request->only('title', 'body', 'mdbody', 'state'));
        return redirect(route('admin.post.manage'));
    }

    public function update(Request $request, Post $post)
    {
        $post = $post->fill($request->only('title', 'body', 'mdbody', 'state'))->save();
        return redirect(route('admin.post.manage'));
    }
}
