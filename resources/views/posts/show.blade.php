@extends('layouts.app')
@section('content')
    <a href="/posts" class="btn btn-primary">Back</a>
    <h1>{{$post->title}}</h1>
    <p>{!!$post->body!!}</p>
    <hr>
    <small>Posted at:{{$post->created_at}}</small>
    <hr>
    <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit post</a>
    {!!Form::open(['action'=>['PostsController@destroy',$post->id],'method'=>'post','class'=>'pull-right'])!!}
        {{Form::hidden('_method','DELETE')}}
        {{Form::submit('Delete post',['class'=>'btn btn-danger'])}}
    {!!Form::close()!!}
@endsection