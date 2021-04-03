<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        if (App::environment('local')) {
            // 環境はlocal
            $this->call(UsersTableSeeder::class);
            $this->call(ArticlesTableSeeder::class);
            $this->call(TagsTableSeeder::class);
        } else if (App::environment(['production'])) {
            // 環境はproduction
            //$this->call(TagsTableSeeder::class);
        }
    }
}
