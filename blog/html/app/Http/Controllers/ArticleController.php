<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use App\ArticleTag;
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

    public function update(Request $request, Article $article)
    {
        $article->fill($request->only('title', 'body', 'mdbody', 'state'))->save();

        $article_id = $article->id;
        $pre_tag_names = $article->tags()->pluck('name')->toArray();
        $new_tag_names = $request->tags[0] == null ? [] : $request->tags;

        //create Tag
        foreach ($new_tag_names as $tag_name) {
            Tag::firstOrCreate(['name' => $tag_name]);
        }
        //update articletag
        $add_tag_names = array_diff($new_tag_names, $pre_tag_names);
        $add_tag_ids = Tag::whereIn('name', $add_tag_names)->pluck('id');
        foreach ($add_tag_ids as $tag_id) {
            ArticleTag::firstOrCreate(['article_id' => $article_id, 'tag_id' => $tag_id]);
        }
        $delete_tag_names = array_diff($pre_tag_names, $new_tag_names);
        $delete_tag_ids = Tag::whereIn('name', $delete_tag_names)->pluck('id');
        ArticleTag::where('article_id', $article_id)->whereIn('tag_id', $delete_tag_ids)->delete();

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
