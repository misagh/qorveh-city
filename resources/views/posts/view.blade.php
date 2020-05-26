@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-9 mb-3">
            <div class="card p-3 border-0 shadow-sm-bold">
                <div class="row">
                    <div class="col-12 text-center mb-4">
                        <img class="img-fluid" alt="full size image" src="{{ $post->full_image }}">
                    </div>
                    <div class="col-12">
                        <h1 class="font-weight-bold mb-4">{{ $post->title }}</h1>
                        <p>{{ $post->body }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card p-3 border-0 shadow-sm-bold mb-3">
                <h5 class="font-weight-bold text-center">عکاس</h5>
                <hr>
                <div class="text-center">
                    <a href="{{ route('users.profile', $post->user_id) }}"><img class="rounded-circle img-thumbnail" width="150" alt="{{ $post->user->name }}" src="{{ $post->user->avatar }}"></a>
                </div>
                <h5 class="text-center my-4 font-weight-bold"><a class="text-dark" href="">{{ $post->user->name }}</a></h5>
                <p>{{ $post->user->bio }}</p>
            </div>
            <div class="card p-3 border-0 shadow-sm-bold mb-3">
                <ul class="list-group list-group-flush px-0 fa-ul">
                    <li class="list-group-item d-flex justify-content-between align-items-center border-0">
                        <span class="fa-li"><i class="fas fa-tag"></i></span><a class="text-dark" href="">تگ</a>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center border-0">
                        <span class="fa-li"><i class="fas fa-tag"></i></span><a class="text-dark" href="">تگ</a>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center border-0">
                        <span class="fa-li"><i class="fas fa-tag"></i></span><a class="text-dark" href="">تگ</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
