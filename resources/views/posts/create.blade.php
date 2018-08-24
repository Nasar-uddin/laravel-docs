@extends('layouts.app')

@section('content')
    <h1>Add new post</h1>
    {{-- <form action="{{URL::to('posts/store')}}" method="post">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" value="" name="title" class="form-control" placeholder="post title">
        </div>
        <div class="form-group">
                <label for="body">Body</label>
                <textarea class="form-control" name="body" rows="20" placeholder="post body"></textarea>
            </div>
        <button class="btn btn-primary" type="submit">Submit</button>
    </form> --}}
    {!! Form::open(['url' => 'posts/store','method'=>'post']) !!}
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