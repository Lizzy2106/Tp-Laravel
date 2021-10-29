<x-app-layout>
		<x-slot name="header">
				<h2 class="font-semibold text-xl text-gray-800 leading-tight">
						{{ __('Ajouter une location') }}
				</h2>
		</x-slot>

		<div class="py-12">
			<form method="post" action="{{ route('location.store') }}">@csrf

				<!-- Car inf -->
				<div class="md:grid md:grid-cols-3 md:gap-6" id='section1'>
					<div class="md:col-span-1 text-center">
						<div class="px-4 sm:px-0">
							<h3 class="text-lg font-medium leading-6 text-gray-900">Général</h3>
							<p class="mt-1 text-sm text-gray-600">
								Ces informations seront enrégistrés sur le compte client.
							</p>
						</div>
					</div>
					<div class="mt-5 md:mt-0 md:col-span-2 text-center">
						<div class="shadow sm:rounded-md sm:overflow-hidden">

							<div class="px-4 py-5 bg-white space-y-6 sm:p-6">

								<div class="px-4 py-5 bg-white sm:p-6">
									<div class="grid grid-cols-4 gap-4">
										<div class="col-span-6 sm:col-span-6 lg:col-span-2">
											<label for="voiture" class="block text-sm font-medium text-gray-900">Voiture</label>
											<select id="voiture_id" name="voiture_id" autocomplete="country" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
												@foreach($voitures as $voiture)
												<option value="{{ $voiture->id }}">{{ $voiture->titre }}</option>
												@endforeach
											</select>
									 	</div>

										<div class="col-span-6 sm:col-span-6 lg:col-span-2">
											<label for="user" class="block text-sm font-medium text-gray-900">Locataire</label>
											<select id="user_id" name="user_id" autocomplete="country" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                								@if(Auth::user()->isAdmin)
													@foreach($users as $user)
													<option value="{{ $user->id }}">{{ $user->name }}</option>
													@endforeach
													@else
													<option value="{{ Auth::user()->id }}">{{ Auth::user()->name }}</option>
												@endif
											</select>
									 	</div>
									</div>

									 	<div class="grid grid-cols-4 gap-4 mt-4">
										  <div class="col-span-6 sm:col-span-6 lg:col-span-2">
											<label for="from" class="block text-sm font-medium text-gray-900">Date de début</label>
											<input type="datetime-local" name="from" id="from" autocomplete="given-name"  value="{{old('from')}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @if($errors->has('from')) is-invalid @endif" placeholder="2017-06-01T08:30">
											@if($errors->has('from'))
												<div class="invalid-feedback">
													{{$errors->first('from')}}
												</div>
											@endif
										  </div>

										  <div class="col-span-6 sm:col-span-6 lg:col-span-2">
											<label for="to" class="block text-sm font-medium text-gray-900">Date de fin</label>
											<input type="datetime-local" name="to" id="to" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @if($errors->has('to')) is-invalid @endif" value="{{old('to')}}" placeholder="2017-06-02T08:30">
											@if($errors->has('to'))
												<div class="invalid-feedback">
													{{$errors->first('to')}}
												</div>
											@endif
										  </div>
										</div>
<!--
									  <div class="col-span-6 sm:col-span-3 lg:col-span-2">
											<label for="prix" class="block text-sm font-medium text-gray-900">Prix par jour</label>
											<input type="number" name="prix" id="prix" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @if($errors->has('prix')) is-invalid @endif" value="" value="{{old('prix')}} ?? 30000" min="10000" step="500">
											@if($errors->has('prix'))
												<div class="invalid-feedback">
													{{$errors->first('prix')}}
												</div>
											@endif
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

				<div class="mt-10 sm:mt-0 text-center">
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
</x-app-layout>
