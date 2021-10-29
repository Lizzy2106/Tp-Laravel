<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

use Illuminate\Support\Facades\Redirect;

use App\Models\Agrement;

class AgrementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agrements = Agrement::all();

        return view("agrement.index", compact('agrements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agrement = new Agrement();
        
        return view("agrement.create", compact('agrement'));
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

        $agrement = new Agrement();
        
        $validator = Validator::make($inputs, ['titre' => 'required|min:3']);
        
        if ($validator->fails()) {
            return Redirect::route('agrement.create', ['agrement' => $agrement])
                ->withErrors($validator)
                ->withInput();
        } else {
            $agrement->titre = $request->input('titre');
            $agrement->option1 = $request->input('option1');
            $agrement->option2 = $request->input('option2');
            $agrement->option3 = $request->input('option3');
            $agrement->option4 = $request->input('option4');
            $agrement->option5 = $request->input('option5');
            $agrement->save();
            return Redirect::route('agrement.index');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agrement = Agrement::find($id);
        if($agrement){

            return view("agrement.edit", compact('agrement'));
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
        $agrement = Agrement::find($id);
        if($agrement){
            $inputs = $request->all();
            $validator = Validator::make($inputs, ['titre' => 'required|min:3']);
            
            if ($validator->fails()) {
                return Redirect::route('agrement.create', ['agrement' => $agrement])
                    ->withErrors($validator)
                    ->withInput();
            } else {
                $agrement->titre = $request->input('titre');
                $agrement->option1 = $request->input('option1');
                $agrement->option2 = $request->input('option2');
                $agrement->option3 = $request->input('option3');
                $agrement->option4 = $request->input('option4');
                $agrement->option5 = $request->input('option5');
                $agrement->save();
                return Redirect::route('agrement.index');
            }
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
        $agrement = Agrement::find($id);
        $agrement->voitures()->detach();
        if($agrement){
            $destroy = Agrement::destroy($id);
            return response()->json([
                'success' => 'Record has been deleted successfully!'
            ]);
        }
    }
}
