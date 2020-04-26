@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card shadow">
            <div class="card-header">ارسال تصویر</div>
            <div class="card-body">
                <div class="alert alert-info">
                    <p>تصویر شما پس از بررسی در سایت منتشر خواهد شد. تمامی حقوق این تصویر متعلق به عکاس آن می باشد، بنابراین در ارسال تصویر پیشنهادی خود، موارد زیر را مد نظر داشته باشید.</p>
                    <ul class="mb-0">
                        <li>کیفیت تصویر شما باید قابل قبول باشد و تصاویر بی کیفیت منتشر نخواهند شد.</li>
                        <li>عنوان و توضیحات تصویر شما در معرفی اثر نقش مهمی دارند و معرف تصویر شما در موتورهای جستجو مانند گوگل هستند.</li>
                        <li>تصاویر پس از بررسی، منتشر خواهند شد. بنابراین اگر تصویر شما نیاز به ویراش داشته باشد، از طریق سایت به شما اطلاع داده خواهد شد.</li>
                    </ul>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>عنوان پیشنهادی</label>
                        <input type="text" name="title" class="form-control" placeholder="این عنوان، معرف تصویر شماست" required>
                    </div>
                    <div class="form-group">
                        <label>توضیحات تکمیلی</label>
                        <textarea rows="3" name="description" class="form-control" placeholder="توضیحاتی مرتبط با تصویر را در اینجا بنویسید" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>انتخاب تصویر</label>
                        <input type="file" name="image" class="form-control-file" required>
                    </div>
                    <button type="submit" class="btn btn-success mt-4">ارسال تصویر</button>
                </form>
            </div>
        </div>
    </div>
@endsection
