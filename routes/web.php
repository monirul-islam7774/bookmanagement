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

Route::get('/',function (){
    return view('addBooks');
});

Route::post('add-books','BookController@addBook')->name('book.save');
Route::get('show-books','BookController@showBook');
Route::post('fetchData','BookController@fetchData')->name('fetchData');