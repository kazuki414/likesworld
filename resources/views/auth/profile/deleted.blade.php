@extends('layouts.base')
@section('title','削除')
@section('main')
<h2 class="text-center">削除処理</h2>
<h3 class="text-center">正常に削除完了しました。</h3>
<a href="{{ route('mypage') }}">マイページに戻る</a>
<a href="{{ route('top') }}">トップページに戻る</a>
@endsection