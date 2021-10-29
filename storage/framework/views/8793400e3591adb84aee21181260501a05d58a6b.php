<?php $__env->startSection('content'); ?>
    <div class="ftco-blocks-cover-1">
      <div class="ftco-cover-1 innerpage overlay" style="background-image: url('<?php echo e(asset('storage/images/car/'.$voiture->image1)); ?>')">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 text-center">
              <span class="d-block mb-3 text-white" data-aos="fade-up"><?php echo e($voiture->created_at); ?> <span class="mx-2 text-primary">&bullet;</span> by <?php echo e($voiture->marque); ?></span>
                <h1 class="mb-4" data-aos="fade-up" data-aos-delay="100"><?php echo e($voiture->titre); ?></h1>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7 blog-content">
            <p class="lead"><?php echo e($voiture->description); ?><p>


          </div>

            <!-- <div class="sidebar-box">
              <form action="#" class="search-form">
                <div class="form-group">
                  <span class="icon fa fa-search"></span>
                  <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
                </div>
              </form>
            </div> -->

          <div class="col-md-5 sidebar">
            <div class="sidebar-box">
              <div class="row align-items-center">
                <div class="col-lg-12">
                  <div class="feature-car-rent-box-1">
                    <form method="post" action="<?php echo e(route('location.store')); ?>"><?php echo csrf_field(); ?>
                      <h1>Réserver</h1>
                      <input type="number" name="voiture_id" id="voiture_id" value="<?php echo e($voiture->id); ?>" style="display: none;">
                      <?php if(auth()->guard()->check()): ?>
                      <input type="number" name="user_id" id="user_id" value="<?php echo e(Auth::user()->id); ?>" style="display: none;">
                      <?php else: ?>
                      <input type="number" name="user_id" id="user_id" value="" style="display: none;">
                      <?php endif; ?>
                      <ul class="list-unstyled">
                        <li>
                          <label for="from">Date de début</label>
                          <input  type="datetime-local" name="from" id="from" autocomplete="given-name"  value="<?php echo e(old('from')); ?>" class="form-control px-6 <?php if($errors->has('from')): ?> is-invalid <?php endif; ?>" placeholder="2017-06-01T08:30">
                        </li>

                        <li>
                          <label for="to">Date de fin</label>
                            <input  type="datetime-local" name="to" id="to" autocomplete="given-name"  value="<?php echo e(old('to')); ?>" class="form-control px-6 <?php if($errors->has('to')): ?> is-invalid <?php endif; ?>" placeholder="2017-06-01T08:30">
                          </div>
                        </li>
                      </ul>
                      <div class="d-flex align-items-center bg-light p-3">
                        <span>XOF <?php echo e($voiture->prix); ?>/jour</span>
                        <button type="submit" class="ml-auto btn btn-primary">Enregistrer</button>

                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <div class="sidebar-box">
              <div class="categories">
                <h3>Catégories</h3>
                <?php $__currentLoopData = $voiture->agrements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agrement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><a href="#"><?php echo e(ucfirst($agrement->titre)); ?> <span><?php echo e($agrement->pivot->valeur); ?></span></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Laravel/carrental/resources/views/site/show.blade.php ENDPATH**/ ?>