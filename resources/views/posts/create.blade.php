@extends('layouts.app')

@section('content')
    <h1>Add new post</h1>
    {!! Form::open(['url' => 'posts','method'=>'post','enctype'=>'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title','Title')}}
            {{Form::text('title','',['class'=>'form-control','placeholder'=>'Post title'])}}
        </div>
        <div class="form-group">
            {{Form::label('body','Post body')}}
            {{Form::textarea('body','',['class'=>'form-control','id'=>'article-ckeditor','placeholder'=>'Post body','rows'=>'20'])}}
        </div>
        <div class="form-group">
            {{Form::file('cover-img',['class'=>'form-control'])}}
        </div>
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection