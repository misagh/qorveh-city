<?php

namespace App\Http\Controllers;

use App\Post;

class HomeController extends Controller {

    public function index()
    {
        $posts = (new Post)->where('verified', true)->orderByDesc('id')->take(20)->get();

        return view('home', compact('posts'));
    }
}
