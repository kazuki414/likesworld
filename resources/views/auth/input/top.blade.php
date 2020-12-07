@extends('layouts.base')
@section('title','入力画面')
@section('main')
<div class="container text-center">
<h2>好きなものを入力しよう</h2>
<p>あなたの「好き」を登録して、世界を広げよう！</p>
</div>

<form method="POST" action="{{ route('check') }}">
  @csrf
  <div class="form-group">
    <div class="col-md-8 mx-auto">
      <label for="FormControlSelect1">カテゴリタイプ</label>
      <select name="type" class="form-control" id="FormControlSelect1">
        <option value="0">好きな〇〇</option>
        <option value="1">Aか？Bか？</option>
      </select>
    </div>
    <div class="container text-center mx-auto my-5 p-3 col-md-10 inputField">

      <div class="container form-group col-md-10">
        <section id="free">
          <p>あなたの好きな</p>
        </section>
        <section id="orSelect" class="dis">
          <p>あなたは</p>
        </section>
        <div class="inputTextContainer my-3 mx-auto">
          <input class="inputText text-white" type="text" id="category" name="category" value="" placeholder="(例)食べ物" required>
          <label for="category">カテゴリ：</label>
          <span class="focus_line"></span>
        </div>
        <div class="inputTextContainer my-3 mx-auto">
          <input class="inputText text-white" type="text" id="word" name="word" value="" placeholder="(例)ハンバーグ" required>
          <label for="word">登録単語：</label>
          <span class="focus_line"></span>
        </div>
        <div class="inputTextContainer my-3 mx-auto">
          <textarea class="inputText text-white" type="text" id="comment" name="comment" placeholder="(例)〇〇なくらい　〇〇なため　etc"></textarea>
          <label for="comment">ひとこと：</label>
          <span class="focus_line"></span>
        </div>

      </div>
    </div>
    <div class="col-8 col-md-6 mx-auto text-center">
    <input class="py-2 btn btn-primary submitbtn col-md-6" type="submit" name="submit" value="登録する">
    </div>
  </div>
</form>

<div class="mt-5 p-3 container col-md-10 mx-auto bg-exam rounded-lg">
<p class="exampleTitle">例えば、こんなカテゴリも登録している方がいるようです</p>
<div class="form-group m-3 d-flex">
  <select class="p-1" name="excategory" id="excategory">
    <option class="cateSele" value="0">好きな〇〇</option>
    <option class="cateSele" value="1">Aか？Bか？</option>
  </select>に関して
</div>
<section id="type0">
@foreach($categories as $category)
<div class="btn">
<button class="catebtn btn-success text-center px-2 py-1" value="{{ $category->name }}">
<label class="m-1" for ="word">好きな{{ $category->name }}</label>
</button>
</div>
@endforeach
</section>
<section id="type1" class="dis">
@foreach($selectCate as $category)
<div class="btn">
<button class="catebtn btn-success text-center px-2 py-1" value="{{ $category->name }}">
<label class="m-1" for ="word">{{ $category->name }}</label>
</button>
</div>
@endforeach
</section>

</div>
<div class="container mt-4 mx-auto text-center">
<a href="{{ route('mypage') }}">マイページへ行く</a>
</div>
@endsection