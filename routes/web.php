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
	Route::get('/user', 'AdminController@userTable')->name('admin.user');
	Route::get('/penjual', 'AdminController@penjualTable')->name('admin.penjual');
	Route::get('/rating', 'AdminController@ratingTable')->name('admin.rating');
	Route::get('/komentar', 'AdminController@komentarTable')->name('admin.komentar');
	Route::get('/report', 'AdminController@reportTable')->name('admin.report');
	Route::get('/marketplace', 'AdminController@marketplaceTable')->name('admin.marketplace');
	Route::get('/foodrecipe', 'AdminController@foodrecipeTable')->name('admin.foodrecipe');
	Route::get('/transaksi', 'AdminController@transaksiTable')->name('admin.transaksi');
	Route::get('/', 'AdminController@index')->name('admin.dashboard');
	Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
	Route::post('/deleteItem', 'AdminController@deleteItem')->name('admin.deleteItem');
});

Route::prefix('penjual')->group(function(){
	Route::get('/register', 'Auth\PenjualLoginController@showRegisterForm')->name('penjual.register');
	Route::post('/register', 'Auth\PenjualLoginController@register')->name('penjual.register.submit');
	Route::get('/login', 'Auth\PenjualLoginController@showLoginForm')->name('penjual.login');
	Route::post('/login', 'Auth\PenjualLoginController@login')->name('penjual.login.submit');
	Route::get('/logout', 'Auth\PenjualLoginController@logout')->name('penjual.logout');
	
	Route::get('/', 'PenjualController@index')->name('penjual.dashboard');
	
	Route::resource('product','ProductController');
	Route::resource('order','OrderController');
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
	Route::get('/list', 'UserController@list')->name('profil.list');
	Route::get('/detail/{id}', "UserController@detail")->name('profil.detail');
	Route::post('/uploadBukti', 'UserController@uploadBukti')->name('profil.uploadBukti');
	Route::post('/diterima', "UserController@barangDiterima")->name('profil.barangDiterima');
});
// Route::get('/foodrecipe', function () {
//     return view('foodrecipe.index');
// });
Route::prefix('foodrecipe')->group(function(){
	Route::get('/dessert', 'ResepController@dessert')->name('foodrecipe.dessert');
	Route::get('/maincourse', 'ResepController@maincourse')->name('foodrecipe.maincourse');
	Route::get('/appetaizer', 'ResepController@appetaizer')->name('foodrecipe.appetaizer');
	Route::prefix('resepprofil')->group(function(){
		Route::get('/{id}', 'ResepController@resepProfil')->name('resepprofil');
		Route::post('/rate', 'ResepController@resepProfilRate')->name('resepprofil.rate');
		Route::post('/komen', 'ResepController@resepProfilKomen')->name('resepprofil.komen');
		Route::post('/report', 'ResepController@resepProfilReport')->name('resepprofil.report');
	});
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
		Route::post('/report', 'BarangDijualController@foodProfilReport')->name('foodprofil.report');
		Route::post('/buy', 'BarangDijualController@buyFood')->name('buyFood');
		Route::post('/uploadBukti', 'BarangDijualController@uploadBukti')->name('uploadBukti');
	});
});

Route::resource('marketplace', 'BarangDijualController');

Route::get('/profil/detail', function () {
    return view('profil.detail');
});