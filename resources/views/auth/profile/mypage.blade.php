@extends('layouts.base')
@section('title','マイページ')
@section('main')
登録したもの
@foreach($categories as $category)
<p>{{ $category->name }}</p>
@endforeach
@endsection