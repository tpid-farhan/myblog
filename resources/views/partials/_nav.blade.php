<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Laravel Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
      
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="{{Request::is('/') ? 'nav-link active' : 'nav-link'}}" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="{{Request::is('blog') ? 'nav-link active' : 'nav-link'}}" href="{{ route('blog.archive') }}">Blog</a>
            </li>
            <li class="nav-item">
                <a class="{{Request::is('about') ? 'nav-link active' : 'nav-link'}}" href="/about">About</a>
            </li>
            <li class="nav-item">
                <a class="{{Request::is('contact') ? 'nav-link active' : 'nav-link'}}" href="/contact">Contact</a>
            </li>
        </ul>
        <ul class="navbar-nav navbar-right">
            @if (Auth::check())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Hello, {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('posts.index') }}">Posts</a>
                        <a class="dropdown-item" href="{{ route('categories.index') }}">Categories</a>
                        <a class="dropdown-item" href="{{ route('tags.index') }}">Tags</a>
                        <div class="dropdown-divider"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="dropdown-item" type="submit" name="submit">Logout</button>
                        </form>                        
                    </div>
                </li>
            @else
                <a class="dropdown-item" href="{{ route('login') }}">Login</a>
            @endif
        </ul>
    </div>
</nav>