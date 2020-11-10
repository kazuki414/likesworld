@extends('layouts.base')
@section('title','確認画面')
@section('main')
<form method="POST" action="submit">
@csrf
<div class="container">
@extends('auth.input.message.confirm')
@extends('auth.input.message.choice')
@empty($check)
@if($type ===0)
<p>あなたの好きな『{{ $category }}』は『{{ $word }}』で登録していいですか？</p>
<p>(補足)『{{ $comment }}』</p>
@else
<p>あなたは『{{ $category }}』に関して、『{{ $word }}』派でいいですか？</p>
<p>(補足)『{{ $comment }}』</p>
@endif
<input type="submit" name="wordinsert" value="登録する">
@endempty
@isset($check)
<p>『{{ $category }}』には『{{ $oldWord }}』が登録されていますが、『{{ $word }}』として更新しますか？</p>
<input type="submit" name="checked" value="更新する">
@endisset
    <a href="top">入力画面に戻る</a>
    <input type="hidden" name="word" value="{{ $word }}">
    <input type="hidden" name="category" value="{{ $category }}">
    <input type="hidden" name="comment" value="{{ $comment }}">
</div>
</form>
@endsection