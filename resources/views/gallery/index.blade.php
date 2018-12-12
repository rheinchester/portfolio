@extends('layouts.app')
@foreach ($galleries as $gallery)
    <li>{{$gallery->body}}</li>
@endforeach