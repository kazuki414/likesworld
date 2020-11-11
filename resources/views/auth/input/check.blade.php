@extends('layouts.base')
@section('title','確認画面')
@section('main')
<form method="POST" action="{{ route('submit')}}">
@csrf
<div class="container">
    @extends('auth.input.message.type0')
    @extends('auth.input.message.type1')
    <input type="submit" name="wordinsert" value="登録する">
    <a href="{{ route('top')}}">入力画面に戻る</a>
    <input type="hidden" name="word" value="{{ $word }}">
    <input type="hidden" name="category" value="{{ $category }}">
    <input type="hidden" name="comment" value="{{ $comment }}">
    <input type="hidden" name="type" value="{{ $type }}">
</div>
</form>
@endsection