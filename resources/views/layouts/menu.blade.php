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
            <a class="navbar-brand" href="{{ url('/') }}">Work Application</a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar  -->
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Справочники <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('/mvz') }}">МВЗ</a></li>
                        <li><a href="{{ url('/addresse') }}">Адреса</a></li>
                        <li><a href="{{ url('/phone') }}">Телефоны</a></li>
                        <li><a href="{{ url('/equiptype') }}">Типы оборудования</a></li>
                        <li><a href="{{ url('/coworker') }}">Сотрудники</a></li>
                        <li><a href="{{ url('/phoneowner') }}">Телефоны(владельцы)</a></li>
                        <li><a href="{{ url('/equip') }}">Оборудование</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
