<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Validator;

// use App\Http\Controllers\Input;
// import the storage facade
use Illuminate\Support\Facades\Storage;


use App\Models\Voiture;

use App\Models\Agrement;

use App\Models\User;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Facades\Log;

class VoitureController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{	
        if (auth()->check() && auth()->user()->isAdmin) {
			$voitures = Voiture::all();
			return view("voiture.index", compact('voitures'));
		}else {
			$voitures = Voiture::all();
        	$agrements = Agrement::all();
			return view("site.list", compact('voitures', 'agrements'));
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$voiture = new Voiture();

		$agrements = Agrement::all();
		
		return view("voiture.create", compact('voiture', 'agrements'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$inputs = $request->all();

		$voiture = new Voiture();
		$validator = Validator::make($inputs, Voiture::$rules);

		if ($validator->fails()) {
			return Redirect::route('voiture.create', ['voiture' => $voiture])
				->withErrors($validator)
				->withInput();
		} else {
			$voiture->titre = $request->input('titre');
			$voiture->marque = $request->input('marque');
			$voiture->prix = $request->input('prix');
			$voiture->description = $request->input('description');

			if ($request->hasFile('image1')) {
				$destination_path = 'public/images/car';
				$image1 = $request->file('image1');
				$image1_name = $image1->getClientOriginalName();
				$request->file('image1')->storeAs($destination_path, $image1_name);

				$voiture->image1 = $image1_name;
			}

			$voiture->save();

			// Save amenities

			$voiture->agrements()->sync($request->agrements);

			// error_log($request->input('portières'));
			// 		// $voiture->agrements()

			foreach ($voiture->agrements as $key) {
			// 	// error_log($key);
			//  //   $voiture->agrements()->updateExistingPivot($key, ['valeur' => 'kfkkkkk']);
				
			// 	$k = $voiture->agrements()->wherePivot('agrement_id', $key);
			// 	$k->agrements->valeur='ghjkl';
			// 	$k->agrements->update();
				$voiture->agrements()->detach(Agrement::find($key));
				$voiture->agrements()->attach(
					Agrement::find($key), 
					['valeur' => $request->input("".$key->id)]
				);
			}

			// foreach ($request->agrements as $agrement) {
			// 	$agr_voit = Pivot::with(['voiture', 'agrement'])
	  //           ->whereHas('agrement', function($query) use ($agrement)
	  //               {
	  //                   $query->where('agrement_id', '=', $agrement->id); 
	  //               })
	  //           ->whereHas('voiture', function($query) use ($voiture)
	  //               {
	  //                   $query->where('voiture_id', '=', $voiture->id); 
	  //               })
	  //           ->get();
	  //           $agr_voit->valeur = $request->input($agr_voit->agrement_id);
	  //           $agr_voit->save();
			// }
			// Add valeur
			return Redirect::route('voiture.index');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$voiture = Voiture::find($id);
        if($voiture){
            if (auth()->check() && auth()->user()->isAdmin) {
	        	return view("voiture.show",compact('voiture'));
		    }else {
				$voitures = Voiture::all();
				return view("site.show", compact('voiture'));
			}
        }

			
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$voiture = Voiture::find($id);
		$agrements = Agrement::all();
        if($voiture){
            return view("voiture.edit",compact('voiture', 'agrements'));
        }
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */

	public function update(Request $request, $id)
	{
		$voiture = Voiture::find($id);
		if($voiture){
			if ($request->hasFile('prix')) {
				$voiture->prix = $request->input('prix');
			}

			$voiture->titre = $request->input('titre');
			$voiture->marque = $request->input('marque');
			$voiture->description = $request->input('description');

			if ($request->hasFile('image1')) {
				$destination_path = 'public/images/car';
				$image1 = $request->file('image1');
				$image1_name = $image1->getClientOriginalName();
				$request->file('image1')->storeAs($destination_path, $image1_name);

				$voiture->image1 = $image1_name;
			}

			$voiture->save();

			// Save amenities

			$voiture->agrements()->sync($request->agrements);

			$voiture->save();
			foreach ($voiture->agrements as $key) {
				$voiture->agrements()->detach(Agrement::find($key));
				$voiture->agrements()->attach(
					Agrement::find($key), 
					['valeur' => $request->input("".$key->id)]
				);
			}
			return redirect()->route('voiture.index');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$voiture = Voiture::find($id);
		if($voiture){
				
			$voiture->agrements()->detach();
			$voiture->user()->detach();		

			$destroy = Voiture::destroy($id);
			return response()->json([
				'success' => 'Record has been deleted successfully!'
			]);
		}
	}
}
