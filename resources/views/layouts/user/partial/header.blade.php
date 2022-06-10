<header id="header" class=" {{ request()->is('/') ? 'fixed-top' : 'fixed-top header-inner-pages' }} ">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="{{ url('/') }}">{{ $webSetting->title }}</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="{{ url('/') }}">Home</a></li>
          <li><a class="nav-link scrollto" href="{{ url('/') }}/#about">About</a></li>
          <li><a class="nav-link scrollto" href="{{ url('/') }}#services">Services</a></li>
          <li><a class="nav-link scrollto " href="{{ url('/') }}#portfolio">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="{{ url('/') }}#team">Team</a></li>
          <li><a href="@route('blogs')">Blog</a></li>
          <li><a class="nav-link scrollto" href="{{ url('/') }}#contact">Contact</a></li>
          <li class="dropdown"><a href="#"><span>{{ Auth::check() ? Auth::user()->name : 'Singup/Login' }}</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Dashboard</a></li>
              <li><a href="#">Logout</a></li>
            </ul>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header>

  @if ( request()->is('/') == '/')
  <section id="hero">
    <div class="hero-container">
      <h3>Welcome to <strong>{{ $webSetting->title }}</strong></h3>
      <h1>{{ $webSetting->heading_1 }}</h1>
      <h2>{{ $webSetting->heading_2 }}</h2>
      <a href="#about" class="btn-get-started scrollto">Get Started</a>
    </div>
  </section>
  @else
  @endif
