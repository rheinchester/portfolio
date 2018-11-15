<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <a  class="navbar-brand" href="/">{{config('app.name', 'Jacob okoro')}}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/about">About</a>
            </li>   

            <li class="nav-item">
                <a class="nav-link disabled" href="/contact">Contact</a>
            </li>

            <li class="nav-item">
                <a class="nav-link disabled" href="/services">Services</a>
            </li>   
            
            <li class="nav-item">
                <a class="nav-link disabled" href="/posts/create">Posts</a>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="nav-item"><a class="nav-link" href="/posts/create">create Post </a></li>
        </ul> 
        
    </div>
</nav>