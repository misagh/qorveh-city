<nav class="navbar navbar-expand-md navbar-light bg-white border-bottom py-md-0">
    <div class="container">
        <a class="text-secondary" target="_blank" href="{{ url('https://fa.wikipedia.org/wiki/%D9%82%D8%B1%D9%88%D9%87') }}">درباره شهرستان قروه</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav ml-auto">
                @if (empty($auth))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('ورود') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('ثبت نام') }}</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ $auth->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('users.profile', $auth->username) }}">{{ __('حساب کابری') }}</a>
                            <div class="dropdown-divider"></div>
                            @if (is_admin($auth) || is_author($auth))
                                <a class="dropdown-item" href="{{ route('articles.add') }}">{{ __('افزودن پست') }}</a>
                            @endif
                            @if (is_admin($auth))
                                <a class="dropdown-item" href="{{ route('challenges.lists') }}">{{ __('ویرایش پست ها') }}</a>
                                <div class="dropdown-divider"></div>
                            @endif
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('خروج') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
