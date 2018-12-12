@extends('layouts.app')
@section('content')
    <ul>
        <li>{{$profile->full_name}}</li>
        <li>{{$profile->occupation}}</li>
        <li> {{$profile->tools}}</li>
        <li>{{$profile->skills }}</li>
        <li>{{$profile->id }}</li>
        <img src="/storage/cover_image/{{$profile->profile_pic}}" alt="">
    </ul>
    <a href="/userProfile/{{$profile->id}}/edit" class="btn btn-default">Edit Profile</a>
@endsection

