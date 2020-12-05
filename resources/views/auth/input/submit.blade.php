@extends('layouts.base')
@section('title','登録完了')
@section('main')
    <p class="text-center">以下の内容で登録完了しました。</p>
    <div class="container entryField my-5">
        <div class="col-md-6 mx-auto my-1 mt-3">
            <div class="d-flex">
                <p>カテゴリ：</p>
                <p class="pl-3">好きな{{$category}}</p>
            </div>
            <div class="d-flex my-1">
                <p>登録内容：</p>
                <p class="pl-3">{{$word}}</p>
            </div>
            <div class="d-flex textWrap">
                <p>ひとこと：</p>
                <p class="col-7 col-lg-9">{{$comment}}</p>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-around">
    <a href="{{ route('top') }}">トップページに戻る</a>
    <a href="{{ route('mypage') }}">登録した単語一覧へ</a>
    </div>
@endsection