<!doctype html>
<html lang="fr-FR">

  <head>
    <title>Gestion de location de voiture</title>
    <meta charset="utf-8">
    <link rel="icon" href="<?php echo e(asset('storage/images/site/fav.ico')); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=DM+Sans:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo e(asset('fonts/icomoon/style.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap-datepicker.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/jquery.fancybox.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/owl.theme.default.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('fonts/flaticon/font/flaticon.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/aos.css')); ?>">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">

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
                <a href="index.html"><img style="width: 50px;" src="<?php echo e(asset('storage/images/site/fav.ico')); ?>"></a>
              </div>
            </div>

            <div class="col-9  text-right">


              <span class="d-inline-block d-lg-none"><a href="#" class="text-white site-menu-toggle js-menu-toggle py-5 text-white"><span class="icon-menu h3 text-white"></span></a></span>



              <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto ">
                  <li><a href="<?php echo e(route('home')); ?>" class="nav-link">Accueil</a></li>
                  <li><a href="<?php echo e(route('voiture.index')); ?>" class="nav-link">Liste des voitures</a></li>
                  <!-- <li><a href="about.html" class="nav-link">About+Services+Blog</a></li> -->
                  <!-- <li><a href="<?php echo e(route('public.create')); ?>" class="nav-link">Contact</a></li> -->
                  <?php if(Route::has('login')): ?>
                  <li class="dropdup show">
                  	<a class="nav-link dropdown-toggle"  href="#" role="button" id="user" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  		<?php if(auth()->guard()->check()): ?>
                  		<?php echo e(Auth::user()->name); ?>

	                  	<div class="dropdown-menu" aria-labelledby="user">
							<a class="dropdown-item" href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Tableau de bord')); ?></a>
							<a class="dropdown-item" href="<?php echo e(route('profile.show')); ?>" :active="request()->routeIs('profile.show')"><?php echo e(__('Profil')); ?></a>
							<div class="dropdown-divider"></div>
							<?php if(Auth::user()->isAdmin): ?>
							<a class="dropdown-item" href="<?php echo e(route('voiture.index')); ?>" :active="request()->routeIs('voiture.index')"><?php echo e(__('Voitures')); ?></a>
							<a class="dropdown-item" href="<?php echo e(route('agrement.index')); ?>" :active="request()->routeIs('agrement.index')"><?php echo e(__('Agréments')); ?></a>
							<?php endif; ?>
							<a class="dropdown-item" href="<?php echo e(route('location.index')); ?>" :active="request()->routeIs('location.index')"><?php echo e(__('Locations')); ?></a>
							<div class="dropdown-divider"></div>
							<!-- Authentication -->
			                <form method="POST" action="<?php echo e(route('logout')); ?>" class="dropdown-item">
			                    <?php echo csrf_field(); ?>

			                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'jetstream::components.responsive-nav-link','data' => ['href' => ''.e(route('logout')).'','onclick' => 'event.preventDefault();
			                                    this.closest(\'form\').submit();']]); ?>
<?php $component->withName('jet-responsive-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('logout')).'','onclick' => 'event.preventDefault();
			                                    this.closest(\'form\').submit();']); ?>
			                        <?php echo e(__('Se déconnecter')); ?>

			                     <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
			                </form>
						</div>
	                    <?php else: ?>
                  		Compte
	                  	<div class="dropdown-menu" aria-labelledby="user">
							<a class="dropdown-item" href="<?php echo e(route('login')); ?>">Se connecter</a>
							<?php if(Route::has('register')): ?>
							<a class="dropdown-item" href="<?php echo e(route('register')); ?>" >S'inscrire</a>
                        	<?php endif; ?>
						</div>
	                    <?php endif; ?>
                  	</a>
                  </li>
                  <?php endif; ?>
                </ul>
              </nav>
            </div>


          </div>
        </div>

      </header>

		<?php echo $__env->yieldContent('content'); ?>

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
    <script src="<?php echo e(asset('js/jquery-3.3.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/owl.carousel.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.sticky.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.waypoints.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.animateNumber.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.fancybox.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.easing.1.3.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap-datepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/aos.js')); ?>"></script>

    <script src="<?php echo e(asset('js/main.js')); ?>"></script>

  </body>

</html>
<?php /**PATH /var/www/html/Laravel/carrental/resources/views/layouts/template.blade.php ENDPATH**/ ?>