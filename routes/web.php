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

Route::prefix('penjual')->group(function(){
	Route::get('/register', 'Auth\PenjualLoginController@showRegisterForm')->name('penjual.register');
	Route::post('/register', 'Auth\PenjualLoginController@register')->name('penjual.register.submit');
	Route::get('/login', 'Auth\PenjualLoginController@showLoginForm')->name('penjual.login');
	Route::post('/login', 'Auth\PenjualLoginController@login')->name('penjual.login.submit');
	Route::get('/', 'PenjualController@index')->name('penjual.dashboard');
	Route::get('/logout', 'Auth\PenjualLoginController@logout')->name('penjual.logout');
});

// Route::get('/foodprofil', 'BarangDijualController@foodProfil');
// Route::prefix('foodprofil')->group(function(){
// 	Route::get('/', 'BarangDijualController@foodProfil');
// 	Route::post('/rate', 'BarangDijualController@foodProfilRate')->name('foodprofil.rate');
// });

// Route::get('/profil', function () {
//     return view('profil.index');
// });

Route::prefix('profil')->group(function(){
	Route::get('/edit', 'UserController@profile')->name('profil.index');
	Route::post('/save', 'UserController@edit')->name('profil.edit');
	Route::get('/', 'UserController@post')->name('profil.post');
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
	Route::prefix('foodprofil')->group(function(){
		Route::get('/{id}', 'BarangDijualController@foodProfil')->name('foodprofil');
		Route::post('/rate', 'BarangDijualController@foodProfilRate')->name('foodprofil.rate');
		Route::post('/komen', 'BarangDijualController@foodProfilKomen')->name('foodprofil.komen');
	});
});
Route::resource('marketplace','BarangDijualController');
