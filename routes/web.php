<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::any('/posts/submit', 'PostController@submit')->name('posts.submit');
