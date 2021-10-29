<!doctype html>
<html lang="fr-FR">

  <head>
    <title>Gestion de location de voiture</title>
    <meta charset="utf-8">
    <link rel="icon" href="{{ asset('storage/images/site/fav.ico')}}" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=DM+Sans:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{ asset('css/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{ asset('fonts/flaticon/font/flaticon.css')}}">
    <link rel="stylesheet" href="{{ asset('css/aos.css')}}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">

  </head>

  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">


    <div class="site-wrap" id="home-section">

      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>



      <header class="site-navbar site-navbar-target" role="banner">

        <div class="container">
          <div class="row align-items-center position-relative">

            <div class="col-3 ">
              <div class="site-logo">
                <a href="index.html"><img style="width: 50px;" src="{{ asset('storage/images/site/fav.ico')}}"></a>
              </div>
            </div>

            <div class="col-9  text-right">


              <span class="d-inline-block d-lg-none"><a href="#" class="text-white site-menu-toggle js-menu-toggle py-5 text-white"><span class="icon-menu h3 text-white"></span></a></span>



              <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto ">
                  <li><a href="{{ route('home') }}" class="nav-link">Accueil</a></li>
                  <li><a href="{{ route('voiture.index') }}" class="nav-link">Liste des voitures</a></li>
                  <!-- <li><a href="about.html" class="nav-link">About+Services+Blog</a></li> -->
                  <!-- <li><a href="{{ route('public.create') }}" class="nav-link">Contact</a></li> -->
                  @if (Route::has('login'))
                  <li class="dropdup show">
                  	<a class="nav-link dropdown-toggle"  href="#" role="button" id="user" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  		@auth
                  		{{ Auth::user()->name }}
	                  	<div class="dropdown-menu" aria-labelledby="user">
							<a class="dropdown-item" href="{{ route('dashboard') }}">{{ __('Tableau de bord') }}</a>
							<a class="dropdown-item" href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">{{ __('Profil') }}</a>
							<div class="dropdown-divider"></div>
							@if (Auth::user()->isAdmin)
							<a class="dropdown-item" href="{{ route('voiture.index') }}" :active="request()->routeIs('voiture.index')">{{ __('Voitures') }}</a>
							<a class="dropdown-item" href="{{ route('agrement.index') }}" :active="request()->routeIs('agrement.index')">{{ __('Agréments') }}</a>
							@endif
							<a class="dropdown-item" href="{{ route('location.index') }}" :active="request()->routeIs('location.index')">{{ __('Locations') }}</a>
							<div class="dropdown-divider"></div>
							<!-- Authentication -->
			                <form method="POST" action="{{ route('logout') }}" class="dropdown-item">
			                    @csrf

			                    <x-jet-responsive-nav-link href="{{ route('logout') }}"
			                                   onclick="event.preventDefault();
			                                    this.closest('form').submit();">
			                        {{ __('Se déconnecter') }}
			                    </x-jet-responsive-nav-link>
			                </form>
						</div>
	                    @else
                  		Compte
	                  	<div class="dropdown-menu" aria-labelledby="user">
							<a class="dropdown-item" href="{{ route('login') }}">Se connecter</a>
							@if (Route::has('register'))
							<a class="dropdown-item" href="{{ route('register') }}" >S'inscrire</a>
                        	@endif
						</div>
	                    @endauth
                  	</a>
                  </li>
                  @endif
                </ul>
              </nav>
            </div>


          </div>
        </div>

      </header>

		@yield('content')

    <footer class="site-footer">
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
              <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> Conception de ADJAGBA Lizzy et de LOUGBEGNON Amedee </a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
            </div>
          </div>

        </div>
    </footer>

    </div>
    <script src="{{ asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ asset('js/popper.min.js')}}"></script>
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('js/jquery.sticky.js')}}"></script>
    <script src="{{ asset('js/jquery.waypoints.min.js')}}"></script>
    <script src="{{ asset('js/jquery.animateNumber.min.js')}}"></script>
    <script src="{{ asset('js/jquery.fancybox.min.js')}}"></script>
    <script src="{{ asset('js/jquery.easing.1.3.js')}}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{ asset('js/aos.js')}}"></script>

    <script src="{{ asset('js/main.js')}}"></script>

  </body>

</html>
