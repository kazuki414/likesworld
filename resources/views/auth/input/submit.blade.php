@extends('layouts.base')
@section('title','登録完了')
@section('main')
<p class="text-center">以下の内容で登録完了しました。</p>
<div class="container entryField my-5 col-md-8">
    <div class="col-lg-6 mx-auto my-1 mt-3">
        <div class="d-flex">
            <p class="cateSize letter_font">カテゴリ：</p>
            <p class="pl-3 entry_font">{{$category}}</p>
        </div>
        <div class="d-flex my-1">
            <p class="cateSize letter_font">登録内容：</p>
            <p class="pl-3 entry_font">{{$word}}</p>
        </div>
        <div class="d-flex textWrap">
            <p class="cateSize letter_font">ひとこと：</p>
            <p class="col-7 col-lg-9 entry_font">{{$comment}}</p>
        </div>
    </div>
</div>
<div class="d-flex justify-content-around">
    <a href="{{ route('top') }}">トップページに戻る</a>
    <a href="{{ route('mypage') }}">登録した単語一覧へ</a>
</div>
@endsection