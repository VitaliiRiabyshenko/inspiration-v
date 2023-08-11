<?php


use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
	return redirect()->route('home-locale', app()->getLocale());
})->name('home');

Route::group(['prefix' => '{locale}', 'where' => ['locale' => '[a-zA-Z]{2}'], 'middleware' => 'setlocale'], function () {
	Route::get('/', 'HomeController@index')->name('home-locale');
	Route::post('/form', 'HomeController@getForm')->name('home-form');
	Route::get('/oferta', 'OfertaController@index')->name('oferta');
});

Route::prefix('/admin')->group(function () {
	Route::get('/login', 'Auth\AdminAuthController@getLogin')->name('adminLogin');
	Route::post('/login', 'Auth\AdminAuthController@postLogin')->name('adminLoginPost');
	Route::get('/logout', 'Auth\AdminAuthController@logout')->name('adminLogout');
});