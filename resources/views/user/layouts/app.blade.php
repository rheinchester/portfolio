<!DOCTYPE html>
<html lang="en">
<head>
    @include('user.layouts.head')
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        @include('user.layouts.header')
        @include('user.layouts.sidebar')
        @section('main')
            @show
        @include('user.layouts.footer')
    </div>
    @include('user.layouts.scripts')
</body>
</html>