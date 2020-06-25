<?php

use App\Post;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
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
            $post = new Post;
            $post->title = "test" . "public" . $i;
            $post->body = "test" . "public" . $i;
            $post->state = "public";
            $post->save();
        }

        $n = 10;
        for ($i = 0; $i < $n; $i++) {
            # code...
            $post = new Post;
            $post->title = "test" . "draft" . $i;
            $post->body = "test" . "draft" . $i;
            $post->state = "draft";
            $post->save();
        }
    }
}
