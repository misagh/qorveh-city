@extends('layouts.app')

@section('content')
    <div class="card-columns">
        @foreach($posts as $post)
        <div class="card p-2 border-0 shadow-sm-bold">
            <a href="{{ route('posts.view', $post->slug) }}"><img src="{{ $post->thumbnail_image }}" class="card-img-top" alt="{{ $post->title }}"></a>
            <div class="card-body">
                <h2 class="h4 font-weight-bold"><a class="text-dark card-title" href="{{ route('posts.view', $post->slug) }}">{{ $post->title }}</a></h2>
                <p class="card-text"><span>عکاس: </span><a class="text-dark" href="{{ route('users.profile', $post->user_id) }}">{{ $post->user->name }}</a></p>
            </div>
        </div>
        @endforeach
    </div>
@endsection
