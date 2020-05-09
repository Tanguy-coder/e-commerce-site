<?php

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Facades\Voyager;
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

Route::get('/','ShopController@index')->name('store.home');


/* Products Routes */

Route::get('/products','ProductController@index')->name('products.index');
Route::get('/product/{slug}','ProductController@show')->name('products.show');
Route::get('/search','ProductController@search')->name('products.search');

/* Cart Routes */
Route::get('/panier','CartController@index')->name('cart.index');
Route::post('/panier/ajouter','CartController@store')->name('cart.store');
Route::patch('/panier/{rowId}','CartController@update')->name('cart.update');
Route::delete('/panier/{rowId}','CartController@destroy')->name('cart.destroy');

/* Checkout Routes */
Route::get('/paiement','CheckoutController@index')->name('checkout.index');










Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
