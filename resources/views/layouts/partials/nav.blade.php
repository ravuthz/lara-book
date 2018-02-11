<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ url('/') }}">Larabook</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      @if ($user)
        <ul class="nav navbar-nav">
          <li class="{{ Request::is('users') ? 'active' : '' }}">
            {{ link_to_route('users.index', 'Users') }}
          </li>
        </ul>
      @endif
      
      <form class="navbar-form navbar-left" role="search" action="{{ $searchUrl or '' }}">
        <div class="form-group">
          <input type="text" name="q" class="form-control" placeholder="Search">
        </div>
        {{-- <button type="submit" class="btn btn-default">Submit</button> --}}
      </form>
      <ul class="nav navbar-nav navbar-right">
        @if (!$user)
          <li><a href="{{ url('/login') }}">Login</a></li>
          <li><a href="{{ url('/register') }}">Register</a></li>
        @else
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
              <img class="nav-gravatar" src="{{ Auth::user()->gravatarLink() }}" alt="{{ $user->username }}">
              {{ $user->fullName() }} <span class="caret"></span>
            </a>

            <ul class="dropdown-menu" role="menu">
              <li>
                {{ link_to_route('users.show', 'Profile', $user->slug) }}
              </li>
              <li>
                <a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a>
              </li>
            </ul>
          </li>
        @endif
      </ul>
    </div>
    </div>
</nav>