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
        </div>
    </div>
    @endsection