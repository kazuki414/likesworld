@extends('layouts.base')
@section('title','入力画面')
@section('main')
<div class="container text-center">
<h2>好きなものを入力しよう</h2>
<p>あなたの「好き」を登録して、世界を広げよう！</p>
</div>

<div class="container text-center mx-auto col-md-8">
<form method="POST" action="{{ route('check') }}">
@csrf
  <div class="form-group col-md-6 mx-auto">
    <label for="FormControlSelect1">カテゴリタイプ</label>
    <select name="type" class="form-control" id="FormControlSelect1">
      <option value="0">好きな〇〇</option>
      <option value="1">Aか？Bか？</option>
    </select>
  </div>

<div class="container form-group">
<section id="free">
<p>あなたの好きな</p>
<label class="text-muted" for="category">カテゴリ：</label>
<input type="text" id="category" name="category" value="" placeholder="(例)食べ物" required>
<p>は</p>
<label class="text-muted" for="word">登録単語：</label>
<input type="text" id="word" name="word" value="" placeholder="(例)ハンバーグ" required>
<p>です。</p>

</section>
<section id="orSelect" class="dis">
<p>あなたは</p>
<label class="text-muted" for="category">カテゴリ：</label>
<input type="text" id="category" name="category" value="" placeholder="(例)犬派か猫派か" required>
<p>は</p>
<label class="text-muted" for="word">登録単語：</label>
<input type="text" id="word" name="word" value="" placeholder="(例）猫派" required>
<p>です。</p>
</section>
<label class="text-muted" for="comment">回答についてのひとこと:</label>
<textarea type="text" id="comment" name="comment" rows="3"  value="" placeholder="(例)〇〇なくらい　〇〇なため　etc" ></textarea>
</div>
<input type="submit" name="submit" value="登録する">
</form>
</div>

<div class="mt-5 container">
<p>例えば、こんなカテゴリも登録している方がいるようです</p>
@foreach($categories as $category)
<div class="btn">
<p>好きな{{ $category->name }}</p>
</div>
@endforeach
</div>
<a href="{{ route('mypage') }}">登録した単語一覧へ</a>
@endsection