<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrefectureController extends Controller
{
    public function create(){
        $prefectures = \App\Models\Prefecture::orderBy('id','asc')->pluck('name');
        $prefectures = $prefectures -> prepend('未選択', '');

        return view('home')->with(['prefectures' => $prefectures]);
    }
}
