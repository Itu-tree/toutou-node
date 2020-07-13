<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Article;
use Carbon\Carbon;

class FrontController extends Controller
{
    //
    public function sitemap()
    {
        $sitemap = App::make('sitemap');
        $now = Carbon::now();
        $sitemap->add(route('top'), $now, '1.0', 'daily');
        $articles = Article::inStatus(['public'])->latest('updated_at')->get();
        foreach ($articles as $article) {
            # code...
            $sitemap->add(route('article.show', ['article' => $article->id]), $article->updated_at, '1.0', 'weekly');
        }

        return $sitemap->render('xml');
    }

    public function showPrivacy()
    {
        return view('guest.privacy');
    }
}
