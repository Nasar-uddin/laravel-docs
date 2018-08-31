@extends('layouts.app')
@section('content')
    <a href="/posts" class="btn btn-primary">Back</a>
    <h1>{{$post->title}}</h1>
    <p>{!!$post->body!!}</p>
    <hr>
    <small>Posted at:{{$post->created_at}} By {{ $post->user->name }}</small>
    <hr>
    @if(!Auth::guest()&&Auth::user()->id==$post->user_id)
        {{-- @if(Auth::user()->id==$post->user_id) --}}
            <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit post</a>
            {!!Form::open(['action'=>['PostsController@destroy',$post->id],'method'=>'post','class'=>'pull-right'])!!}
                {{Form::hidden('_method','DELETE')}}
                {{Form::submit('Delete post',['class'=>'btn btn-danger'])}}
            {!!Form::close()!!}
        {{-- @endif --}}
    @endif
@endsection