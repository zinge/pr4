<nav class="navbar navbar-default">
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
            @if (Auth::guest())
              <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name') }}
              </a>
            @else
              <a class="navbar-brand" href="{{ url('/home') }}">
                {{ config('app.name') }}
              </a>
            @endif
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar  -->
            <ul class="nav navbar-nav">
                @if (Auth::guest())
                  &nbsp;
                @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Справочники <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('/mvzs') }}">МВЗ</a></li>
                        <li><a href="{{ url('/addresses') }}">Адреса</a></li>
                        <li><a href="{{ url('/phone') }}">Телефоны</a></li>
                        <li><a href="{{ url('/equiptype') }}">Типы оборудования</a></li>
                        <li><a href="{{ url('/coworker') }}">Сотрудники</a></li>
                        <li><a href="{{ url('/phoneowner') }}">Телефоны(владельцы)</a></li>
                        <li><a href="{{ url('/equip') }}">Оборудование</a></li>
                    </ul>
                </li>
                    @if (Auth::user()->hasRole('root'))
                      <ul class="nav navbar-nav">
                          <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Разрешения <span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Пользователи</a></li>
                                <li><a href="{{ url('/roles') }}">Роли</a></li>
                                <li><a href="{{ url('/rolemembers') }}">Права</a></li>
                              </ul>
                          </li>
                      </ul>
                    @endif
                  @endif
            </ul>





            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
