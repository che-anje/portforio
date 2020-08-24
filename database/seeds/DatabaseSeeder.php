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
        // $this->call(UsersTableSeeder::class);
        
        $this->call(AreasTableSeeder::class);
        $this->call(PrefecturesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ProfilesTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(GenresTableSeeder::class);
        $this->call(CirclesTableSeeder::class);
        $this->call(Circle_RankingTableSeeder::class);
        $this->call(Circle_UserTableSeeder::class);
        $this->call(Circle_GenreTableSeeder::class);
        $this->call(BoardsTableSeeder::class);
        $this->call(Board_UsersTableSeeder::class);
        /*$this->call(AreasTableSeeder::class);
        $this->call(Board_UsersTableSeeder::class);
        $this->call(BoardsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(Circle_GenreTableSeeder::class);
        $this->call(Circle_UserTableSeeder::class);
        $this->call(CirclesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(GenreTableSeeder::class);
        $this->call(PrefecturesTableSeeder::class);
        $this->call(ProfilesTableSeeder::class);
        $this->call(UsersTableSeeder::class);*/
    }
}
