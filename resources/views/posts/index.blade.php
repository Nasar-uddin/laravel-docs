@extends('layouts.app')
@section('content')

<h1>Posts</h1>
@if(count($posts)>0)
    @foreach ($posts as $post)
        <div class="well">
            <div class="row">
                <div class="col-sm-4 col-md-4">
                <img class="img-responsive" src="/storage/cover-img/{{$post->cover_img}}" alt="{{$post->cover_img}}">
                </div>
                <div class="col-sm-8 col-md-8">
                    <h2>{{$post->title}}</h2>
                    <p class="text-right"><small>{{$post->created_at}} by {{ $post->user->name }}</small></p>
                    <a href="posts/{{$post->id}}" class="btn btn-primary">Details</a>
                </div>
            </div>
        </div>
    @endforeach
    {{$posts->links()}}
@else
    <p>No posts found</p>
@endif

@endsection