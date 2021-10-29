<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des agréments') }}
        </h2>
    </x-slot>

    <div style="margin-top: 10px;">
                      <p>Les agréments définissent de manière explicite les caractéristiques d'un véhicule.</p>
                      <br />
                      <p>° Si l'<strong><em>option1</em></strong> a la valeur <em>valeur</em>, cela signifie que vous devez éditer le champ lorsque vous créez une nouvelle voiture. Vous n'avez pas à entrer des valeurs pour les autres options. L'agrément <strong>Nombre de portières</strong> par exemple a l'<em>option1</em> = <em>valeur</em>. En effet, en enregistrant une nouvelle voiture, on peut préciser qu'elle a <strong>4</strong> ou <strong>2</strong> portières.</p>
                      <br />
                      <p>°°Si l'<strong><em>option1</em></strong> est <em>nulle</em>, cela veut dire qu'une voiture peut posséder ou non cet agrément. Vous n'avez à entrer de valeurs pour ces options. L'agrément <strong>GPS</strong> par exemple a l'<em>option1</em> = <em>null</em>. En effet, une voiture peut posséder ou non un <em>GPS</em>.</p>
                    </div>
                    <br />

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="post" action="{{ route('agrement.store') }}">@csrf

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
									 	<div class="grid grid-cols-4 gap-4 mt-4">
										  <div class="col-span-6 sm:col-span-6 lg:col-span-2">
											<label for="titre" class="block text-sm font-medium text-gray-900">Titre/Nom</label>
											<input type="text" name="titre" id="titre" autocomplete="given-name"  value="{{old('titre')}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @if($errors->has('titre')) is-invalid @endif" placeholder="Titre de mon agrément">
											@if($errors->has('titre'))
												<div class="invalid-feedback">
													{{$errors->first('titre')}}
												</div>
											@endif
										  </div>

										  <div class="col-span-6 sm:col-span-6 lg:col-span-2">
											<label for="option1" class="block text-sm font-medium text-gray-900">Option1</label>
											<input type="text" name="option1" id="option1" autocomplete="given-name"  value="{{old('option1')}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @if($errors->has('option1')) is-invalid @endif" placeholder="Ceci est une option">
											@if($errors->has('option1'))
												<div class="invalid-feedback">
													{{$errors->first('option1')}}
												</div>
											@endif
										  </div>
										</div>

									 	<div class="grid grid-cols-4 gap-4 mt-4">
										  <div class="col-span-6 sm:col-span-6 lg:col-span-2">
											<label for="option2" class="block text-sm font-medium text-gray-900">Option2</label>
											<input type="text" name="option2" id="option2" autocomplete="given-name"  value="{{old('option2')}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @if($errors->has('option2')) is-invalid @endif" placeholder="Titre de mon agrément">
											@if($errors->has('option2'))
												<div class="invalid-feedback">
													{{$errors->first('option2')}}
												</div>
											@endif
										  </div>

										  <div class="col-span-6 sm:col-span-6 lg:col-span-2">
											<label for="option3" class="block text-sm font-medium text-gray-900">Option3</label>
											<input type="text" name="option3" id="option3" autocomplete="given-name"  value="{{old('option3')}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @if($errors->has('option3')) is-invalid @endif" placeholder="Ceci est une option">
											@if($errors->has('option3'))
												<div class="invalid-feedback">
													{{$errors->first('option3')}}
												</div>
											@endif
										  </div>
										</div>


									 	<div class="grid grid-cols-4 gap-4 mt-4">
										  <div class="col-span-6 sm:col-span-6 lg:col-span-2">
											<label for="option4" class="block text-sm font-medium text-gray-900">Option4</label>
											<input type="text" name="option4" id="option4" autocomplete="given-name"  value="{{old('option4')}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @if($errors->has('option4')) is-invalid @endif" placeholder="Titre de mon agrément">
											@if($errors->has('option4'))
												<div class="invalid-feedback">
													{{$errors->first('option4')}}
												</div>
											@endif
										  </div>

										  <div class="col-span-6 sm:col-span-6 lg:col-span-2">
											<label for="option5" class="block text-sm font-medium text-gray-900">Option5</label>
											<input type="text" name="option5" id="option5" autocomplete="given-name"  value="{{old('option5')}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @if($errors->has('option5')) is-invalid @endif" placeholder="Ceci est une option">
											@if($errors->has('option5'))
												<div class="invalid-feedback">
													{{$errors->first('option5')}}
												</div>
											@endif
										  </div>
										</div>


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
    </div>
</x-app-layout>
