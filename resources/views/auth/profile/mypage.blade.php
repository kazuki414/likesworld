@extends('layouts.base')
@section('title','マイページ')
@section('main')
<h2 class="text-center">登録したもの</h2>
<div>
</div>

<div class = "container mx-auto d-flex flex-wrap justify-content-center col-md-10">
    @foreach($words as $value)
    <div class="card m-3 col-md-5">
    <div class="card-body">
        <h5 class="card-title">【{{ $value->word }}】</h5>
        <h6 class="card-subtitle mb-2 text-muted">{{ $value->name }}</h6>
        <p class="card-text">{{ $value->comment }}</p>
        <a href="#" class="card-link">削除</a>
        <a href="#" class="card-link">編集</a>
    </div>
    </div>
    @endforeach
</div>
<div class="container mt-4 mx-auto text-center">
<a href="{{ route('top') }}">新しく登録する</a>
</div>
@endsection
