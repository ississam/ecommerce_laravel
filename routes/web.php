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
use App\Http\Controllers\PayementController;
use App\Http\Controllers\CartController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/boutique','ProductController@index')->name('products.index');
Route::get('boutique/{slug}','ProductController@show')->name('products.show');
Route::post('/panier/ajouter','CartController@store')->name('cart.store');
// Route::get('/videpanier', function(){   On a plus besoin a cette route
//      Cart::destroy();
// });

Route::get('/panier','CartController@index')->name('cart.index');
Route::patch('/panier/{rwId}','CartController@update')->name('cart.update');
Route::delete('/panier/{rwId}', 'CartController@destroy')->name('cart.destroy');

/*  les routes de payement */

Route::get('/paiement','PayementController@index')->name('payement.index');
Route::post('/paiement','PayementController@store')->name('payement.store');
Route::get('/merci', 'PayementController@thankyou')->name('payement.thankyou');




