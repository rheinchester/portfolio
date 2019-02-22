@extends('layouts.app')
<div class="section section-navbars">
    <div id="navbar">
      <div class="container">
        <!-- Navbar Danger -->
        <a href="/user/gallery" class="btn btn-primary">Go Back</a>
        <h1>{{$gallery->title}}</h1>
        <img style="width:50%; max-height: 500px; margin: 0px auto"  src="/storage/cover_images/files/posts_folder/{{$gallery->cover_image}} ">   
        <div>
            {!!$gallery->body!!}
        </div>
        <hr>
        <small>written on {{$gallery->created_at}}</small>  
        <hr>
        <a href="/user/gallery/{{$gallery->id}}/edit" class="btn btn-primary">Edit</a>
        @if (!Auth::guest())
        {!!Form::open([
            'action' => ['GalleriesController@destroy', $gallery->id],
            'method' => 'POST',
            'class' => 'float-right'])!!}
          {{Form::hidden('_method', 'DELETE')}}
          {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
        {!! Form::close() !!}
        @endif
      </div>
    </div>
  </div>
   