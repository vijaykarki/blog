<style>
.navbar {
    background-color: azure;
}

.navbar a {
    color: #b22222c2;
    text-decoration: none;
}

.navbar a:hover,
.navbar a:focus {
    color: #281c22;
}
.navbar .navbar-nav {
    display: inline-block;
    
}

.navbar .navbar-brand {
    font-size: 2em;
    font-weight: bold;
}

.navbar .navbar-nav .nav-item .navigation-link {
    font-size: 1.5em;
    font-weight: bold;
    text-decoration: none;
}

.navbar .navbar-nav .nav-item {
    display: inline-block;
}

.navbar .navbar-nav .nav-item .navigation-link {
    display: block;
    padding: 10px 15px 10px;

}

</style>

<nav class="navbar">
    

    <div class="navbarNav" id="navbarNav">
    <ul class="navbar-nav">
    <a class="navbar-brand" href="/">Blog</a>
</ul>
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="navigation-link" href="/">Home</a>
            </li>
            @if (Auth::check())
                <li class="nav-item">
                    <a class="navigation-link" href="{{ route('posts.create') }}">Create Post</a>
                </li>
                <li class="nav-item">
                    <a class="navigation-link" href="{{ route('profiles.show', Auth::user()->profile) }}">Profile</a>
                </li>
                @if (Auth::user()->role == 'admin')
                <li class="nav-item"><a class="navigation-link" href="{{ route('users.index') }}">Assign Roles</a></li>
                @endif

                <li class="nav-item">
                    <a class="navigation-link" href="{{ route('logout') }}">Logout</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="navigation-link" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="navigation-link" href="{{ route('register') }}">Register</a>
                </li>
            @endif
        </ul>
    </div>
</nav>
