<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title>
        @yield('title')
    </title>

    <!-- Styles -->
  <link href="{{asset('css/page.min.css')}}" rel="stylesheet">
  <link href="{{asset('css/style.css')}}" rel="stylesheet">
  @yield('css')


    <!-- Favicons -->
  <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.jpg')}}">
  <link rel="icon" href="{{asset('img/favicon.jpg')}}">
  </head>

  <body>


    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-stick-dark" data-navbar="sticky">
      <div class="container">

        <div class="navbar-left">
          {{-- <button class="navbar-toggler" type="button">&#9776;</button> --}}
          <a class="navbar-brand" href="/">
          <img class="logo-dark" src="{{asset('img/logo-dark.png')}}" alt="logo">
          <img class="logo-light" src="{{asset('img/logo-light.png')}}" alt="logo">
          </a>
        </div>

        {{-- <section class="navbar-mobile">
          <span class="navbar-divider d-mobile-none"></span>

          <ul class="nav nav-navbar">
            <li><a href="">About The blog</a></li>
            <li><a href="">About me</a></li>
            <li><a href="">Contacts</a></li>
        
          </ul>
        </section> --}}
        <ul class="nav navbar-nav navbar-right">
          <!-- Authentication Links -->
          @if (Auth::guest())
          <a class="btn btn-xs btn-round btn-success my-1" href="{{route('login')}}">Login</a>
          <a class="btn btn-xs btn-round btn-success my-1" href="{{route('register')}}">Register</a>
          @else
              <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                      <strong>{{ Auth::user()->name }}</strong> <span class="caret"></span>
                  </a>

                  <ul class="dropdown-menu" role="menu">
                        @if (auth()->user()->isAdmin())
                          <li>
                          <a class="btn btn-xs btn-round btn-success" href="{{ route('home')}}">Visit Panel</a>
                          </li>
                        @endif
                      <li>
                          <a class="btn btn-xs btn-round btn-danger" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                              Logout
                          </a>
                          <li>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                          </form>
                      </li>
                  </ul>
              </li>
          @endif
      </ul>

      {{-- <a class="btn btn-xs btn-round btn-success" href="{{route('login')}}">Login</a><br><br>
      <a class="btn btn-xs btn-round btn-success" href="{{route('register')}}">Register</a> --}}
      </div>
    </nav><!-- /.navbar -->


    @yield('header')

    @yield('content')
    
    <!-- Footer -->
    <footer class="footer">
      <div class="container">
        <div class="row gap-y align-items-center">

          <div class="col-6 col-lg-3">
          <a href="/"><img src="{{asset('img/logo-dark.png')}}" alt="logo"></a>
          </div>
          
          <div class="col-6 col-lg-3 text-right order-lg-last">
            <div class="social">
              <a class="social-facebook" href="https://www.facebook.com/Demba-Jr-Techdev-619066981920240/?eid=ARDMJYt1o2B8XB5Ep_fvCWIjc8I_vKNa71_F-2jptX9hIw7UuyR2M8SejPNA0ns67cYto53dxvb7bbaA" target="blank"><i class="fa fa-facebook"></i></a>
              <a class="social-twitter" href="https://twitter.com/DembaJr1" target="blank"><i class="fa fa-twitter"></i></a>
              <a class="social-instagram" href="https://www.instagram.com/0that_dan/" target="blank"><i class="fa fa-instagram"></i></a>
              <a class="social-dribbble" href="/"><i class="fa fa-dribbble"></i></a>
            </div>
          </div> 

          {{-- <div class="col-lg-6">
            <div class="nav nav-bold nav-uppercase nav-trim justify-content-lg-center">
              <a class="nav-link" href="../uikit/index.html">Elements</a>
              <a class="nav-link" href="../block/index.html">Blocks</a>
              <a class="nav-link" href="../page/about-1.html">About</a>
              <a class="nav-link" href="../blog/grid.html">Blog</a>
              <a class="nav-link" href="../page/contact-1.html">Contact</a>
            </div>
          </div> --}}

        </div>
      </div>
    </footer><!-- /.footer -->


    <!-- Scripts -->
<script src="{{asset('js/page.min.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5ed752495b0011dd"></script>
@yield('scripts')

  </body>
</html>
