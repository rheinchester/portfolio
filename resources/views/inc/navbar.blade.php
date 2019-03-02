
<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent" color-on-scroll="400">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="{{ url('/') }}">
          @guest
            {{ config('app.name', 'Laravel') }}
          @else
            {{ Auth::user()->name }} 
          @endguest
        </a>
        <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar top-bar"></span>
          <span class="navbar-toggler-bar middle-bar"></span>
          <span class="navbar-toggler-bar bottom-bar"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="./assets/img/blurred-image-1.jpg">
        <ul class="navbar-nav">
          {{-- Authentication links --}}
          @guest
            <li class="nav-item">
              <a class="nav-link btn btn-neutral" href="{{ route('login') }}">
                <i class="now-ui-icons arrows-1_share-66"></i>
                <p>{{ __('Login') }}</p>
              </a>
            </li>
            <li class="nav-item">
              @if (Route::has('register'))
                <a class="nav-link" href="{{ route('register') }}">
                  <i class="now-ui-icons education_paper"></i>
                  <p>{{ __('Register') }}</p>
                </a>
              @endif
            </li>
          @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/user/home ">Go home</a>
                    
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/user/profile/{{Auth::user()->userProfile->id}}/edit ">Edit Profile</a>   
            </li>
          @endguest
        </ul>
      </div>
    </div>
  </nav>
  
  <!-- End Navbar -->
  <div class="wrapper">
