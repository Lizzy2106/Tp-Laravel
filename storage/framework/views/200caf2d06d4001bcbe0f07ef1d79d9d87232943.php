<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <!-- Ajax -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
     <?php $__env->slot('header'); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Liste des locations')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="block mb-8">
              <a href="<?php echo e(route('location.create')); ?>" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Ajouter une location</a>
          </div>
          
          <!-- This example requires Tailwind CSS v2.0+ -->
          <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                  <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                      <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Nom
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Voiture
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Début
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Fin
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Statut
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                          <span class="sr-only">Actions</span>
                        </th>
                      </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                      <?php if(sizeof($locations) == 0): ?>
                      <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="flex items-center"></div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="flex items-center"></div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="flex items-center">
                            Aucune location effectuée
                          </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="flex items-center"></div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="flex items-center"></div>
                        </td>
                      </tr>
                      
                      <?php else: ?>
                        <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                              <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                  <?php echo e($location->user->name); ?>

                                </div>
                              </div>
                            </div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900"><?php echo e($location->voiture->titre); ?></div>
                            <div class="text-sm text-gray-500"><?php echo e($location->voiture->marque); ?></div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                           <?php echo e($location->from); ?>

                          </td>
                          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                           <?php echo e($location->to); ?>

                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                              Active
                            </span>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="<?php echo e(route('location.show', $location->id)); ?>" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">Voir</a>
                            <a href="<?php echo e(route('location.edit', $location->id)); ?>" class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2 table-update">Modifier</a>
                            <a style="cursor: pointer;" id="<?php echo e($location->id); ?>" class="text-red-600 hover:text-red-900 mb-2 mr-2 table-delete">Supprimer</a>
                          </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="fixed z-10 inset-0 overflow-y-auto" id="modal" style="display: none;">
      <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <!--
        Background overlay, show/hide based on modal state.

        Entering: "ease-out duration-300"
        From: "opacity-0"
        To: "opacity-100"
        Leaving: "ease-in duration-200"
        From: "opacity-100"
        To: "opacity-0"
      -->
      <div class="fixed inset-0 transition-opacity" aria-hidden="true">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
      </div>

      <!-- This element is to trick the browser into centering the modal contents. -->
      <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
      <!--
        Modal panel, show/hide based on modal state.

        Entering: "ease-out duration-300"
        From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        To: "opacity-100 translate-y-0 sm:scale-100"
        Leaving: "ease-in duration-200"
        From: "opacity-100 translate-y-0 sm:scale-100"
        To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
      -->
      <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <div class="sm:flex sm:items-start">
          <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
          <!-- Heroicon name: outline/exclamation -->
          <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
          </svg>
          </div>
          <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
          <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
            Supprimer cette voiture
          </h3>
          <div class="mt-2">
            <p class="text-sm text-gray-500">
            Voulez-vous vraiment supprimer cet élément? Toutes vos données seront supprimées définitivement. Cette action ne peut pas être annulée.
            </p>
          </div>
          </div>
        </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
        <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm modal-delete">
          Supprimer
        </button>
        <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm modal-close">
          Annuler
        </button>
        </div>
      </div>
      </div>
    </div>


    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> 
    <!-- Page -->
    <script type="text/javascript">
      var modal = $('#modal');
      $('.table-delete').on('click', function () {
        id = $(this).attr('id');
        modal.show();
        $('.modal-delete').on('click', function(e) {
          alert(id);
          // Delete record
          e.preventDefault();
          $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
          $.ajax({
            url: "location/"+id,
            type: 'delete', // replaced from put
            dataType: "JSON",
            data: {
              "id": id // method and token not needed in data
            },
            success: function () {
              window.location.href = "";
            },

            error: function(xhr) {
              console.log(xhr.responseText); // this line will save you tons of hours while debugging
              // do something here because of error
            }
          })
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
<?php /**PATH /var/www/html/Laravel/carrental/resources/views/location/index.blade.php ENDPATH**/ ?>