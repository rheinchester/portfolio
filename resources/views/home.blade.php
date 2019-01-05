@extends('layouts.app')

{{-- This is where we will keep our landing page --}}
@section('content')
@include('inc.padding')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}     
                    </div>
                    @endif
                    <div class="panel-body">
                        <a href="/user/gallery/create" ><button class="btn btn-primmary">Create Gallery</button></a>
                        @if (count($galleries) > 0)
                        <h3>Your Gallery</h3>
                        <table class="table table-striped">
                            <tr>
                                <th>Title</th>
                                <th></th>
                                <th></th>
                            </tr>
                            
                            @foreach ($galleries as $gallery)
                            <tr>
                                <th>{{$gallery->title}}</th>
                                <th><a href="/user/gallery/{{$gallery->id}}/edit" ><button class="btn btn-primary"> Edit</button></a></th>
                                <th>
                                    {!!Form::open([
                                        'action' => ['GalleriesController@destroy', $gallery->id],
                                        'method' => 'POST',
                                        'class' => 'float-right'])!!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
                                        {!! Form::close() !!}
                                    </th>
                                </tr>    
                                @endforeach
                            </table>
                            @else
                            <h3>{{$response}}</h3>
                            @endif
                            
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    