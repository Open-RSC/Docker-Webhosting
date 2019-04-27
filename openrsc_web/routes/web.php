<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');
Route::get('/items', 'ItemController@index')->name('items');
Route::get('/itemdef/{id}', 'ItemController@show')->name('itemdef');
Route::resource('news','news_postController');
