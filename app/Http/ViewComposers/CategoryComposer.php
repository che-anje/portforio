<?php

namespace App\Http\ViewComposers;
use Illuminate\View\View;
use App\Models\Category;

class CategoryComposer {

    /**
     * @var String
     */
    protected $categories;

    public function __construct()
    {
        $this->categories = Category::orderby('id', 'asc')->get();

        foreach($this->categories as $category) {
            $category['genres'] = $category->genres()->orderby('id')->get();
            $category['image_path'] = $category->getImagePathAttributes();
        }
    }

    /**
     * Bind data to the view.
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        // Viewからは $sexesでアクセスできるようになります
        $view->with('categories', $this->categories);
    }
}