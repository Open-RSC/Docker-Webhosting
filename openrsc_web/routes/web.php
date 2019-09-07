<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/worldmap', 'HomeController@world')->name('worldmap');
Route::get('/wilderness', 'HomeController@wilderness')->name('wilderness');
Route::get('/faq', 'HomeController@faq')->name('faq');

Route::get('/items', 'ItemController@index')->name('items');
Route::get('/itemdef/{id}', 'ItemController@show')->name('itemdef');
Route::get('itemautocomplete', 'ItemController@autocomplete')->name('itemautocomplete');

Route::get('/npcs', 'NpcController@index')->name('npcs');
Route::get('/npcdef/{id}', 'NpcController@show')->name('npcdef');

Auth::routes();
