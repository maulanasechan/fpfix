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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/user/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::get('/foodrecipe/appetaizer', function () {
    return view('foodrecipe.appetaizer');
});
// Route::get('/profil', function () {
//     return view('profil.index');
// });
Route::get('profil', 'UserController@profile');
Route::post('profile', 'UserController@update_avatar');

Route::prefix('admin')->group(function(){
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/', 'AdminController@index')->name('admin.dashboard');
	Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});

Route::get('/foodprofil', function () {
    return view('foodprofil.index');
});
Route::get('/foodrecipe', function () {
    return view('foodrecipe.index');
});
// Route::get('/marketplace', function () {
//     return view('marketplace.index');
// });
Route::resource('marketplace','BarangDijualController');
