@extends('layouts.app')
@section('content')

<h1>Posts</h1>
@if(count($posts)>0)
    @foreach ($posts as $post)
        <div class="well">
            <h2>{{$post->title}}</h2>
            <p class="text-right"><small>{{$post->created_at}} by {{ $post->user->name }}</small></p>
            <a href="posts/{{$post->id}}" class="btn btn-primary">Details</a>
        </div>
    @endforeach
    {{$posts->links()}}
@else
    <p>No posts found</p>
@endif

@endsection