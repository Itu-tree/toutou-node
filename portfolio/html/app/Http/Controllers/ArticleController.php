<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::inStatus(['public'])->get();
        return view('guest.article.index', ['articles' => $articles]);
    }

    public function show(Article $article)
    {
        return view('guest.article.show', ['article' => $article]);
    }

    public function showAdmin(Article $article)
    {
        return view('auth.article.show', ['article' => $article]);
    }

    public function manage()
    {
        $articles = Article::all();
        return view('auth.article.index', ['articles' => $articles]);
    }

    public function create()
    {
        $article = Article::init();
        return view('auth.article.edit', ['article' => $article]);
    }

    public function edit(Article $article)
    {
        return view('auth.article.edit', ['article' => $article]);
    }

    // public function store(Request $request, article $article)
    // {
    //     $article = article::create($request->only('title', 'body', 'mdbody', 'state'));
    //     return redirect(route('admin.article.manage'));
    // }

    public function update(Request $request, Article $article)
    {
        $article = $article->fill($request->only('title', 'body', 'mdbody', 'state'))->save();
        return redirect(route('admin.article.manage'));
    }
}
