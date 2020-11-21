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
        <a class="navbar-bland" href="{{ route('hello')}}">
        <img src="{{ asset('img/logo.png')}}"  width="50" height="50" alt="LikesWorldのロゴ">
        <span class="navbar-brand mb-0 h1  text-dark">LikesWorld</span>
        </a>
        </div>

    <!-- dropdownMenu -->
        <div class="flex items-center nav-item dropdown">
            <button class="nav-link dropdown-toggle btn btn-outline-success" id="DropdownMenu"role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
    <p class="text-right version">ver.1.0</p>
    <ul class="bd-footer-links d-flex justify-content-around">
        <li class="col-md-3 text-center"><a href="{{ route('top') }}">TOPへ</a></li>
        <li class="col-md-3 text-center"><a href="#" data-toggle="modal" data-target="#howToUseModal">使い方</a></li>
        <li class="col-md-3 text-center"><a href="#" data-toggle="modal" data-target="#aboutProducerModal">作った人について</a></li>
    </ul>
    <!-- モーダル -->
    <!-- 使い方 -->
    <div class="modal fade" id="howToUseModal" tabindex="-1" role="dialog" aria-labelledby="howToUseModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered col-md-8" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="howToUseModalTitle">使い方</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <p>
                あなたの好きなものを登録することで<br>
                「あなたがこんなにもたくさんの好きなものを持っていること」を、知ってみましょう。<br>
                好きなものを、勇気を出して好きと周りに伝えることで<br>
                きっと好きなもので生活があふれていきます。
            </p>
            <p class="mx-auto col-md-7">
                <br>
                必要なことは<br>
                ①登録したいカテゴリを選んで<br>
                ②好きなものを入力して<br>
                ③登録する<br>
                <br>
            </p>
            <p>
                そして、あなたが好きなものを忘れてしまったときや選択に迷ってしまったとき、<br>
            </p>
            <p class="text-center">マイページを見るだけ！！</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">閉じる</button>
            </div>
            </div>
        </div>
    </div>
    <!-- 作った人 -->
    <div class="modal fade" id="aboutProducerModal" tabindex="-1" role="dialog" aria-labelledby="aboutProducerModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="aboutProducerModalTitle">作った人について</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>プロフィール</p>
                    <p>
                    Name： Kazuki Iida <br>
                    Age： 26 <br>
                    </p>
                    <p>メッセージ</p>
                    <p>
                    ここまでご覧いただきありがとうございます。<br>
                    私がこれを作った背景としては、私自身自己紹介というものや、
                    好きなものについて語ることが苦手だったという過去があったことにあります。<br>
                    そこで、好きなものたちを形にしてまとめておいたら<br>
                    何かの選択の際、その選択におけるエネルギー消費が少なくでき、またエネルギーを他の使いたいことに使える。
                    もしくはその分、余裕のある充実した生活にできるのではないかと。<br>
                    ......少なくとも自己紹介で困らなくはなるはず笑<br>
                    そんな思いで仕上がりました。<br>
                    <br>
                    さらに、周囲の人に好きなものを簡単に知ってもらうことができれば、自分の好きなものが周りから近づいてくるのでは無いだろうかと思っています。<br>
                    そのため、近々アップデートして登録したものを他の人に見てもらいやすくする機能をつけようかと考えておりますので、その時にまた見ていただけたら幸いです。<br>
                    それでは。
                    </p> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">閉じる</button>
                </div>
            </div>
        </div>
    </div>

    <p class="text-center mt-5">Copyright(c) Kazuk.I. All Right Reserved.</p>
</div>
</footer>
    
    
    <!-- Optional JavaScript -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="{{ asset('js/script2.js') }}"></script>
</body>
</html>