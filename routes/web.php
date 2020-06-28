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


Auth::routes();
/* * * *  Frontend 

Route::get('/', function () {
    return view('frontend.index');
})->name('frontend.home');

Route::group(['prefix' => 'frontend'], function () {

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
* * * */

/* * * * * * *
 * Admin Backend
 * * * * * * */

Route::get('/backend', 'BackendController@index')->name('backend-home');

Route::group(['prefix' => 'backend'], function () {
    //Paiement
    Route::get('paiement/merci','PaiementController@thanks')->name('paiement.thanks');
    Route::resource('paiement', 'PaiementController');
});

Route::group(['prefix' => 'backend'], function () {

    Route::post('user/delete/{id}', 'UserController@delete')->name('user.delete');
    Route::get('user/data', 'UserController@data')->name('user.data');
    Route::get('user/info/{id}', 'CategoriesserviceController@findinfo')->name('user.findinfo');
    Route::resource('user', 'UserController');
});


Route::group(['prefix' => 'backend'], function () {

    Route::post('categoriesservice/descactiver/{id}', 'CategoriesserviceController@desactiver')->name('categoriesservice.desactiver');
    Route::post('categoriesservice/delete/{id}', 'CategoriesserviceController@delete')->name('categoriesservice.delete');
    Route::get('categoriesservice/data', 'CategoriesserviceController@data')->name('categoriesservice.data');
    Route::get('categoriesservice/info/{id}', 'CategoriesserviceController@findinfo')->name('categoriesservice.findinfo');
    Route::resource('categoriesservice', 'CategoriesserviceController');
});

Route::group(['prefix' => 'backend'], function () {
    Route::post('service/descactiver/{id}', 'ServiceController@desactiver')->name('service.desactiver');
    Route::post('service/delete/{id}', 'ServiceController@delete')->name('service.delete');
    Route::get('service/data', 'ServiceController@data')->name('service.data');
    Route::get('service/info/{id}', 'ServiceController@findinfo')->name('service.findinfo');
    Route::resource('service', 'ServiceController');
});



Route::resource('customer', 'CustomerController');
Route::resource('provider', 'ProviderController');
Route::resource('devis', 'DevisController');
Route::resource('ville', 'VilleController');




Route::get('/home', 'HomeController@index')->name('home');

