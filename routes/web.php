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
    return redirect('categories');
});

Route::get('/items', 'ItemsController@index')->name('items');
Route::get('/items/create', 'ItemsController@create')->name('items.create');
Route::post('/items/store', 'ItemsController@store')->name('items.store');
Route::get('/items/{id}', 'ItemsController@show')->name('items.show');
Route::get('/items/{id}/edit', 'ItemsController@edit')->name('items.edit');
Route::put('/items/{id}/update', 'ItemsController@update')->name('items.update');


Route::get('/categories', 'CategoriesController@index')->name('categories');
Route::get('/categories/create', 'CategoriesController@create')->name('categories.create');
Route::post('/categories/store', 'CategoriesController@store')->name('categories.store');
Route::get('/categories/{id}', 'CategoriesController@show')->name('categories.show');
Route::get('/categories/{id}/edit', 'CategoriesController@edit')->name('categories.edit');
Route::put('/categories/{id}/update', 'CategoriesController@update')->name('categories.update');