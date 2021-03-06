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
Route::get('/product/create', ['middleware' => ['auth', 'role:admin'], 'uses' => 'ProductController@create'])->name("product.create");
Route::post('/product/save', ['middleware' => ['auth', 'role:admin'], 'uses' => 'ProductController@save'])->name("product.save");
Route::get('/product/show', ['middleware' => 'auth', 'uses' => 'ProductController@show'])->name("product.show");
Route::get('/product/show/{id}', ['middleware' => 'auth', 'uses' => 'ProductController@showProduct'])->name("product.showProduct");
Route::post('/product/delete/{id}', ['middleware' => ['auth', 'role:admin'], 'uses' => 'ProductController@delete'])->name("product.delete");
Route::get('/product/updateDescription/{id}', ['middleware' => ['auth', 'role:admin'], 'uses' => 'ProductController@changeDescription'])->name("product.update");
Route::post('/product/update/{id}', ['middleware' => ['auth', 'role:admin'], 'uses' => 'ProductController@update'])->name("product.updateDescription");
Route::get('/certificate/show', ['middleware' => 'auth', 'uses' => 'CertificateController@show'])->name("certificate.show");
Route::get('/certificate/create', ['middleware' => ['auth', 'role:admin'], 'uses' => 'CertificateController@create'])->name("certificate.create");
Route::post('/certificate/save', ['middleware' => ['auth', 'role:admin'], 'uses' => 'CertificateController@save'])->name("certificate.save");
Route::post('/certificate/delete/{id}', ['middleware' => ['auth', 'role:admin'], 'uses' => 'CertificateController@delete'])->name("certificate.delete");
Route::get('/client', ['middleware' => ['auth', 'role:admin'], 'uses' => 'ClientController@index'])->name("client.index");
Route::post('/client/makeAdmin/{id}', ['middleware' => ['auth', 'role:admin'], 'uses' => 'ClientController@makeAdmin'])->name("client.makeAdmin");
Route::get('/client/show', ['middleware' => ['auth', 'role:admin'], 'uses' => 'ClientController@showAll'])->name("client.show");
Route::get('/client/show/{id}', ['middleware' => ['auth', 'role:admin'], 'uses' => 'ClientController@showClient'])->name("client.showClient");
Route::post('/client/delete/{id}', ['middleware' => ['auth', 'role:admin'], 'uses' => 'ClientController@delete'])->name("client.delete");
Route::get('/animal/show', ['middleware' => 'auth', 'uses' => 'AnimalController@show'])->name("animal.show");
Route::get('/animal/create', ['middleware' => ['auth', 'role:admin'], 'uses' => 'AnimalController@create'])->name("animal.create");
Route::post('/animal/save', ['middleware' => ['auth', 'role:admin'], 'uses' => 'AnimalController@save'])->name("animal.save");
Route::get('/animal/show/{id}', ['middleware' => 'auth', 'uses' => 'AnimalController@pet'])->name("animal.pet");
Route::post('/animal/erase/{id}', ['middleware' => ['auth', 'role:admin'], 'uses' => 'AnimalController@erase'])->name("animal.erase");
Route::get('/order', ['middleware' => ['auth', 'role:client'], 'uses' => 'OrderController@index'])->name("order.index");
Route::post('/order/create', ['middleware' => 'auth', 'uses' => 'OrderController@create'])->name("order.create");
Route::get('/animal/removeFromOrder/{id}', ['middleware' => 'auth', 'uses' => 'AnimalController@deleteFromSession'])->name("animal.desorder");
Route::get('/animal/addToOrder/{id}', ['middleware' => 'auth', 'uses' => 'AnimalController@addToSession'])->name("animal.order");
Route::get('/item/create/{id}', ['middleware' => 'auth', 'uses' => 'ItemController@create'])->name("item.create");
Route::get('/item/save/{id}', ['middleware' => 'auth', 'uses' => 'ItemController@save'])->name("item.save");
Route::get('/item/delete/{id}', ['middleware' => 'auth', 'uses' => 'ItemController@delete'])->name("item.delete");
Route::post('/session/save', ['middleware' => 'auth', 'uses' => 'SessionController@save'])->name("session.save");
Route::post('/session/delete', ['middleware' => 'auth', 'uses' => 'SessionController@delete'])->name("session.delete");
Route::get('/flush', ['middleware' => 'auth', 'uses' => 'OrderController@flush'])->name("order.flush");
Route::get('/order/addAnimal/{id}', ['middleware' => 'auth', 'uses' => 'OrderController@addAnimal'])->name("order.addAnimal");
Route::get('/order/showOrder/{id}', ['middleware' => 'auth', 'uses' => 'OrderController@showOrder'])->name("order.showOrder");
Route::get('/order/show', ['middleware' => 'auth', 'uses' => 'OrderController@show'])->name("order.show");
Route::get('/order/addItem/{id}', ['middleware' => 'auth', 'uses' => 'OrderController@addItem'])->name("order.addItem");
Route::post('/order/deleteAnimal/{id}', ['middleware' => 'auth', 'uses' => 'OrderController@deleteAnimal'])->name("order.deleteAnimal");
Route::get('/order/deleteItem/{id}', ['middleware' => 'auth', 'uses' => 'OrderController@deleteItem'])->name("order.deleteItem");
Route::get('/contact', ['middleware' => 'auth', 'uses' => 'ContactController@index'])->name("contact.index");
Route::post('/contact/save', ['middleware' => 'auth', 'uses' => 'ContactController@save'])->name("contact.save");
Route::get('/contact/messages', ['middleware' => ['auth', 'role:admin'], 'uses' => 'ContactController@get'])->name("contact.messages");
Route::post('/contact/delete/{id}', ['middleware' => ['auth', 'role:admin'], 'uses' => 'ContactController@delete'])->name("contact.delete");
Route::get('/top5/animals',['middleware' => 'auth', 'uses' => 'Top5Controller@animals'])->name("top5.animals");
Route::get('/top5/products',['middleware' => 'auth', 'uses' => 'Top5Controller@products'])->name("top5.products");
Route::post('/product/like/{id}', ['middleware' => 'auth', 'uses' => 'ProductController@like'])->name("product.like");
Route::post('/animal/like/{id}', ['middleware' => 'auth', 'uses' => 'AnimalController@like'])->name("animal.like");
Auth::routes();
