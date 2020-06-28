<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function edit() {
        return view('category_image');
    }

    public function up(Request $request) {
        $category = Category::find(3);
        
        if($request->file('category_image')) {
            Storage::delete('public/Images/'.$category->image);
            $originalImg = $request->category_image;
            $filePath = $originalImg->store('public/CategoryImages');
            $category->image = str_replace('public/CategoryImages/', '', $filePath);
        }
        $category->save();
    }
}
