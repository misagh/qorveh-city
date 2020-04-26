@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-9 mb-3">
            <div class="card p-3 border-0 shadow-sm-bold">
                <div class="row">
                    <div class="col-12 text-center mb-4">
                        <img class="img-fluid" alt="full size image" src="{{ asset('big-image.jpg') }}">
                    </div>
                    <div class="col-12">
                        <h1 class="font-weight-bold mb-4">عنوان تصویر</h1>
                        <p>
                            اگر شما یک طراح هستین و یا با طراحی های گرافیکی سروکار دارید به متن های برخورده اید که با نام لورم ایپسوم شناخته می‌شوند. لورم ایپسوم یا طرح‌نما (به انگلیسی: Lorem ipsum) متنی ساختگی و بدون معنی است که برای امتحان فونت و یا پر کردن فضا در یک طراحی گرافیکی و یا صنعت چاپ استفاده میشود. طراحان وب و گرافیک از این متن برای پرکردن صفحه و ارائه شکل کلی طرح استفاده می‌کنند.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card p-3 border-0 shadow-sm-bold mb-3">
                <h5 class="font-weight-bold text-center">خالق اثر</h5>
                <hr>
                <div class="text-center">
                    <a href=""><img class="rounded-circle img-thumbnail" width="150" alt="firstname lastname" src="{{ asset('avatar.jpg') }}"></a>
                </div>
                <h5 class="text-center my-4 font-weight-bold"><a class="text-dark" href="">نام و فامیل عکاس</a></h5>
                <p>
                    اگر شما یک طراح هستین و یا با طراحی های گرافیکی سروکار دارید به متن های برخورده اید که با نام لورم ایپسوم شناخته می‌شوند. لورم ایپسوم یا طرح‌نما (به انگلیسی: Lorem ipsum) متنی ساختگی و بدون معنی است که برای امتحان فونت و ی
                </p>
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
