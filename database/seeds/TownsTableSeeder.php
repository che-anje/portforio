<?php

use Illuminate\Database\Seeder;
use App\Models\Town;

class TownsTableSeeder extends Seeder
{
    use App\Models\Towns;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Town::truncate();
        foreach ($this->towns as $town) {
            Town::create($town);
        }
}
