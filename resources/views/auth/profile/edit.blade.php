@extends('layouts.base')
@section('title','入力画面')
@section('main')
<div class="container text-center">
<h2>編集画面</h2>
<p>変更したいところを入力してください</p>
</div>

<div class="container text-center mx-auto col-md-10">
<form method="POST" action="{{ route('update') }}">
@csrf
@foreach($colums as $colum)
<label class="text-muted" for="category">カテゴリ：</label>
<p>
{{ $colum->name}}
</p>
<input type="hidden" name="category" value="{{ $colum->name}}">
<br>
<label class="text-muted" for="word">登録単語：</label>
<input type="text" id="word" name="word" value="{{ $colum->word }}" placeholder="(例)ハンバーグ" required>
<br>
<label class="text-muted" for="comment">回答についてのひとこと:</label>
<textarea type="text" id="comment" name="comment" rows="3"  placeholder="(例)〇〇なくらい　〇〇なため　etc" >{{ $colum->comment }}</textarea>
</div>
@endforeach
<input class="btn-primary" type="submit" name="submit" value="更新する">
<input type="hidden" name="category_id" value="{{ $colum->category_id }}">
</form>
</div>

@endsection