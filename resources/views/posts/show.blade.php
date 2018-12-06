@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-primary">Go Back</a>
    <h1>{{$post->title}}</h1>
    <img style="width:100%"  src="/storage/cover_images/{{$post->cover_image}} ">   
    <div>
        {!!$post->body!!}
    </div>
    <hr>
    <small>written on {{$post->created_at}}</small>  
    <hr>
    <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a>
    @if (!Auth::guest())
    {!!Form::open([
        'action' => ['PostsController@destroy', $post->id],
        'method' => 'POST',
        'class' => 'float-right'])!!}
      {{Form::hidden('_method', 'DELETE')}}
      {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
    {!! Form::close() !!}
    @endif
   
@endsection