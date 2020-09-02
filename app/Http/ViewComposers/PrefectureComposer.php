<?php

namespace App\Http\ViewComposers;
use Illuminate\View\View;
use App\Models\Prefecture;
use App\Models\Profile;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PrefectureComposer {

    const ALL_PREFECTURE = 48;
    /**
     * @var String
     */
    protected $sexes;

    public function __construct()
    {
        $this->prefectures = Prefecture::orderBy('id','asc')->get();
        $this->my_prefecture = Prefecture::find($this->getSelectedPrefectureId());

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
        $view->with('my_prefecture', $this->my_prefecture);
    }

    protected function getSelectedPrefectureId(): int
    {
        if(Auth::check() && isset(Auth::user()->profile->prefectureOfInterest)) {
            return Auth::user()->profile->prefectureOfInterest;
        }
        if(session()->exists('my_prefecture')) {
            return session('my_prefecture');
        }
        return Prefecture::ALL_PREFECTURE;
    }
}