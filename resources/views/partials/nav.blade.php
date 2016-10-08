<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('home') }}">
              <i class="fa fa-whatsapp" aria-hidden="true"></i> CHAT
            </a>
            @if (Auth::check())
              <div class="nav navbar-nav">
                <li><a href="#">Timeline</a></li>
                <li><a href="{{ route('firends.index') }}">Friends</a></li>

              </div>
              <form class="navbar-form navbar-left" action="{{ route('search') }}">
                <div class="form-group">
                  <input type="text" name="query" class="form-control" placeholder="Find people">
                </div>
                <button type="submit" class="btn btn-primary"><i class="fa fa-search-plus" aria-hidden="true"></i></button>
              </form>

            @endif
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <i class="fa fa-user" aria-hidden="true"></i> {{ Auth::user()->username }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                              <a href="{{ route('profile', ['id'=>Auth::user()->username]) }}">My profile</a>
                              <a href="{{ route('profile.edit') }}">Update profile</a>
                                <a href="{{ url('/logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
