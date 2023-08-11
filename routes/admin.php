<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ApplicationStatusController;
use App\Http\Controllers\Admin\HomePage\ServicesController;
use App\Http\Controllers\Admin\HomePage\VisaTypesController;
use App\Http\Controllers\Admin\HomePage\AdvantagesController;
use App\Http\Controllers\Admin\HomePage\VisaCategoriesController;

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {

	Route::get('/', 'AdminController@index')->name('admin.index');
	Route::group(['prefix' => 'application'], function () {
		Route::get('/{id}', 'AdminController@show')->name('user-application.show');
		Route::patch('/{id}', 'AdminController@update')->name('user-application.update');
		Route::delete('/{id}', 'AdminController@destroy')->name('user-application.destroy');
	});

	Route::post('/mark-as-read', 'AdminController@markNotification')->name('markNotification');
	Route::group(['namespace' => 'Admin'], function () {
		Route::resource('/application-status', ApplicationStatusController::class)->except(['show', 'destroy']);
		
		Route::group(['prefix' => 'meta'], function () {
			Route::group(['prefix' => '{route}'], function () {
				Route::get('/', 'MetaTagsController@show')->name('meta.show');
				Route::get('/create', 'MetaTagsController@create')->name('meta.create');
				Route::post('/', 'MetaTagsController@store')->name('meta.store');
				Route::get('/edit', 'MetaTagsController@edit')->name('meta.edit');
				Route::put('/', 'MetaTagsController@update')->name('meta.update');
				Route::delete('/{id}', 'MetaTagsController@destroy')->name('meta.destroy');
			});
		});

		Route::group(['namespace' => 'HomePage'], function () {
			Route::resource('/advantages', AdvantagesController::class)->except(['show']);
			Route::resource('/services', ServicesController::class)->except(['show']);
			Route::resource('/visa-types', VisaTypesController::class)->except(['show']);
			Route::resource('/visa-categories', VisaCategoriesController::class)->except(['show']);

			Route::group(['prefix' => 'reviews'], function () {
				Route::get('/', 'ReviewsImgController@index')->name('reviews.index');
				Route::post('/', 'ReviewsImgController@store')->name('reviews.store');
				Route::patch('/', 'ReviewsImgController@update')->name('reviews.update');
				Route::delete('/{id}', 'ReviewsImgController@destroy')->name('reviews.destroy');
			});

			Route::group(['prefix' => 'visas'], function () {
				Route::get('/', 'VisasImgController@index')->name('visas.index');
				Route::post('/', 'VisasImgController@store')->name('visas.store');
				Route::patch('/', 'VisasImgController@update')->name('visas.update');
				Route::delete('/{id}', 'VisasImgController@destroy')->name('visas.destroy');
			});
		});

		Route::group(['prefix' => 'contacts'], function () {
			Route::get('/', 'ContactsController@index')->name('contacts.index');
			Route::post('/', 'ContactsController@store')->name('contacts.store');
		});
	});
});
