@extends('layouts.base')
@section('title','入力画面')
@section('main')
<form method="POST" action="check">
@csrf
<div class="container">
<p>あなたの好きな</p>
<input type="text" name="category" value="" placeholder="(例)食べ物">
<p>は</p>
<input type="text" name="word" value="" placeholder="(例)ハンバーグ">
<p>です。</p>
<p>回答について</p>
<input type="text" name="comment" value="" placeholder="(例)〇〇なくらい　〇〇なため　etc" >
</div>
<input type="submit" name="submit" value="登録する">
<a href="top2">好きなものを二択形式で登録する。</a>
</form>

<div class="container">
<p>例えば、こんなカテゴリも登録している方がいるようです</p>
@foreach($categories as $category)
<div class="btn">
<p>好きな{{ $category->name }}</p>
</div>
@endforeach
</div>
@endsection