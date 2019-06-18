@extends('user.layouts.app')
{{-- This is where we will keep our landing page --}}
@section('content')
    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        @include('inc.messages')    
       <div class="row">
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
                                    <th><a href="/user/gallery/{{$gallery->slug}}" class="palmport-link" style="text-decoration: none">{{$gallery->title}}</a></th> 
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

            <div class="col-md-4">
                <div class="card card-user">
                        @if ($user->userProfile !== null)
                            <div class="image">
                                <img src= '/storage/cover_images/{{$profile->background_image}}' alt="...">
                            </div>
                            <div class="card-body">
                                <div class="author">
                                <a href="#">
                                    <img class="avatar border-gray" src= '/storage/cover_images/{{$profile->profile_pic}}' alt="...">
                                    <h5 class="title">{{$profile->full_name}}</h5>
                                </a>
                                <p class="description">
                                    {{$profile->slug}}
                                </p>
                                </div>
                                <p class="description text-center">
                                {{$profile->short_message}}
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
                        @else   
                            <div class="card-body">
                                {{-- <div class="author"> --}}
                                    <h2> You have no profile</h2>
                                    <a href="/user/profile/create" ><button class="btn btn-primmary">Create Profile</button></a>
                                    {{-- create alternate view in you have no profile--}}
                                {{-- </div> --}}
                            </div>
                        @endif
                            
                </div>
              </div>
        </div>
          
    
    </div>
@endsection
