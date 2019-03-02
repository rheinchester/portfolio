@extends('user.layouts.app')
@section('content')
<div class="panel-header panel-header-sm">
    </div>
<div class="content">
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="title">Create Your Profile</h5>
            </div>
            <div class="card-body">
                {!! Form::open([
                    'action' => 'UserProfilesController@store',
                    'method' =>'POST',
                    'enctype' =>'multipart/form-data'])!!}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('full_name', 'Full name')}}
                                {{-- 'name', 'value', 'attributes' --}}
                                {{Form::text('full_name', '', ['class' => 'form-control', 'placeholder'=>'Full Name'])}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('occupation', 'Occupation')}}
                                {{-- 'name', 'value', 'attributes' --}}
                                {{Form::text('occupation', '', ['class' => 'form-control', 'placeholder'=>"Occupation"])}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{Form::label('short_message', 'Short Message')}}
                                {{-- 'name', 'value', 'attributes' --}}
                                {{Form::text('short_message', '', ['class' => 'form-control', 'placeholder'=>""])}}
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('', 'Tools')}}
                                {{Form::textarea('tools', '', ['class' => 'form-control', 'placeholder'=>''])}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('', 'Skills')}}
                                {{Form::textarea('skills', '', ['class' => 'form-control', 'placeholder'=>''])}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{Form::label('', 'Career Highlight')}}
                                {{Form::textarea('career_stats', '', ['class' => 'form-control', 'placeholder'=>''])}}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                {{Form::label('short_bio', 'Short Bio')}}
                                {{Form::textarea('short_bio', '', ['class' => 'form-control', 'placeholder'=>''])}}
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
                            {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    </div>
</div>
@endsection