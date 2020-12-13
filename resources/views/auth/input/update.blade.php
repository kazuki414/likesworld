@extends('layouts.base')
@section('title','更新完了')
@section('main')
<p class="text-center">更新しました。</p>
<div class="d-flex justify-content-around">
    <a href="{{ route('top') }}">トップページに戻る</a>
    <a href="{{ route('mypage') }}">登録した単語一覧へ</a>
</div>
@endsection