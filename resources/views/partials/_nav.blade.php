<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Clinic App</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="{{ Request::is('/') ? 'active' : ''}}"><a href="{{ route('home') }}">Strona główna</a></li>
       	<li class="{{ Request::is('about') ? 'active' : ''}}"><a href="{{ route('about') }}">O nas</a></li>
        <li class="{{ Request::is('services/*') ? 'active' : ''}}"><a href="{{ route('services.specializations') }}">Usługi</a></li>
        <li class="{{ Request::is('contact') ? 'active' : ''}}"><a href="{{ route('contact') }}">Kontakt</a></li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        @if (Auth::guard('admin')->check())
          
          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Moje konto (admin) <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="{{ route('doctors.index') }}">Lekarze</a></li>
                <li><a href="{{ route('specializations.index') }}">Specjalizacje</a></li>
                <li><a href="{{ route('facilities.index') }}">Placówki</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="{{ route('admin.logout') }}">Wyloguj</a></li>
              </ul>
           </li>
        @elseif (Auth::guard('web')->check())
          
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Moje konto <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li role="separator" class="divider"></li>
                <li><a href="{{ route('logout') }}">Wyloguj</a></li>
              </ul>
            </li>
          </ul>

        @else
            
            <li><a href="{{ route('register') }}">Zarejestruj</a></li>
            <li><a href="{{ route('login') }}">Zaloguj</a></li>

        @endif
      </ul>
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>