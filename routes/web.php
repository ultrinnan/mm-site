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

/**
 * admin chapter
 */
Route::get('/dashboard', 'AdminController@index');


Route::get('/', function () {
    return view('general/index');
});

Route::get('/about', function () {
    return view('general/about');
});

Route::get('/services', function () {
    return view('general/services');
});

Route::get('/invest', function () {
    return view('general/invest');
});

Route::get('/contacts', function () {
    return view('general/contacts');
});

Route::get('/shop', 'ShopController@index');
Route::get('/news', 'NewsController@index');

Route::get('/blog', 'BlogController@index');
Route::get('/blog/{slug}', 'BlogController@view');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);
});

