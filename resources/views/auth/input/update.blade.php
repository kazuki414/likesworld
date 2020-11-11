@extends('layouts.base')
@section('title','更新完了')
@section('main')
    <p>更新しました。</p>
    <a href="{{ route('top') }}">トップページに戻る</a>
    <a href="{{ route('mypage') }}">登録した単語一覧へ</a>
@endsection