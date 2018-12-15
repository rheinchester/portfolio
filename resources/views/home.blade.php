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
                        <a href="/posts/create" ><button class="btn btn-primmary">Create Post</button></a>
                        @if (count($posts)> 0)
                            <h3>Your blog post</h3>
                            <table class="table table-striped">
                            <tr>
                                <th>title</th>
                                <th></th>
                                <th></th>
                            </tr>
                            
                            @foreach ($posts as $post)
                                <tr>
                                    <th>{{$post->title}}</th>
                                    <th><a href="/posts/{{$post->id}}/edit" ><button class="btn btn-primary"> Edit</button></a></th>
                                    <th>
                                        {!!Form::open([
                                            'action' => ['PostsController@destroy', $post->id],
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
