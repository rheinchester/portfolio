@extends('layouts.app')
    <body class="landing-page sidebar-collapse">
      <!-- Navbar -->
      </nav>
      <!-- End Navbar -->
      <div class="wrapper">
        <div class="page-header page-header-small">
          <div class="page-header-image" data-parallax="true" style="background-image: url('/storage/cover_images/{{$gallery->cover_image}}');"> 
          </div>
          <div class="content-center">
              @include('inc.padding')
            <div class="container">
              <h1 class="title">{{$gallery->title}}</h1>
              <div class="text-center">
                <a href="#pablo" class="btn btn-primary btn-icon btn-round">
                  <i class="fab fa-facebook-square"></i>
                </a>
                <a href="#pablo" class="btn btn-primary btn-icon btn-round">
                  <i class="fab fa-twitter"></i>
                </a>
                <a href="#pablo" class="btn btn-primary btn-icon btn-round">
                  <i class="fab fa-google-plus"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="section section-about-us">
          <div class="container">
            <div class="row">
              <div class="col-md-8 ml-auto mr-auto text-center">
                <h5 class="description">{{$gallery->body}}</h5>
              </div>
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
            
          