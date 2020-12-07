@extends('layouts.base')
@section('title','確認画面')
@section('main')
<form method="POST" action="{{ route('submit')}}">
@csrf
<div class="container">
<p class="text-center">以下の内容で登録しますか？</p>
@if($type == 0)
<div class="container entryField my-5 col-md-8">
    <div class="col-md-6 mx-auto my-1 mt-3">
        <div class="d-flex">
            <p class="cateSize letter_font">カテゴリ：</p>
            <p class="pl-3 entry_font">好きな{{$category}}</p>
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
@endif
@if($type == 1)
<div class="container entryField my-5 col-md-8">
    <div class="col-md-6 mx-auto my-1 mt-3">
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
@endif
<div class="text-center d-flex justify-content-around">
    <a class="btn backbtn btn-secondary m-1" href="javascript:history.back()">戻る</a>
    <input class="btn submitbtn btn-primary m-1" type="submit" name="wordinsert" value="登録する">
</div>
</div>
</form>
@endsection