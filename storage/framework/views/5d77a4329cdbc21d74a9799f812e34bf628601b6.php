<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
		 <?php $__env->slot('header'); ?> 
				<h2 class="font-semibold text-xl text-gray-800 leading-tight">
						<?php echo e(__('Ajouter une voiture')); ?>

				</h2>
		 <?php $__env->endSlot(); ?>

		<div class="py-12">
			<form method="post" action="<?php echo e(route('voiture.store')); ?>" enctype="multipart/form-data"><?php echo csrf_field(); ?>

				<!-- Car inf -->
				<div class="md:grid md:grid-cols-3 md:gap-6" id='section1'>
					<div class="md:col-span-1">
						<div class="px-4 sm:px-0">
							<h3 class="text-lg font-medium leading-6 text-gray-900">Général</h3>
							<p class="mt-1 text-sm text-gray-600">
								Ces informations seront affichées publiquement, alors faites attention à ce que vous écrivez.
							</p>
						</div>
					</div>
					<div class="mt-5 md:mt-0 md:col-span-2">
						<div class="shadow sm:rounded-md sm:overflow-hidden">

							<div class="px-4 py-5 bg-white space-y-6 sm:p-6">

								<div class="px-4 py-5 bg-white sm:p-6">
									<div class="grid grid-cols-6 gap-6">
									  <div class="col-span-6 sm:col-span-6 lg:col-span-2">
										<label for="titre" class="block text-sm font-medium text-gray-900">Titre/Nom</label>
										<input type="text" name="titre" id="titre" autocomplete="given-name"  value="<?php echo e(old('titre')); ?>" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md <?php if($errors->has('titre')): ?> is-invalid <?php endif; ?>">
										<?php if($errors->has('titre')): ?>
											<div class="invalid-feedback">
												<?php echo e($errors->first('titre')); ?>

											</div>
										<?php endif; ?>
									  </div>

									  <div class="col-span-6 sm:col-span-3 lg:col-span-2">
										<label for="marque" class="block text-sm font-medium text-gray-900">Marque/Modèle</label>
										<input type="text" name="marque" id="marque" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md <?php if($errors->has('marque')): ?> is-invalid <?php endif; ?>" value="<?php echo e(old('marque')); ?>">
										<?php if($errors->has('marque')): ?>
											<div class="invalid-feedback">
												<?php echo e($errors->first('marque')); ?>

											</div>
										<?php endif; ?>
									  </div>

									  <div class="col-span-6 sm:col-span-3 lg:col-span-2">
											<label for="prix" class="block text-sm font-medium text-gray-900">Prix par jour</label>
											<input type="number" name="prix" id="prix" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md <?php if($errors->has('prix')): ?> is-invalid <?php endif; ?>" value="" value="<?php echo e(old('prix')); ?> ?? 30000" min="10000" step="500">
											<?php if($errors->has('prix')): ?>
												<div class="invalid-feedback">
													<?php echo e($errors->first('prix')); ?>

												</div>
											<?php endif; ?>
										</div>
									</div>

									<!-- Description -->
									<div>
										<label for="description" class="block text-sm font-medium text-gray-900">Description</label>
										<div class="mt-1">
											<textarea id="description" name="description" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Cette voiture est parfaite pour les familles nombreuses. <?php if($errors->has('description')): ?> is-invalid <?php endif; ?>" value="<?php echo e(old('description')); ?>"></textarea>
											<?php if($errors->has('description')): ?>
												<div class="invalid-feedback">
													<?php echo e($errors->first('description')); ?>

												</div>
											<?php endif; ?>
										</div>
										<p class="mt-2 text-sm text-gray-500">
											Brève description de la voiture
										</p>
									</div>

									<!-- Galerie -->
									<div class="grid grid-cols-3 gap-3">
										<label class="block text-sm font-medium text-gray-900">
											Galerie
										</label>
										<div class="mt-1 flex items-center">
											<span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100">
												<!-- <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
													<path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
												</svg> -->
												<img class="h-20 w-20" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=256&amp;h=256&amp;q=60 }}" alt="" title="galerie">
											</span>
											<!-- <button type="button" class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-900 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
												Modifier
											</button> -->
										</div>
									</div>

									<div>
										<label class="block text-sm font-medium text-gray-700">
											Image de couverture
										</label>
										<div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
											<div class="space-y-1 text-center">
												<svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
													<path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
												</svg>
												<div class="flex text-sm text-gray-600">
													<label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
														<span>Sélectionner une photo</span>
														<input id="file-upload" name="image1" type="file" class="sr-only" value="default.png">
													</label>
													<p class="pl-1">Glisser pour déposer</p>
												</div>
												<p class="text-xs text-gray-500">
													PNG, JPG, GIF moins de 10MB
												</p>
											</div>
										</div>
									</div>
								</div>
								<!-- <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
									<button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" onclick="save_car()">Enreigistrer</button>
								</div> -->
							</div>
						</div>
					</div>
				</div>

				<div class="hidden sm:block" aria-hidden="true">
					<div class="py-5">
						<div class="border-t border-gray-200"></div>
					</div>
				</div>

				<!-- Location and Amenities sctionn -->
				<div class="mt-10 sm:mt-0" id='section2'>
					<div class="md:grid md:grid-cols-3 md:gap-6">
						<div class="md:col-span-1">
							<div class="px-4 sm:px-0">
								<h3 class="text-lg font-medium leading-6 text-gray-900">Détails</h3>
								<p class="mt-1 text-sm text-gray-600">
									Ce que vos clients doivent savoir
								</p>
							</div>
						</div>
						<div class="mt-5 md:mt-0 md:col-span-2">
							<div class="shadow overflow-hidden sm:rounded-md">
								<div class="px-4 py-5 bg-white space-y-6 sm:p-6">
									<fieldset>
										<div class="mt-4 space-y-4">
										<?php if(sizeof($agrements) == 0): ?>
											<div class="block mb-8">
								                <a href="<?php echo e(route('agrement.create')); ?>" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Ajouter un agrément</a>
								            </div>
										<?php else: ?>
											<?php $__currentLoopData = $agrements->chunk(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agrmts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<div class="flex items-start">
												<div class="px-4 py-5 bg-white sm:p-6">
													<div class="grid grid-cols-6 gap-6">
														<?php $__currentLoopData = $agrmts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agrement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<div class="col-span-6 sm:col-span-6 lg:col-span-2">
															<label for="<?php echo e($agrement->titre); ?>" class="block text-sm font-medium text-gray-900">
																<input name="agrements[]" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" id="<?php echo e($agrement->id); ?>" value="<?php echo e($agrement->id); ?>">
															<?php echo e(ucfirst($agrement->titre)); ?>

															</label>

															<?php if($agrement->option1 == 'valeur'): ?>
															<input type="number" name="<?php echo e($agrement->id); ?>" id="<?php echo e($agrement->id); ?>" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="2">
															<?php else: ?>
															<select id="<?php echo e($agrement->id); ?>" name="<?php echo e($agrement->id); ?>" autocomplete="country" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
																<?php if($agrement->option1 == null): ?>
																	<option value=''>...</option>
																	<!-- <option>Canada</option>
																	<option>Mexico</option> -->
																<?php else: ?>
																	<?php for($i = 1; $i <= 5; $i++): ?>
																	<?php if($agrement->{'option'.$i} != null): ?>
																		<option value="<?php echo e(ucfirst($agrement->{'option'.$i})); ?>"><?php echo e(ucfirst($agrement->{'option'.$i})); ?></option>
																		<!-- <option>Canada</option>
																		<option>Mexico</option> -->
																	<?php endif; ?>
																	<?php endfor; ?>
																<?php endif; ?>
															</select>
															<?php endif; ?>
														</div>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													</div>
												</div>
											</div>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										<?php endif; ?>
											<!-- <div class="flex items-start">
												<div class="flex items-center h-5">
													<input id="offers" name="offers" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
												</div>
												<div class="ml-3 text-sm">
													<label for="offers" class="font-medium text-gray-900">Offers</label>
													<p class="text-gray-500">Get notified when a candidate accepts or rejects an offer.</p>
												</div>
											</div> -->
										</div>
									</fieldset>
								</div>
								<div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
									<button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-500 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500" onclick="add_agrement(modal)">Ajouter une précision</button>

									<!-- <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" onclick="save_car_agrement()">Enregistrer</button> -->
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
									Cette action affichera la voiture directement aux clients. Mais vous pourrez toujours modifier les informations entrées plus tard.
								</p>
							</div>
						</div>
						<div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
							<button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Enreigistrer</button>
						</div>
					</div>
				</div>

			</form>
		</div>

		<!-- Ajax -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
		<!-- jQuery -->
		<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
		<!-- Page -->
		<script type="text/javascript">
			// $('#section2').hide();
			// function save_car() {
			// 	// Switch to second form
			// 	$('#section1').hide();
			// 	$('#section2').show();
			// }

			var modal = $('#modal');
			$('.table-delete').on('click', function () {
				id = $(this).attr('id');
				modal.show();
				$('.modal-delete').on('click', function () {
					alert(id);
					modal.hide();
				});

				$('.modal-close').on('click', function () {
					modal.hide();
				});
			});
		</script>
 <?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php /**PATH /var/www/html/Laravel/carrental/resources/views/voiture/create.blade.php ENDPATH**/ ?>