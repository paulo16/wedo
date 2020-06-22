<?php

use Illuminate\Support\Facades\Route;

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


/* * * *  Frontend * * * */


Route::group(['prefix' => 'frontend'], function () {
    Route::get('/', function () {
        return view('frontend.index');
    })->name('frontend.home');

    Route::get('/about', function () {
        return view('frontend.about');
    })->name('about');

    Route::get('/contact', function () {
        return view('frontend.contact');
    })->name('contact');

    Route::get('/categories-services', function () {
        return view('frontend.services.list-services');
    })->name('services');
});



/* * * * * * * 
 * Admin Backend
 * * * * * * */

Auth::routes();

Route::group(['prefix' => 'backend'], function () {



    Route::group(['prefix' => 'servicecategories'], function () {
        Route::post('/delete/{id}', 'CategoriesserviceController@delete')->name('categoriesservice.delete');
        Route::get('/data', 'CategoriesserviceController@data')->name('categoriesservice.data');
        Route::get('/info/{id}', 'CategoriesserviceController@findinfo')->name('categoriesservice.findinfo');
        Route::resource('categoriesservice', 'CategoriesserviceController');
    });

    Route::group(['prefix' => 'users'], function () {
        Route::post('/delete/{id}', 'UserController@delete')->name('user.delete');
        Route::get('/data', 'UserController@data')->name('user.data');
        Route::get('/info/{id}', 'CategoriesserviceController@findinfo')->name('user.findinfo');
        Route::resource('user', 'UserController');
    });

    Route::get('/', function () {
        return view('backend.dashbord.index');
    })->name('backend-home');
});




Route::resource('customer', 'CustomerController');
Route::resource('provider', 'ProviderController');
Route::resource('service', 'ServiceController');
Route::resource('devis', 'DevisController');
Route::resource('ville', 'VilleController');

Route::resource('payement', 'PayementController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
