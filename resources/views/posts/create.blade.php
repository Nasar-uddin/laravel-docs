@extends('layouts.app')

@section('content')
    <h1>Add new post</h1>
    {!! Form::open(['url' => 'posts','method'=>'post']) !!}
        <div class="form-group">
            {{Form::label('title','Title')}}
            {{Form::text('title','',['class'=>'form-control','placeholder'=>'Post title'])}}
        </div>
        <div class="form-group">
            {{Form::label('body','Post body')}}
            {{Form::textarea('body','',['class'=>'form-control','id'=>'article-ckeditor','placeholder'=>'Post body','rows'=>'20'])}}
        </div>
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection
{{-- <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('article-ckeditor');
    </script> --}}