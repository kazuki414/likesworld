<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LikesWorldにようこそ！</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body class="bg-white">
    <div class="container mb-5">
        <div class="container title my-5 text-center">
            <h1 class="mr-5 pr-5">Likes</h1>
            <h1 class="ml-5 pl-5">World!!</h1>
        </div>

        <div class="sub_title mx-3 my-2 d-flex justify-content-center text-center">
            <h2 class="mx-auto">「あなたの『好き』は、この世界にあふれている！」</h2>
        </div>


        <div class="container explan mx-auto my-4 col-md-8">
            <p class="text-center">あなたの好きなものを<br>あなた自身に知ってもらいましょう！</p>
            <ul class="text-monospace text-center">
                <li>今日、日常の中にどれほど「好き」があるか気付けるかも？</li>
                <li>「自己紹介なんて言おうか・・・」そんなこと考えるエネルギーはもういらない！</li>
                <li>「なんでもいい。」大好きな人をそれで困らせちゃうのはもったいない！</li>
                <li>こんなに素敵な人がいることを、簡単に周りの人に知ってもらえるかも？</li>
            </ul>
            <p class="my-3 text-center">さぁ、はじめてみよう！！</p>
        </div>

        <!-- 背景デザインの黄色い円 -->
        <div class="container space col-md-12 my-5"></div>
        <div class="cercle1"></div>
        <div class="cercle2"></div>
        <div class="cercle3"></div>
        <div class="cercle4"></div>

        <div class="start mx-auto mt-5 text-center col-md-4">
            <a href="{{ route('top') }}" type="button" class="btn btn-lg btn-block p-3 " role="button">Let's Start!!</a>
            <div class="cercle"></div>
        </div>
    </div>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>