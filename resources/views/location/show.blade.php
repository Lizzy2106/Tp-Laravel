<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Location n°'.$location->id) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
        	<div class="relative bg-white overflow-hidden">
			  <div class="max-w-7xl mx-auto">
			    <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
			      <svg class="hidden lg:block absolute right-0 inset-y-0 h-full w-48 text-white transform translate-x-1/2" fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
			        <polygon points="50,0 100,0 50,100 0,100" />
			      </svg>
			     
			      <div class="hidden md:block md:ml-10 md:pr-4 md:space-x-8 mt-5">
			        <a class="font-medium text-gray-500 hover:text-gray-900">Du {{$location->from}}</a>

			        <a class="font-medium text-gray-500 hover:text-gray-900">Au {{$location->to}}</a>
			        <!-- <a class="font-medium text-gray-500 hover:text-gray-900">Date de fin: {{$location->to}}</a> -->

			      </div>
			      <!--
			        Mobile menu, show/hide based on menu open state.

			        Entering: "duration-150 ease-out"
			          From: "opacity-0 scale-95"
			          To: "opacity-100 scale-100"
			        Leaving: "duration-100 ease-in"
			          From: "opacity-100 scale-100"
			          To: "opacity-0 scale-95"
			      -->


			      <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
			        <div class="sm:text-center lg:text-left">
			          <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
			            <span class="block xl:inline">{{$location->voiture->titre}}</span>
			            <span class="block text-indigo-600 xl:inline">{{$location->user->name}}</span>
			          </h1>
			          <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
			            Cette location a été effectuée le {{$location->created_at}}
			          </p>
			          <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
			            <div class="rounded-md shadow">
			              <a href="{{ route('location.edit', $location->id) }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10">
			                Modifier
			              </a>
			            </div>
			            <div class="mt-3 sm:mt-0 sm:ml-3">
			              <a id="{{$location->id}}"style="cursor: pointer;"  class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 md:py-4 md:text-lg md:px-10 table-delete">
			                Supprimer
			              </a>
			            </div>
			          </div>
			        </div>
			      </main>
			    </div>
			  </div>
			  <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
			    <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="{{ $location->voiture->image1 != null ? asset('storage/images/car/'.$location->voiture->image1) : asset('storage/images/car/default.png') }}" alt="">
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
          // alert(id);
          // Delete record
          e.preventDefault();
          $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
          $.ajax({
            url: ""+id,
            type: 'delete', // replaced from put
            dataType: "JSON",
            data: {
              "id": id // method and token not needed in data
            },
            success: function () {
              window.location.href = "{{ route('location.index') }}";
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
</x-app-layout>
