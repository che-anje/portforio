<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prefecture;
use Illuminate\Support\Facades\Auth;

class CityController extends Controller
{
    public function getCityList($prefecture_id) {
        return  City::where('prefecture_id', $prefecture_id)->get();
    }
}
