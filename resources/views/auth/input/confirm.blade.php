@extends('layouts.base')
@section('title','確認画面')
@section('main')
<form method="POST" action="update">
@csrf
<div class="container">
    <p>『{{ $category }}』には『{{ $oldWord }}』が登録されていますが、『{{ $word }}』として更新しますか？</p>
    <input type="submit" name="update" value="更新する">
    <a href="top">入力画面に戻る</a>
    <input type="hidden" name="word" value="{{ $word }}">
    <input type="hidden" name="category" value="{{ $category }}">
    <input type="hidden" name="comment" value="{{ $comment }}">
    <input type="hidden" name="category_id" value="{{ $category_id }}">
</div>
</form>
@endsection