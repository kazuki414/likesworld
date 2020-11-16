<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
</head>
<body>
<!-- ナビゲーターバー -->

<div class="header">
    <nav class="navbar flexed">
        <div class="flex-shrink-0 flex items-center">
        <a class="navbar-bland" href="{{ route('top')}}">
        <img src="{{ asset('img/logo.png')}}"  width="50" height="50" alt="LikesWorldのロゴ">
        <span class="navbar-brand mb-0 h1  text-dark">LikesWorld</span>
        </a>
        </div>

    <!-- dropdownMenu -->
        <div class="flex items-center nav-item dropdown">
            <button class="nav-link dropdown-toggle" id="DropdownMenu"role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->name }}
            </button>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="DropdownMenu">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-jet-dropdown-link href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                        <span class="text-dark">
                            ログアウト
                        </span>
                    </x-jet-dropdown-link>
                </form>

                <a class="dropdown-item" href="{{ route('mypage') }}">マイページ</a>
                <a class="dropdown-item" href="{{ route('top') }}">トップページ</a>
            </div>
        </div>

        
      

    </nav>
</div>



<!-- 内容 -->
<div class = "m-5 p-5 mx-auto bg-white contents-container container">
    @section('main')
    <p>内容が指定されていません</p>
    @show
</div>

<footer class="bd-footer text-muted">
<div class="container-fluid p-3 p-md-5">
    <ul class="bd-footer-links">
        <li class="col-md-3"><a href="{{ route('top') }}">TOPへ</a></li>
        <li class="col-md-3"><a href="#">使い方</a></li>
        <li class="col-md-3"><a href="#">作った人について</a></li>
    </ul>
    <p class="text-center">Copyright(c) Kazuk.I. All Right Reserved.</p>
</div>
</footer>
    
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>