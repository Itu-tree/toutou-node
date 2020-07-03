<?php

namespace App\Http\Controllers;

use App\Article;
use App\ArticleTag;
use App\Tag;
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
        return view('auth.article.edit', ['article' => $article, 'tags' => Tag::all()]);
    }

    // public function store(Request $request, article $article)
    // {
    //     $article = article::create($request->only('title', 'body', 'mdbody', 'state'));
    //     return redirect(route('admin.article.manage'));
    // }

    public function update(Request $request, Article $article)
    {
        $article->fill($request->only('title', 'body', 'mdbody', 'state'))->save();
        //tagの名前がuniqueか
        //tagの新規作成
        //$tag = Tag::create(['name'=>$tag_name])
        //articletagの更新
        //dd($request->tags);
        // foreach ($request->tags as $tag) {
        //     ArticleTag::create(['article_id' => $article->id, 'tag_id' => $tag->id]);
        // }
        return redirect(route('admin.article.manage'));
    }
}
