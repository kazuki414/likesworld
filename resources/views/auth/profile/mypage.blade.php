@extends('layouts.base')
@section('title','マイページ')
@section('main')
<h2 class="text-center">あなたの好きなもの</h2>
<div>
</div>

<div class = "container mx-auto d-flex flex-wrap justify-content-center col-md-12">
    @foreach($words as $value)
    <div class="card m-3 col-md-5">
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
    </div>
    @endforeach
</div>
<div class="container mt-4 mx-auto text-center">
<a href="{{ route('top') }}">新しく登録する</a>
</div>
@endsection
