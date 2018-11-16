@extends('layouts.app')

@section('content')
    <h1>This is the Service page</h1>
    @if(is_array($skills) && count($skills) > 0)
        <ul>
            @foreach ($skills as $skill)
                @if (str_replace(' ', '', $skill) != '')
                    <li class="list-group-item">{{$skill}}</li>
                @endif
            @endforeach
        </ul>
    @else
        <h3>{{$response}}</h3>
    @endif
@endsection 