<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  @include('inc.header')
  <body class="profile-page sidebar-collapse"> 
    @include('inc.navbar')
    @include('inc.messages')
      @yield('content')
    @include('inc.bottom')   
  </body>
</html>