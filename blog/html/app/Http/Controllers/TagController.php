<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;



class TagController extends Controller
{
    //
    public function showTags()
    {
        $tags = Tag::all();
        return view('guest.tag.index', ['tags' => $tags]);
    }

    public function showArticles(Tag $tag)
    {
        $articles = $tag->articles()->latest()->get();
        return view('guest.tag.show_articles', ['tag' => $tag, 'articles' => $articles]);
    }
}
