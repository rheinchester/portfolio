<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  @include('inc.header')
  <body class="profile-page sidebar-collapse"> 
    {{-- @include('inc.facebook-sdk') --}}
    @include('inc.navbar')
    @include('inc.messages')
      @yield('content')
    @include('inc.bottom')
    {{-- <script src="./resources/js/components/App.js"></script> --}}
  </body>
</html>