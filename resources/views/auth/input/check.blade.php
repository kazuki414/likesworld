@extends('layouts.base')
@section('title','確認画面')
@section('main')
<form method="POST" action="{{ route('submit')}}">
@csrf
<div class="container">
@if($type == 0)
<p>あなたの好きな『{{ $category }}』は『{{ $word }}』で登録していいですか？</p>
<p>(ひとことコメント)『{{ $comment }}』</p>
@endif
@if($type == 1)
<p>あなたは『{{ $category }}』に関して、『{{ $word }}』派でいいですか？</p>
<p>(ひとことコメント)『{{ $comment }}』</p>
@endif
    <a href="{{ route('top')}}">入力画面に戻る</a>
    <a href="javascript:history.back()">[戻る]</a>
    <input class="btn-primary" type="submit" name="wordinsert" value="登録する">
    <input type="hidden" name="word" value="{{ $word }}">
    <input type="hidden" name="category" value="{{ $category }}">
    <input type="hidden" name="comment" value="{{ $comment }}">
    <input type="hidden" name="type" value="{{ $type }}">
</div>
</form>
@endsection