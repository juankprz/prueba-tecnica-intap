<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        return view('actividad');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->ajax()){
            $dataForm = $request->all();

            $rules =[
                'description' => 'required', 'text',

            ];

          $valida = validator($dataForm, $rules);
           if($valida->fails()){
            return response()->json([
                'success' => 'false',
                'errors'  => $valida->errors()->all(),
            ], 400);
           }


        $activity= new Activity();
        $activity->description= $request->description;
        $activity->user_id=Auth()->user()->id;
        $activity->save();
        return response()->json([
            'success' => 'true',

        ], 200);


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
        $activity=Activity::find($id);
        return view('actividadshow',compact('activity'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
