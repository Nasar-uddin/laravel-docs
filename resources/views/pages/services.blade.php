@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>
    @if(count($services)>0)
    <ul class="list-group">
    	@foreach($services as $service)
    	<li class="list-group-item">{{$service}}</li>
    	@endforeach
    </ul>
    @endif
    <p>This is a simple app By Md.Nasar uddin, a noob progremmer.</p>
@endsection