<!DOCTYPE html>
<html lang="en">
<head>
    @include('auth.admin.layouts.head')
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        @include('auth.admin.layouts.header')
        @include('auth.admin.layouts.sidebar')
        @section('main-content')   
          @show
          {{--  if section is short use yield  --}}
        @include('auth.admin.layouts.footer')
    </div>
    @include('auth.admin.layouts.scripts')
</body>
</html>