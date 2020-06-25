<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => 'test',
            'email' => 'test@gmail.com',
            'password' => Hash::make('password'), // この場合、「my_secure_password」でログインできる
        ]);
    }
}
