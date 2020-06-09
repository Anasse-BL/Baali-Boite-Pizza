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


Route::get('/layout', function () {
    return view('layout');
});

Route::resource('/produits','ProduitController')->only(['index','show']);
Route::get('/produits','ProduitController@index')->name('produits.index');
Route::get('/produits/{id}','ProduitController@show')->name('produits.show');

Route::resource('/catproduits','CatproduitController')->only(['index','show']);


Route::get('/home', function () {
    return view('homes\home');
});

Route::post('/panier/ajouter','CartController@store')->name('cart.store');

Route::get('/panier','CartController@index')->name('cart.index');


Route::get('/videpanier',function(){
    Cart::destroy();
});

Route::delete('/panier/{rowID}','CartController@destroy')->name('cart.destroy');


Route::get('/paiement','PaiementController@index')->name('paiement.index');

Route::post('paiement','PaiementController@store')->name('paiement.store');

Route::get('/merci','PaiementController@thankyou')->name('paiement.thankyou');

