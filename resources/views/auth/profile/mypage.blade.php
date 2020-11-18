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
        <form action="{{ route('delete', ['id' =>  $value->id ]) }}" method="post">
        @csrf
        <input type="submit" name="destroy" class="card-link" value="削除">
        </form>
        <form action="{{ route('edit', ['id' =>  $value->id ]) }}" method="post">
        @csrf
        <input type="submit" name="destroy" class="card-link" value="編集">
        </form>
    </div>
    </div>
    @endforeach
</div>
<div class="container mt-4 mx-auto text-center">
<a href="{{ route('top') }}">新しく登録する</a>
</div>
@endsection
