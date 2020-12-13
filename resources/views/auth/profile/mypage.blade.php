@extends('layouts.base')
@section('title','マイページ')
@section('main')
<h2 class="text-center">あなたの好きなもの</h2>
<div>
</div>

<div class = "container mx-auto d-flex flex-wrap justify-content-center col-md-10 col-lg-12">
    @foreach($words as $value)
    <div class="container entryField my-3  col-lg-5">
    <div class="col-md-10 mx-auto my-1 mt-3">
        <div class="d-flex">
            <p class="cateSize letter_font">カテゴリ：</p>
            <p class="pl-3 entry_font">
            @if($value->type ==0)
            好きな
            @endif
            {{$value->name}}</p>
        </div>
        <div class="d-flex my-1">
            <p class="cateSize letter_font">登録内容：</p>
            <p class="pl-3 entry_font">{{$value->word}}</p>
        </div>
        <div class="d-flex textWrap">
            <p class="cateSize letter_font">ひとこと：</p>
            <p class="col-7 col-lg-10 entry_font">{{$value->comment}}</p>
        </div>
        <div class="d-flex justify-content-between my-3">
        <form action="{{ route('delete', ['id' =>  $value->id ]) }}" method="post">
        @csrf
            <input type="submit" name="destroy" class="btn dltbtn btn-danger card-link" value="削除">
        </form>
        <form action="{{ route('edit', ['id' =>  $value->id ]) }}" method="post">
        @csrf
            <input type="submit" name="destroy" class="btn edtbtn btn-success card-link" value="編集">
        </form>
        </div>
    </div>
    </div>
    @endforeach
</div>
<div class="container mt-4 mx-auto text-center">
<a href="{{ route('top') }}">新しく登録する</a>
</div>
@endsection
