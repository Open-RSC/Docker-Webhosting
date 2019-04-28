<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');
Route::get('/items', 'ItemController@index')->name('items');
Route::get('/itemdef/{id}', 'ItemController@show')->name('itemdef');
Route::resource('news','News_PostController');
Route::resource('news_responses', 'News_ResponseController', ['except' => ['index', 'create', 'show']]);

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
