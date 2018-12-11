@extends('layouts.app')
@foreach ($galleries as $gallery)
    <li>{{$gallery}}</li>
@endforeach