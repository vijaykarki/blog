<nav class="navbar">
  <ul class="navbar-menu">
    <li>
      <a href="/">PORTFOLIO</a>
    </li>
    <li>
      <a href="/"> Home </a>
    </li>
    <li>
      <a href="/posts"> Blog </a>
    </li>
  </ul>
    <ul class="navbar-nav ml-auto navbar-login-register">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item navbar-login">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item navbar-login">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a href="/home" class="dropdown-item">Dashboard</a><br />
                            <a href="/posts/create" class="dropdown-item">Create Post</a><br />
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a><br />

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
  {{-- </ul> --}}
</nav>
