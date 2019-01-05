@extends('user.layouts.app')
@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Create Your Gallery</h5>
                </div>
                <div class="card-body">
                    {!! Form::open([
                        'action' => 'GalleriesController@store',
                        'method' =>'POST',
                        'enctype' =>'multipart/form-data'])!!}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{Form::label('title', 'Title')}}
                                    {{-- 'name', 'value', 'attributes' --}}
                                    {{Form::text('title', '', ['class' => 'form-control', 'placeholder'=>""])}}
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{Form::label('body', 'Body')}}
                                    {{Form::textarea('body', '', ['class' => 'form-control', 'placeholder'=>''])}}
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{Form::file('cover_image')}}
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
            <div class="col-md-4">
                <div class="card card-user">
                    <div class="image">
                        <img src="../assets/img//bg5.jpg" alt="..." >
                    </div>
                    <div class="card-body">
                        <div class="author">
                            <a href="#">
                                <img class="avatar border-gray" src="../assets/img//mike.jpg" alt="...">
                                <h5 class="title">Mike Andrew</h5>
                            </a>
                            <p class="description">
                                michael24
                            </p>
                        </div>
                        <p class="description text-center">
                            "Lamborghini Mercy
                            <br> Your chick she so thirsty
                            <br> I'm in that two seat Lambo"
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