<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Validator;

use Auth;

use App\Models\Location;

use App\Models\Voiture;
use App\Models\Agrement;
use App\Models\User;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        if ($user->isAdmin) {
            $locations = Location::with(['voiture', 'user'])->get();

            return view("location.index",compact('locations'));
        } else {
            $locations = Location::with(['voiture', 'user'])
            ->whereHas('user', function($query) use ($user)
                {
                    $query->where('user_id', '=', $user->id); 
                })
            ->get();

            return view("location.index",compact('locations'));
        }
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();
    
        if ($user->isAdmin) {
            $location = new Location();

            $voitures = Voiture::all();

            $users    = User::all();
        
            return view("location.create", compact('location', 'voitures', 'users'));
        } else {
            $location = new Location();

            $voitures = Voiture::all();

            $users    = $user->get();

            return view("location.create", compact('location', 'voitures', 'users'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        if (auth()->check()) {
            $location = new Location();
            // $inputs = $request->all();
            // $test = $request->input('voiture_id');
            // error_log($test);
            $location->voiture_id = $request->input('voiture_id');
            $location->user_id = $request->input('user_id');
            $location->from = $request->input('from');
            $location->to = $request->input('to');
            $location->save();

            return Redirect::route('location.index');
        } else {
            return view('auth.login');
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
        $location = Location::find($id);
        if($location){
            return view("location.show",compact('location'));
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
        $location = Location::find($id);
        if($location){
            $voitures = Voiture::all();
            $users    = User::all();
        
            return view("location.edit", compact('location', 'voitures', 'users'));
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
        $location = Location::find($id);
        if($location){
            $location->voiture_id = $request->input('voiture_id');
            $location->user_id = $request->input('user_id');
            $location->from = $request->input('from');
            $location->to = $request->input('to');
            $location->save();

            return redirect()->route('location.index');
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
        $location = Location::find($id);
        if($location){
            $destroy = Location::destroy($id);
            return response()->json([
                'success' => 'Record has been deleted successfully!'
            ]);
        }
    }
}
