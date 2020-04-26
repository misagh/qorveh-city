<!doctype html>
<html lang="fa">
@include('layouts.header')
<body>
<div id="app" class="rtl">
    @include('layouts.navbar')
    <header class="shadow-sm mb-3 bg-white">
        <div class="container text-center py-4">
            <h3><a href="/" class="eng-font text-dark">Qorveh.city</a></h3>
            <h1 class="slog text-secondary h5">Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum </h1>
        </div>
    </header>

    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>
</div>

@include('layouts.footer')
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
