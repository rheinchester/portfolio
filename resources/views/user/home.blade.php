@extends('user.layouts.app')

{{-- This is where we will keep our landing page --}}
@section('content')
    <div class="panel-header panel-header-sm">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}     
            </div>
        @endif
    </div>
    <div class="content">
        
    </div>
@endsection
