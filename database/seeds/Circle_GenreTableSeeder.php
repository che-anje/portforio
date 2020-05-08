<?php

use Illuminate\Database\Seeder;

class Circle_GenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Circle_Genre')->insert([
            'circle_id' => '1',
            'genre_id' => '1',
        ]);
    }
}
