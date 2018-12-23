@extends('layouts.app')
@section('content')
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
              <h3>{{$profile->short_message}} </h3>
          </div>
        </div>
    </div>
  </div>
  <div class="main">
    <div class="section" style="background-color: #EEEEEE;">
      <div class="col-md-10 ml-auto col-xl-6 mr-auto">
          <h5 class="category">About me</h5>
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
        <div class="section-story-overview">
          <div class="row">
            <div class="col-md-6">
              <div class="image-container" style="background-image: url('/storage/cover_images/img/login.jpg')"></div>
                  <br>
                </p>
              </div>
              <!-- Second image on the left side of the article -->
              <div class="col-md-5">
                  <h3>So what does the new record for the lowest level of winter ice actually mean</h3>
                  <p>The Arctic Ocean freezes every winter and much of the sea-ice then thaws every summer, and that process will continue whatever happens with climate change. Even if the Arctic continues to be one of the fastest-warming regions of the world, it will always be plunged into bitterly cold polar dark every winter. And year-by-year, for all kinds of natural reasons, there’s huge variety of the state of the ice.
                  </p>
                </div>
            </div>
          </div>
        <hr>
        @foreach ($profile->galleries as $gallery)
        @if ($profile->id == $gallery->user_id)
            <div class="section-story-overview">
            <div class="row">
              <div class="col-md-6">
                <div class="image-container" style="background-image: url('/storage/cover_images/{{$gallery->cover_image}}')"></div>
                    <br>
                  </p>
                </div>
                <!-- Second image on the left side of the article -->
                <div class="col-md-5">
                    <h3>{{$gallery->title}}</h3>
                    <p>{{$gallery->body}}</p>
                  </div>
              </div>
            </div>
            <hr>
        @endif
            
        @endforeach
          
          </div>
      </div>
    </div>
  </div>
@endsection
	