<!DOCTYPE html>
<html lang="en">
    <head>
        @include('user.inc.head')
    </head>
    <body class="">
        <div class="wrapper ">
             <!-- sidebar -->
            @include('user.inc.sidebar')
            <div class="main-panel">
            <!-- Navbar -->
                @include('user.inc.navbar')
                {{-- @include('inc.messages') --}}
                @section('content')
                    @show
                <footer class="footer">
                @include('user.inc.footer')
                </footer>
            </div>
        </div>
        @include('user.inc.scripts')
    </body>

</html>
