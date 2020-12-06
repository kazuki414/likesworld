@extends('layouts.base')
@section('title','削除')
@section('main')
<h5 class="text-center">削除完了しました。</h3>
<div class="d-flex justify-content-around">
    <a href="{{ route('top') }}">トップページに戻る</a>
    <a href="{{ route('mypage') }}">登録した単語一覧へ</a>
</div>
@endsection