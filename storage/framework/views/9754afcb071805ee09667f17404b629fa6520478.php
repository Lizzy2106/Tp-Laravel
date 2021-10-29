<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
		 <?php $__env->slot('header'); ?> 
				<h2 class="font-semibold text-xl text-gray-800 leading-tight">
						<?php echo e(__('Location n°'.$location->id)); ?>

				</h2>
		 <?php $__env->endSlot(); ?>

		<div class="py-12">
			<form method="post" action="<?php echo e(route('location.update' , $location->id)); ?>"><?php echo csrf_field(); ?>
				<?php echo method_field('PUT'); ?>
				<!-- Car inf -->
				<div class="md:grid md:grid-cols-3 md:gap-6" id='section1'>
					<div class="md:col-span-1">
						<div class="px-4 sm:px-0">
							<h3 class="text-lg font-medium leading-6 text-gray-900">Général</h3>
							<p class="mt-1 text-sm text-gray-600">
								Ces informations seront enregistrées sur le compte client.
							</p>
						</div>
					</div>
					<div class="mt-5 md:mt-0 md:col-span-2">
						<div class="shadow sm:rounded-md sm:overflow-hidden">

							<div class="px-4 py-5 bg-white space-y-6 sm:p-6">

								<div class="px-4 py-5 bg-white sm:p-6">
									<div class="grid grid-cols-4 gap-4">
										<div class="col-span-6 sm:col-span-6 lg:col-span-2">
											<label for="voiture" class="block text-sm font-medium text-gray-900">Voiture</label>
											<select id="voiture_id" name="voiture_id" autocomplete="country" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
												<?php $__currentLoopData = $voitures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $voiture): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<?php if($location->voiture_id == $voiture->id): ?>
													<option value="<?php echo e($voiture->id); ?>" selected><?php echo e($voiture->titre); ?></option>
													<?php else: ?>
													<option value="<?php echo e($voiture->id); ?>"><?php echo e($voiture->titre); ?></option>
													<?php endif; ?>

												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</select>
									 	</div>

										<div class="col-span-6 sm:col-span-6 lg:col-span-2">
											<label for="user" class="block text-sm font-medium text-gray-900">Locataire</label>
											<select id="user_id" name="user_id" autocomplete="country" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                								<?php if(Auth::user()->isAdmin): ?>
													<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													<?php else: ?>
													<option value="<?php echo e(Auth::user()->id); ?>"><?php echo e(Auth::user()->name); ?></option>
												<?php endif; ?>
											</select>
									 	</div>
									 	</div>
									 	<div class="grid grid-cols-4 gap-4 mt-4">
										  <div class="col-span-6 sm:col-span-6 lg:col-span-2">
											<label for="from" class="block text-sm font-medium text-gray-900">Date de début</label>
											<input type="datetime-local" name="from" id="from" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md <?php if($errors->has('from')): ?> is-invalid <?php endif; ?>" placeholder="2017-06-01T08:30" value="<?php echo e(old('from', $location->from)); ?>">
											<?php if($errors->has('from')): ?>
												<div class="invalid-feedback">
													<?php echo e($errors->first('from')); ?>

												</div>
											<?php endif; ?>
										  </div>

										  <div class="col-span-6 sm:col-span-6 lg:col-span-2">
											<label for="to" class="block text-sm font-medium text-gray-900">Date de fin</label>
											<input type="datetime-local" name="to" id="to" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md <?php if($errors->has('to')): ?> is-invalid <?php endif; ?>" placeholder="2017-06-02T08:30" value="<?php echo e(old('to', $location->to)); ?>">
											<?php if($errors->has('to')): ?>
												<div class="invalid-feedback">
													<?php echo e($errors->first('to')); ?>

												</div>
											<?php endif; ?>
										  </div>
										</div>
<!--
									  <div class="col-span-6 sm:col-span-3 lg:col-span-2">
											<label for="prix" class="block text-sm font-medium text-gray-900">Prix par jour</label>
											<input type="number" name="prix" id="prix" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md <?php if($errors->has('prix')): ?> is-invalid <?php endif; ?>" value="" value="<?php echo e(old('prix')); ?> ?? 30000" min="10000" step="500">
											<?php if($errors->has('prix')): ?>
												<div class="invalid-feedback">
													<?php echo e($errors->first('prix')); ?>

												</div>
											<?php endif; ?>
										</div>
 -->

									</div>

								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="hidden sm:block" aria-hidden="true">
					<div class="py-5">
						<div class="border-t border-gray-200"></div>
					</div>
				</div>

				<div class="mt-10 sm:mt-0">
					<div class="md:grid md:grid-cols-3 md:gap-6">
						<div class="md:col-span-1">
							<div class="px-4 sm:px-0">
								<h3 class="text-lg font-medium leading-6 text-gray-900">Validation</h3>
								<p class="mt-1 text-sm text-gray-600">
									Cette action affichera la réservation directement aux clients. Mais vous pourrez toujours modifier les informations entrées plus tard.
								</p>
							</div>
						</div>
						<div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
							<button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Enregistrer</button>
						</div>
					</div>
				</div>

			</form>
		</div>
 <?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php /**PATH /var/www/html/Laravel/carrental/resources/views/location/edit.blade.php ENDPATH**/ ?>