<?php

namespace App\Http\ViewComposers;
use Illuminate\View\View;
use App\Models\Prefecture;

class PrefectureComposer {

    /**
     * @var String
     */
    protected $sexes;

    public function __construct()
    {
        $this->prefectures = Prefecture::orderBy('id','asc')->get();
    }

    /**
     * Bind data to the view.
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        // Viewからは $sexesでアクセスできるようになります
        $view->with('prefectures', $this->prefectures);
    }
}