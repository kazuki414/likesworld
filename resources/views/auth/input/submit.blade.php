@extends('layouts.base')
@section('title','登録完了')
@section('main')
    <p>あなたの好きな{{ $category }}を{{ $word }}で登録しました。</p>
    <a href="{{ route('top') }}">トップページに戻る</a>
    <a href="{{ route('mypage') }}">登録した単語一覧へ</a>
@endsection