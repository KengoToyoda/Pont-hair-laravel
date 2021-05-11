<?php

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
         DB::table('users')->insert([
            'id' => 1,
            'password' => ENV('USER_ORIGIN_PASS'),
            'email' => ENV('USER_ORIGIN_EMAIL'),
            'name' => ENV('USER_ORIGIN_NAME'),
        ]);
        
    }
}
