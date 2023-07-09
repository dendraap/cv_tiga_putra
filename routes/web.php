<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RolesController;

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
    return view('auth.login');
})->name('login');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');

	Route::get('kehadiran', function () {
		return view('pages.kehadiran');
	})->name('kehadiran');

	Route::get('daftar_pesanan', function () {
		return view('pages.daftar_pesanan');
	})->name('daftar_pesanan');

	// Route::get('/branchs/create', function() {
	// 	return view('pages.cabangs.create');
	// })->name('add_branch');

	// Route::get('/branchs/edit', function() {
	// 	return view('pages.cabangs.edit');
	// })->name('edit_branch');

	// Route::get('/dropshippers/create', function() {
	// 	return view('pages.dropshippers.create');
	// })->name('add_dropshippers');

	// Route::get('/dropshippers/edit', function() {
	// 	return view('pages.dropshippers.edit');
	// })->name('edit_dropshippers');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('/user', 'App\Http\Controllers\UserController');
	Route::resource('/roles', RolesController::class);
	Route::resource('/products', ProductsController::class);
	Route::resource('/dropshippers', 'App\Http\Controllers\DropshippersController');
	Route::resource('/branchs', 'App\Http\Controllers\CabangsController');
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
	// Route::get('products', ['as' => 'products.index', 'uses' => 'App\Http\Controllers\ProductsController@show']);
	Route::get('/user/create', 'App\Http\Controllers\UserController@option');
	// Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
});

