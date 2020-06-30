<?php

use App\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
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
            $tag = new Tag();
            $tag->name = "test" . "tag" . $i;
            $tag->save();
        }
    }
}
