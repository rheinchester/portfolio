@extends('layouts.app')

@section('content')
    <div class="container">
        @include('inc.padding')
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}     
            </div>
        @endif
        <h1 class="text-center">Galleries</h1>
        @if (count($galleries)>0)
            @foreach ($galleries as $gallery)
                @if (Auth::user()->id == $gallery->user->id)
                    <div class="card">
                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                                <img style="width:100%; height:250px;"  src="/storage/cover_images/{{$gallery->cover_image}}">
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <h3><a style="text-decoration:none"  href="/user/gallery/{{$gallery->id}}">{{$gallery->title}} </a></h3> 
                                <small>written on {{$gallery->created_at}} by {{$gallery->user->name}} </small>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
            {{$galleries->links()}}
        @else
            <h3 class="text-center"> {{$response}} <a href="/user/gallery/create" ><button class="btn btn-success"> Create Gallery</button></a></h3>   
            
        @endif
    </div>
@endsection
