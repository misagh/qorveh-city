<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');

Route::get('/post', function ()
{
    return view('posts.view');
});

Auth::routes();

Route::any('/posts/submit', 'PostController@submit')->name('posts.submit');
