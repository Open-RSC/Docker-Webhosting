<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/worldmap', 'HomeController@world')->name('worldmap');
Route::get('/wilderness', 'HomeController@wilderness')->name('wilderness');
Route::get('/faq', 'HomeController@faq')->name('faq');
Route::get('/chat', 'HomeController@chat')->name('chat');

Route::get('/items', 'ItemController@index')->name('items');
Route::get('/itemdef/{id}', 'ItemController@show')->name('itemdef');

Route::get('/npcs', 'NpcController@index')->name('npcs');
Route::get('/npcdef/{id}', 'NpcController@show')->name('npcdef');

Route::get('/highscores', 'HighscoresController@index')->name('highscores');
Route::get('/highscores/{id}', 'HighscoresController@show')->name('highscorestat');

Route::get('/chat_logs', 'AdminController@chat_logs')->middleware('is_admin')->name('chat_logs');

Auth::routes();
