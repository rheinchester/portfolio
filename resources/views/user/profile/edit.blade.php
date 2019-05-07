
@extends('user.layouts.app')
@section('content')
<div class="panel-header panel-header-sm">
    </div>
<div class="content">
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="title">Edit Your Profile</h5>
            </div>
            <div class="card-body">
                {!! Form::open([
                    'action' => ['UserProfilesController@update', $profile->id],
                    'method' =>'POST',
                    'enctype' =>'multipart/form-data'])!!}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('full_name', 'Full name')}}
                                {{-- 'name', 'value', 'attributes' --}}
                                {{Form::text('full_name', $profile->full_name, ['class' => 'form-control', 'placeholder'=>'Full Name'])}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('occupation', 'Occupation')}}
                                {{-- 'name', 'value', 'attributes' --}}
                                {{Form::text('occupation', $profile->occupation, ['class' => 'form-control', 'placeholder'=>"Occupation"])}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{Form::label('short_message', 'Short Message')}}
                                {{-- 'name', 'value', 'attributes' --}}
                                {{Form::text('short_message', $profile->short_message, ['class' => 'form-control', 'placeholder'=>""])}}
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('', 'Tools')}}
                                {{Form::textarea('tools', $profile->tools, ['class' => 'form-control', 'placeholder'=>''])}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('', 'Skills')}}
                                {{Form::textarea('skills', $profile->skills, ['class' => 'form-control', 'placeholder'=>''])}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{Form::label('', 'Career Highlight')}}
                                {{Form::textarea('career_stats', $profile->career_stats, ['class' => 'form-control', 'placeholder'=>''])}}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                {{Form::label('short_bio', 'Short Bio')}}
                                {{Form::textarea('short_bio', $profile->short_bio, ['class' => 'form-control', 'placeholder'=>''])}}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::file('profile_pic')}}
                            </div>  
                        </div>
                        

                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::file('background_image')}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            {{Form::hidden('_method', 'PUT')}}
                            {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <div class="col-md-4">
            <div class="card card-user">
                <div class="image">
                    <img src="/storage/cover_images/{{$profile->background_image}}" alt="..." >
                </div>
                <div class="card-body">
                    <div class="author">
                        <a href="#">
                            <img class="avatar border-gray"src="/storage/cover_images/{{$profile->profile_pic}}" alt="...">
                            <h5 class="title">{{$profile->full_name}} </h5>
                        </a>
                        <p class="description">
                                {{$profile->occupation}}
                        </p>
                    </div>
                    <p class="description text-center">
                        {{$profile->short_bio}}
                    </p>
                </div>
                <hr>
                <div class="button-container">
                    <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                        <i class="fab fa-facebook-f"></i>
                    </button>
                    <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                        <i class="fab fa-twitter"></i>
                    </button>
                    <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                        <i class="fab fa-google-plus-g"></i>
                    </button>
                </div>
            </div>
        </div>
</div>
</div>
@endsection