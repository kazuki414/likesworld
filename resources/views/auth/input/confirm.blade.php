@extends('layouts.base')
@section('title','確認画面')
@section('main')
<form class="form-group" method="POST" action="{{ route('update')}}">
@csrf
<div class="container">
    <p>『{{ $category }}』には『{{ $oldWord }}』が登録されていますが、新しく『{{ $word }}』として更新しますか？</p>
    <div class="container entryField my-5">
        <div class="col-md-6 mx-auto my-1 mt-3">
            <div class="d-flex">
                <p>カテゴリ：</p>
                <p class="pl-3">好きな{{$category}}</p>
            </div>
            <div class="d-flex my-1">
                <p>登録内容：</p>
                <p class="pl-3"><S>{{ $oldWord }}</s><br>{{$word}}</p>
            </div>
            <div class="d-flex textWrap">
                <p>ひとこと：</p>
                <p class="col-7 col-lg-9">{{$comment}}</p>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-around">
    <a class="btn" href="{{ route('top') }}">入力画面に戻る</a>
    <input class="btn" type="submit" name="submit" value="更新する">
    </div>
</div>
</form>
@endsection