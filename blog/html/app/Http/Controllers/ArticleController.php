<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use App\Usecases\Tag\UpdateArticleTags;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::inStatus(['public'])->latest('updated_at')->get();
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
        $articles = Article::latest('updated_at')->get();
        return view('auth.article.index', ['articles' => $articles]);
    }

    public function managePublic()
    {
        $articles = Article::inStatus(['public'])->latest('updated_at')->get();
        return view('auth.article.index', ['articles' => $articles]);
    }

    public function manageDraft(Article $article)
    {
        $articles = Article::inStatus(['draft'])->latest('updated_at')->get();
        return view('auth.article.index', ['articles' => $articles]);
    }

    public function create()
    {
        $article = Article::init();
        return view('auth.article.edit', ['article' => $article, 'tags' => Tag::all()]);
    }

    public function edit(Article $article)
    {
        return view('auth.article.edit', ['article' => $article, 'tags' => Tag::all()]);
    }

    public function update(Request $request, Article $article, UpdateArticleTags $updateTag)
    {
        $article->fill($request->only('title', 'body', 'mdbody', 'state'))->save();
        $updateTag($article->id, $article->tags()->pluck('name')->toArray(), $request->tags[0] == null ? [] : $request->tags);
        return redirect(route('admin.article.manage'));
    }

    public function delete(Article $article)
    {
        if ($article->state == "draft") {
            $article->delete();
        }
        return redirect(route('admin.article.manage-draft'));
    }
}
