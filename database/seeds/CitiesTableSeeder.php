<?php

use Illuminate\Database\Seeder;
use App\Models\City;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CitiesTableSeeder extends Seeder
{
    use App\Models\Cities;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::truncate();
        foreach ($this->cities as $city) {
            City::create($city);
        }
    }
}
