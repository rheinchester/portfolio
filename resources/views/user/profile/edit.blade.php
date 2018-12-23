@extends('layouts.app')
@section('content')
@include('inc.padding')
    <section class="container">
        <div class="container">
                <h1>Create Profile</h1>
                {{$profile}}
                {!! Form::open([
                    'action' => ['UserProfilesController@update', $profile->id],
                    'method' =>'POST',
                    'enctype' =>'multipart/form-data'])!!}
                <div class="form-group">
                    {{Form::label('', '')}}
                    {{-- 'name', 'value', 'attributes' --}}
                    {{Form::text('full_name', $profile->full_name, ['class' => 'form-control', 'placeholder'=>'Full Name'])}}
                </div>
                <div class="form-group">
                    {{Form::label('', '')}}
                    {{Form::text('occupation', $profile->occupation, ['class' => 'form-control', 'placeholder'=>'Occupation'])}}
                </div>
                <div class="form-group">
                    {{Form::label('', '')}}
                    {{Form::text('short_message', $profile->short_message, ['class' => 'form-control', 'placeholder'=>'Short message'])}}
                </div>
                <div class="form-group">
                    {{Form::label('', '')}}
                    {{Form::textarea('short_bio', $profile->short_bio, [ 'class' => 'form-control', 'class' => 'form-control', 'placeholder'=>'Short bio'])}}
                </div>
                <div class="form-group">
                    {{Form::label('', '')}}
                    {{Form::textarea('skills', $profile->skills, [ 'class' => 'form-control', 'class' => 'form-control', 'placeholder'=>'skills'])}}
                </div>
                <div class="form-group">
                    {{Form::label('', '')}}
                    {{Form::textarea('career_stats', $profile->career_stats, [ 'class' => 'form-control', 'class' => 'form-control', 'placeholder'=>'Career stats'])}}
                </div>
                <div class="form-group">
                    {{Form::label('', '')}}
                    {{Form::textarea('tools', $profile->tools, [ 'class' => 'form-control', 'class' => 'form-control', 'placeholder'=>'Tools'])}}
                </div>
                <div class="form-group">
                    {{Form::file('profile_pic')}}
                </div>
                <div class="form-group">
                    {{Form::file('background_image')}}
                </div>
                    {{Form::hidden('_method', 'PUT')}}
                    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
                {!! Form::close()!!}
        </div>
    </section>
    @endsection