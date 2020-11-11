@extends('layouts.base')
@section('title','入力画面')
@section('main')
<form method="POST" action="check">
@csrf
  <div class="form-group">
    <label for="exampleFormControlSelect1">カテゴリタイプ</label>
    <select name="type" class="form-control" id="exampleFormControlSelect1">
      <option value="0">好きな〇〇</option>
      <option value="1">A派？B派？</option>
    </select>
  </div>
<div class="container">
<p>あなたの好きな</p>
<input type="text" name="category" value="" placeholder="(例)食べ物" required>
<p>は</p>
<input type="text" name="word" value="" placeholder="(例)ハンバーグ" required>
<p>です。</p>
<p>回答について</p>
<input type="text" name="comment"  value="" placeholder="(例)〇〇なくらい　〇〇なため　etc" >
</div>
<input type="submit" name="submit" value="登録する">
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