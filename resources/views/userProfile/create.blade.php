@extends('layouts.app')

@section('content')
    <section class="container">
        <h1>Create Profile</h1>
        {!! Form::open([
            'action' => 'UserProfilesController@store',
            'method' =>'POST',
            'enctype' =>'multipart/form-data'])!!}
        <div class="form-group">
            {{Form::label('', '')}}
            {{-- 'name', 'value', 'attributes' --}}
            {{Form::text('full_name', '', ['class' => 'form-control', 'placeholder'=>'Full Name'])}}
        </div>
        
        <div class="form-group">
            {{Form::label('', '')}}
            {{-- 'name', 'value', 'attributes' --}}
            {{Form::text('occupation', '', ['class' => 'form-control', 'placeholder'=>'Occupation'])}}
        </div>

        <div class="form-group">
            {{Form::label('', '')}}
            {{Form::text('short_message', '', ['class' => 'form-control', 'placeholder'=>'Short message'])}}
        </div>
        
        <div class="form-group">
            {{Form::label('', '')}}
            {{Form::textarea('short_bio', '', ['class' => 'form-control', 'placeholder'=>'Short bio'])}}
        </div>
        
        <div class="form-group">
            {{Form::label('', '')}}
            {{Form::textarea('skills', '', ['class' => 'form-control', 'placeholder'=>'skills'])}}
        </div>


        <div class="form-group">
            {{Form::label('', '')}}
            {{Form::textarea('career_stats', '', ['class' => 'form-control', 'placeholder'=>'Career stats'])}}
        </div>

        <div class="form-group">
            {{Form::label('', '')}}
            {{Form::textarea('tools', '', ['class' => 'form-control', 'placeholder'=>'Tools'])}}
        </div>
        <div class="form-group">
            {{Form::file('new_pic')}}
        </div>

        <div class="form-group">
            {{Form::file('background_image')}}
        </div>
        
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
        
        {!! Form::close() !!}
    </section>
    @endsection