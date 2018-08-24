@extends('layouts.app')
@section('content')
<a href="/posts" class="btn btn-primary">Back</a>
<h1>{{$post->title}}</h1>
<p>{!!$post->body!!}</p>
<hr>
<small>Posted at:{{$post->created_at}}</small>

@endsection