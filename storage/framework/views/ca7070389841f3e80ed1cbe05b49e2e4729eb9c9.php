<?php $__env->startSection('content'); ?>

    <div class="ftco-blocks-cover-1">
      <div class="ftco-cover-1 overlay" style="background-image: url('images/hero_1.jpg')">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-5">
              <div class="feature-car-rent-box-1">
                <h3><?php echo e($last->titre); ?></h3>
                <ul class="list-unstyled">
                  <?php $__currentLoopData = $last->agrements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agrement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li>
                    <span><?php echo e(ucfirst($agrement->titre)); ?></span>
                    <span class="spec"><?php echo e($agrement->pivot->valeur); ?></span>
                  </li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <div class="d-flex align-items-center bg-light p-3">
                  <span>XOF <?php echo e($last->prix); ?>/jour</span>
                  <a class="ml-auto btn btn-primary" id="<?php echo e($last->id); ?>" href="<?php echo e(route('voiture.show', $last->id)); ?>">Louer</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    

    

    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <h3>Nos offres</h3>
            <p class="mb-4">Découvrez nos offres. N'hésitez pas à regarder. Le coup d'oeil est gratuit ,)</p>
            <p>
              <a href="#" class="btn btn-primary custom-prev">Précédent</a>
              <span class="mx-2">/</span>
              <a href="#" class="btn btn-primary custom-next">Suivant</a>
            </p>
          </div>
          <div class="col-lg-9">
            <div class="nonloop-block-13 owl-carousel">
              <?php $__currentLoopData = $voitures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $voiture): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              
              <div class="item-1">
                <a href="#"><img src="images/img_1.jpg" alt="Image" class="img-fluid"></a>
                <div class="item-1-contents">
                  <div class="text-center">
                  <h3><a href="#"><?php echo e($voiture->titre); ?></a></h3>
                  <div class="rating">
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                  </div>
                  <div class="rent-price"><span>XOF <?php echo e($voiture->prix); ?>/</span>jour</div>
                  </div>
                  <ul class="specs">
                    <?php $__currentLoopData = $voiture->agrements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agrement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li>
                    <span><?php echo e(ucfirst($agrement->titre)); ?></span>
                    <span class="spec"><?php echo e($agrement->pivot->valeur); ?></span>
                  </li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
                  <div class="d-flex action">
                    <a class="ml-auto btn btn-primary" id="<?php echo e($voiture->id); ?>" href="<?php echo e(route('voiture.show', $voiture->id)); ?>">Louer</a>
                  </div>
                </div>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            
          </div>
        </div>
      </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Laravel/carrental/resources/views/site/index.blade.php ENDPATH**/ ?>