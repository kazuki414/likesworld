@extends('layouts.base')
@section('title','マイページ')
@section('main')
登録したもの
@foreach($words as $value)
<p>{{ $value->name }}</p>
に
<p> {{ $value->word }}</p>
を
<p>{{ $value->comment }}</p>
で。
@endforeach

<a href="{{ route('top') }}">登録しにいく</a>
@endsection