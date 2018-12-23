@extends('layouts.app')
@section('content')
    @include('inc.padding')
    <div class="container">
        <h1>Create Gallery</h1>
        {!! Form::open([
                    'action' => 'GalleriesController@store',
                    'method' =>'POST',
                    'enctype' =>'multipart/form-data'])!!}
            <div class="form-group">
                {{Form::label('title', 'Title')}}
                {{Form::text('title', '', ['class' => 'form-control', 'placeholder'=>'Title'])}}
            </div>
    
            <div class="form-group">
                {{Form::label('body', 'Body')}}
                {{Form::textarea('body', '', [ 'id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder'=>'Body Text'])}}
            </div>
            
            <div class="form-group">
                    {{Form::file('cover_image')}}
            </div>
                
            {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
            
        {!! Form::close() !!}
    </div>
@endsection