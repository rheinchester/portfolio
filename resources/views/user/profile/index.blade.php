@extends('layouts.app')
@section('content')
@if ($profile)
<div class="page-header" style="max-height:500px">
  <div class="page-header-image" data-parallax="true" style="background-image: url('/storage/cover_images/{{$profile->background_image}}');"></div>
  <div class="container">
    <div class="content-center">
      <div class="photo-container" style="border: 2px solid #EEEEEE;" >
        <img  src= '/storage/cover_images/{{$profile->profile_pic}}' alt="">
      </div>
      <h3 class="title">{{$profile->full_name}} </h3>
      <p class="category">{{$profile->occupation}}</p>
      <div class="content">
        <h6>{{$profile->short_message}} </h6>
      </div>
    </div>
  </div>
</div>
<div class="main">
  <div class="section" style="background-color: #EEEEEE;">
    <div class="col-md-10 ml-auto col-xl-6 mr-auto">
      <h5 class="category">About {{$profile->full_name}} </h5>
      <!-- Nav tabs -->
      <div class="card">
        <!-- padding: 0.75rem 1.25rem -->
        <div class="card-header">
          <ul class="nav nav-tabs justify-content-center" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#home" role="tab">
                <i class="now-ui-icons objects_umbrella-13"></i>Short Bio
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#profile" role="tab">
                <i class="now-ui-icons shopping_cart-simple"></i> Skills
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#messages" role="tab">
                <i class="now-ui-icons shopping_shop"></i> Career Stats
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#settings" role="tab">
                <i class="now-ui-icons ui-2_settings-90"></i> Tools
              </a>
            </li>
          </ul>
        </div>
        <div class="card-body">
          <!-- Tab panes -->
          <div class="tab-content text-center">
            <div class="tab-pane active" id="home" role="tabpanel">
              {{$profile->short_bio}}
            </div>
            <div class="tab-pane" id="profile" role="tabpanel">
              {{$profile->skills}}
            </div>
            <div class="tab-pane" id="messages" role="tabpanel">
              {{$profile->career_stats}}
            </div>
            <div class="tab-pane" id="settings" role="tabpanel">
              {{$profile->tools}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="section section-about-us">
    <div class="container">
      <h3 class="title text-center">
        <i class="now-ui-icons ui-2_settings-90"></i>      What i've done recently    <i class="now-ui-icons ui-2_settings-90"></i>
      </h3>
      <div class="separator separator-primary"></div>
      @if (count($galleries) > 0)
      @foreach ($galleries as $gallery)
      
      <div class="card">
        <div class="row">
          <div class="col-md-4 col-sm-4">
              <a href="/user/gallery/{{$gallery->slug}}" style="text-decoration:none"><img style="width:100%; height:250px; "  src="/storage/cover_images/{{$gallery->cover_image}}"></a>
          </div>
          <div class="col-md-8 col-sm-8">
            <h3 style="padding:10px"><a href="/user/gallery/{{$gallery->slug}}" style="text-decoration:none">{{$gallery->title}} </a></h3> 
            <p>{{$gallery->body}}</p>
            {{-- <small>written on {{$gallery->created_at}} by {{$gallery->user->name}} </small>  --}}
          </div>
        </div>
      </div>
      @endforeach
      @else
      <div class="row">
        <div class="col-md-12"> <h3 class="text-center">{{$response}} <a href="/user/gallery/create"><button  class="btn btn-success">Create Gallery</button></a> </h3></div>
      </div>
      @endif
      {{$galleries->links()}}

    </div>
  </div>
</div>
</div>

@endsection 

@else
    
<div class="section section-about-us">
    <div class="container">
      <h3 class="title text-center">
        <i class="now-ui-icons ui-2_settings-90"></i>      You have no Profile  <i class="now-ui-icons ui-2_settings-90"></i>
      </h3>
      <div class="separator separator-primary"></div>

        <div class="row">
          <div class="col-md-12"> <h3 class="text-center"> <a href="/user/profile/create"><button  class="btn btn-success">Create Profile</button></a> </h3></div>
        </div>
      {{-- @endif --}}
      {{-- {{$galleries->links()}} --}}

    </div>
  </div>
</div>
</div>

@endsection


@endif
