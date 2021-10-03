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
            'password' => bcrypt('11111111'),
            'name' => 'Stylist1',
            'email' => 'Stylist1@gmail.com',
        ]);
        DB::table('users')->insert([
            'id' => 2,
            'password' => bcrypt('22222222'),
            'name' => 'Stylist2',
            'email' => 'Stylist2@gmail.com',
        ]);
    }
}
