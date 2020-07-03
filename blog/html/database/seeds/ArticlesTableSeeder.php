<?php

use App\Article;
use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $n = 10;
        for ($i = 0; $i < $n; $i++) {
            # code...
            $article = new Article;
            $article->title = "test" . "public" . $i;
            $article->body = "test" . "public" . $i;
            $article->mdbody = "test" . "public" . $i;
            $article->state = "public";
            $article->save();
        }

        $n = 10;
        for ($i = 0; $i < $n; $i++) {
            # code...
            $article = new Article;
            $article->title = "test" . "draft" . $i;
            $article->body = "test" . "draft" . $i;
            $article->mdbody = "test" . "draft" . $i;
            $article->state = "draft";
            $article->save();
        }
    }
}
