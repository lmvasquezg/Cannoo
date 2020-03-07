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


Route::get('/', 'HomeController@index')->name('home.index');
Route::get('/home', 'HomeController@index')->name('home.index');
Route::get('/product/create', ['middleware' => 'auth', 'uses' => 'ProductController@create'])->name("product.create");
Route::post('/product/save', ['middleware' => 'auth', 'uses' => 'ProductController@save'])->name("product.save");
Route::get('/product/show', ['middleware' => 'auth', 'uses' => 'ProductController@show'])->name("product.show");
Route::get('/product/show/{id}', ['middleware' => 'auth', 'uses' => 'ProductController@showProduct'])->name("product.showProduct");
Route::post('/product/delete/{id}', ['middleware' => 'auth', 'uses' => 'ProductController@delete'])->name("product.delete");
Route::get('/product/updateDescription/{id}', ['middleware' => 'auth', 'uses' => 'ProductController@changeDescription'])->name("product.update");
Route::post('/product/update/{id}', ['middleware' => 'auth', 'uses' => 'ProductController@update'])->name("product.updateDescription");
Route::get('/certificate/show', ['middleware' => 'auth', 'uses' => 'CertificateController@show'])->name("certificate.show");
Route::get('/certificate/create', ['middleware' => 'auth', 'uses' => 'CertificateController@create'])->name("certificate.create");
Route::post('/certificate/save', ['middleware' => 'auth', 'uses' => 'CertificateController@save'])->name("certificate.save");
Route::get('/client', ['middleware' => 'auth', 'uses' => 'ClientController@index'])->name("client.index");
Route::get('/client/create', ['middleware' => 'auth', 'uses' => 'ClientController@create'])->name("client.create");
Route::post('/client/save', ['middleware' => 'auth', 'uses' => 'ClientController@save'])->name("client.save");
Route::get('/client/show', ['middleware' => 'auth', 'uses' => 'ClientController@showAll'])->name("client.show");
Route::get('/client/show/{id}', ['middleware' => 'auth', 'uses' => 'ClientController@showClient'])->name("client.showClient");
Route::post('/client/delete/{id}', ['middleware' => 'auth', 'uses' => 'ClientController@delete'])->name("client.delete");
Route::get('/pets/show', ['middleware' => 'auth', 'uses' => 'PetsController@show'])->name("pets.show");
Route::get('/pets/create', ['middleware' => 'auth', 'uses' => 'PetsController@create'])->name("pets.create");
Route::post('/pets/save', ['middleware' => 'auth', 'uses' => 'PetsController@save'])->name("pets.save");
Route::get('/pets/pet/{id}', ['middleware' => 'auth', 'uses' => 'PetsController@pet'])->name("pets.pet");
Route::post('/pets/erase/{id}', ['middleware' => 'auth', 'uses' => 'PetsController@erase'])->name("pets.erase");
Route::get('/order', ['middleware' => 'auth', 'uses' => 'OrderController@index'])->name("order.index");
Route::get('/order/addAnimal/{id}', ['middleware' => 'auth', 'uses' => 'OrderController@addAnimal'])->name("order.addAnimal");
Route::get('/order/addItem/{id}', ['middleware' => 'auth', 'uses' => 'OrderController@addItem'])->name("order.addItem");
Route::get('/order/deleteAnimal/{id}', ['middleware' => 'auth', 'uses' => 'OrderController@deleteAnimal'])->name("order.deleteAnimal");
Route::get('/order/deleteItem/{id}', ['middleware' => 'auth', 'uses' => 'OrderController@deleteItem'])->name("order.deleteItem");


Auth::routes();
