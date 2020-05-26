<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::any('/posts/submit', 'PostController@submit')->name('posts.submit')->middleware('auth');
Route::any('/posts/view/{slug}', 'PostController@view')->name('posts.view');

Route::any('/profile/{id}', 'UserController@profile')->name('users.profile');
