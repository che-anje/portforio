<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'HomeController@index');
Route::get('prefecture/{id}', 'PrefectureController@change')->name('prefecture.change')->where('id', '[0-9]+');

Route::get('genre', 'Homecontroller@insert')->name('genre.insert');

Auth::routes(['verify' => true]);
/*public function auth()
    {
        // Authentication Routes...
        $this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
        $this->post('login', 'Auth\LoginController@login');
        $this->post('logout', 'Auth\LoginController@logout')->name('logout');

        // Registration Routes...
        $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
        $this->post('register', 'Auth\RegisterController@register');

        // Password Reset Routes...
        $this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
        $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        $this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
        $this->post('password/reset', 'Auth\ResetPasswordController@reset');
    } */

Route::get('mypage', 'MyPageController@show')->name('mypage.show')->middleware('auth');
Route::get("reset/{token}", "UserController@reset");

Route::get('profile/create', 'ProfileController@showCreateForm')->name('profile');
Route::post('profile/create', 'ProfileController@create')->name('profile.create');
Route::get('profile/show/{id}', 'ProfileController@show')->name('profile.show')->where('id', '[0-9]+');
Route::get('profile/edit', 'ProfileController@showEditForm');
Route::get('/profile/{prefecture_id}/cities', 'CityController@getCityList')->name('cities.get');
Route::post('profile/edit/{id}', 'ProfileController@edit')->name('profile.edit');

Route::get('/category', 'CategoryController@edit');
Route::post('/category', 'CategoryController@up')->name('category.edit');

Route::get('circles/new', 'CircleController@showCreateForm');
Route::post('circle/new', 'CircleController@create')->name('circle.create');
Route::get('circle/{id}', 'CircleController@show')->name('circle.show')->where('id', '[0-9]+');
Route::get('my_circle/{id}/circle_menu', 'CircleController@showMyCircleMenu')->name('my_circle.menu');
Route::get('circle/{id}/circle_menu', 'CircleController@showCircleMenu')->name('circle.menu');
Route::get('/circle/{id}/edit', 'CircleController@showEditForm');
Route::get('/getCircleGenres/{id}', 'CircleController@getCircleGenres');
Route::post('/circle/{id}/edit', 'CircleController@edit')->name('circle.edit')->middleware('auth');
Route::delete('/circle/{id}/delete', 'CircleController@delete')->name('circle.delete')->middleware('auth');

//サークル一覧・探す
Route::get('/index/{pref_id}/{genre?}', 'CircleController@index')->name('circle.index');
Route::get('/circle/{category_id}/{pref_id}', 'CircleController@categorySearch');
Route::get('category_pref/{pref_id}/{category_id?}', 'PrefectureController@categoryPrefChange')->name('category_pref.change')->where('pref_id', '[0-9]+');
Route::get('/circles_pref/{pref_id}/{category_id?}', 'PrefectureController@circlePrefChange')->name('circles_pref.change')->where('pref_id', '[0-9]+');
Route::get('/list/{pref_id}/{genre?}', 'CircleController@circleList')->name('circle.list');

Route::post('/circle_user/apply', 'Circle_UserController@apply');
Route::get('/circle_user/{circle_id}/{user_id}', 'Circle_UserController@participate');

Route::get('/message', 'BoardController@index');
Route::get('/message/board/{board_id}', 'BoardController@show')->name('message.show');
Route::post('/message/store', 'MessageController@store')->name('message.store');
Route::get('/message/update', 'BoardController@update');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/etcetera', 'HomeController@etcetera')->middleware('auth');

Route::get('/image_upload', 'HomeController@add');
Route::post('/image_upload', 'HomeController@create');

