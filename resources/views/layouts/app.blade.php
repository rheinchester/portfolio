@include('inc.header')
    <div id="app">
        <main class="py-4">
            @include('inc.navbar')
            <div class="container">
                @include('inc.messages')
                @yield('content')
            </div>                      
        </main>
    </div>
    @include('inc.bottom')