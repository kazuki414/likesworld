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
            <p>カテゴリ：</p>
            <p class="pl-3">好きな{{$value->name}}</p>
        </div>
        <div class="d-flex my-1">
            <p>登録内容：</p>
            <p class="pl-3">{{$value->word}}</p>
        </div>
        <div class="d-flex textWrap">
            <p>ひとこと：</p>
            <p class="col-7">{{$value->comment}}</p>
        </div>
        <div class="d-flex justify-content-around my-3">
        <form action="{{ route('delete', ['id' =>  $value->id ]) }}" method="post">
        @csrf
            <input type="submit" name="destroy" class="btn btn-danger card-link" value="削除">
        </form>
        <form action="{{ route('edit', ['id' =>  $value->id ]) }}" method="post">
        @csrf
            <input type="submit" name="destroy" class="btn btn-success card-link" value="編集">
        </form>
        </div>
    </div>
    </div>
    <!-- <div class="card m-3 col-md-5">
    <div class="card-body">
        <h5 class="card-title text-center">【{{ $value->word }}】</h5>
        <h6 class="card-subtitle mb-2 text-muted">{{ $value->name }}</h6>
        <p class="card-text">{{ $value->comment }}</p>
        <div class="d-flex justify-content-around">
            <form action="{{ route('delete', ['id' =>  $value->id ]) }}" method="post">
            @csrf
            <input type="submit" name="destroy" class="btn btn-danger card-link" value="削除">
            </form>
            <form action="{{ route('edit', ['id' =>  $value->id ]) }}" method="post">
            @csrf
            <input type="submit" name="destroy" class="btn btn-success card-link" value="編集">
            </form>
        </div>
    </div>
    </div> -->
    @endforeach
</div>
<div class="container mt-4 mx-auto text-center">
<a href="{{ route('top') }}">新しく登録する</a>
</div>
@endsection
