@extends('layouts.app')
@section('content')
	<div class="page-header" style="max-height:500px">
			<div class="page-header-image" data-parallax="true" style="background-image: url('/storage/cover_images/awesome-pictures-32-1.jpg');"></div>
      <div class="container">
        <div class="content-center">
          <div class="photo-container">
            <img src= '/storage/cover_images/ryan.jpg' alt="">
          </div>
          <h3 class="title">Jacob okoro</h3>
          <p class="category">Photographer</p>
          <div class="content">
              <h2>Hello, Nice to meet you</h2>
          </div>
        </div>
    </div>
  </div>
  <div class="main">
    <div class="section" style="background-color: #EEEEEE;">
      <div class="col-md-10 ml-auto col-xl-6 mr-auto">
          <p class="category">About me</p>
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
                  <p>I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. So when you get something that has the name Kanye West on it, it’s supposed to be pushing the furthest possibilities. I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus.</p>
                  <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quod quae sapiente quidem? Ut, qui repellendus? Numquam eum expedita assumenda hic perspiciatis aliquam odio fugiat, voluptas soluta iste, ratione possimus fugit.</p>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste rem ex molestias quisquam, aliquam aspernatur cum placeat quas minima, eveniet aut id omnis eius obcaecati mollitia architecto dolor temporibus quis.</p>
                </div>
                <div class="tab-pane" id="profile" role="tabpanel">
                  <p> I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus. I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. </p>
                </div>
                <div class="tab-pane" id="messages" role="tabpanel">
                  <p>I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. So when you get something that has the name Kanye West on it, it’s supposed to be pushing the furthest possibilities. I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus.</p>
                </div>
                <div class="tab-pane" id="settings" role="tabpanel">
                  <p>
                    "I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus. I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at."
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="section section-about-us">
      <div class="container">
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
        {{-- <div class="separator separator-primary"></div> --}}
        <hr>
        <div class="section-story-overview">
            <div class="row">
              <div class="col-md-6">
                <div class="image-container" style="background-image: url('/storage/cover_images/img/bg5.jpg')"></div>
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
        <div class="section-story-overview">
            <div class="row">
              <div class="col-md-6">
                <div class="image-container" style="background-image: url('/storage/cover_images/img/bg11.jpg')"></div>
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
          </div>
      </div>
    </div>
  </div>
@endsection
	