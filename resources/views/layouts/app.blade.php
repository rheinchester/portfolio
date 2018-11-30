@include('inc.header')
  @include('inc.navbar')
  {{-- why is the main tag here? --}}
    <main>
      @include('inc.messages')
      @yield('content')
    </main>
@include('inc.bottom')