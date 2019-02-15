<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/books','BookController@show');
Route::get('/books/filter','BookController@showfilter');
Route::get('/book/create','BookController@create');
Route::post('/book/save','BookController@store');


Route::get('/admin','AdminController@index');

Route::get('/admin/authors','AuthorsController@show');
Route::get('/admin/authors/filter','AuthorsController@showfilter');
Route::get('/admin/authors/create','AuthorsController@create');
Route::post('/admin/authors/save','AuthorsController@store');
Route::post('/admin/authors/verifydelete/{id}','AuthorsController@verifydelete');
Route::post('/admin/authors/delete/{id}','AuthorsController@destroy');


Route::get('/admin/categories','CategoriesController@show');
Route::get('/admin/categories/filter','CategoriesController@showfilter');
Route::get('/admin/categories/create','CategoriesController@create');
Route::post('/admin/categories/save','CategoriesController@store');
Route::post('/admin/categories/verifydelete/{id}','CategoriesController@verifydelete');
Route::post('/admin/categories/delete/{id}','CategoriesController@destroy');


//Route::get('/ardieinserts','AuthorsController@ardieInsertsData');
//Route::get('/ardieinserts','CategoriesController@ardieInsertsData');


// ---------- call later ----------
//Route::get('/ardieinserts','BookController@ardieInsertsData');

