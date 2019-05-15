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
Route::post('/logout', 'Auth\LoginController@userLogout')->name('user.logout');

// Route::get('/profil', function () {
//     return view('profil.index');
// });
// Route::get('profil', 'UserController@profile');
// Route::post('profile', 'UserController@update_avatar');

Route::prefix('admin')->group(function(){
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/', 'AdminController@index')->name('admin.dashboard');
	Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});

Route::get('/foodprofil', function () {
    return view('foodprofil.index');
});
// Route::get('/profil', function () {
//     return view('profil.index');
// });

Route::prefix('profil')->group(function(){
	Route::get('/', 'UserController@profile')->name('profil.index');
	Route::post('/edit', 'UserController@edit')->name('profil.edit');
});
// Route::get('/foodrecipe', function () {
//     return view('foodrecipe.index');
// });
Route::prefix('foodrecipe')->group(function(){
	Route::get('/dessert', 'ResepController@dessert')->name('foodrecipe.dessert');
	Route::get('/maincourse', 'ResepController@maincourse')->name('foodrecipe.maincourse');
	Route::get('/appetaizer', 'ResepController@appetaizer')->name('foodrecipe.appetaizer');

});
Route::resource('foodrecipe','ResepController');


// Route::get('/marketplace', function () {
//     return view('marketplace.index');
// });
Route::prefix('marketplace')->group(function(){
	Route::get('/dessert', 'BarangDijualController@dessert')->name('marketplace.dessert');
	Route::get('/appetaizer', 'BarangDijualController@appetaizer')->name('marketplace.appetaizer');
	Route::get('/maincourse', 'BarangDijualController@maincourse')->name('marketplace.maincourse');
});
Route::resource('marketplace','BarangDijualController');
