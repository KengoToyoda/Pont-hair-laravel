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
            'password' => '11111111',
            'name' => 'OriginUser',
            'email' => 'origin@gmail.com',
        ]);
        
    }
}
