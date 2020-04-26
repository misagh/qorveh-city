@extends('layouts.app')

@section('content')
    <div class="card-columns">
        <div class="card p-2 border-0 shadow-sm-bold">
            <a href=""><img src="{{ asset('image1.jpg') }}" class="card-img-top" alt="image 1"></a>
            <div class="card-body">
                <h2 class="h4 font-weight-bold"><a class="text-dark card-title" href="">عنوان تصویر</a></h2>
                <p class="card-text"><span>عکاس: </span><a class="text-dark" href="">نام عکاس</a></p>
            </div>
        </div>
    </div>
@endsection
