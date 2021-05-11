<?php

namespace Database\seeds;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'id' => 1,
            'category' => 'ヘアカラー',
        ]);
        DB::table('categories')->insert([
            'id' => 2,
            'category' => 'トリートメント',
        ]);
        DB::table('categories')->insert([
            'id' => 3,
            'category' => 'カット',
        ]);
        DB::table('categories')->insert([
            'id' => 4,
            'category' => 'ブリーチ',
        ]);
        DB::table('categories')->insert([
            'id' => 5,
            'category' => 'パーマ',
        ]);
        DB::table('categories')->insert([
            'id' => 6,
            'category' => 'エクステ',
        ]);
        DB::table('categories')->insert([
            'id' => 7,
            'category' => '縮毛矯正',
        ]);
        DB::table('categories')->insert([
            'id' => 8,
            'category' => 'ヘッドスパ',
        ]);

    }
}
