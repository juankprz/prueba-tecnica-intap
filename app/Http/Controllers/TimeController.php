<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Activity;
use App\Time;

class TimeController extends Controller
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
        $activities=Activity::where('user_id', Auth()->user()->id)->get();
        return view('tiempo', compact('activities'));
    }


    public function store(Request $request)
    {
        if($request->ajax()){
            $dataForm = $request->all();

            $rules =[
                'date' => 'required', 'date',
                'time' => 'required', 'number' ,
                'activity_id' => 'required', 'number' ,
            ];

          $valida = validator($dataForm, $rules);
           if($valida->fails()){
            return response()->json([
                'success' => 'false',
                'errors'  => $valida->errors()->all(),
            ], 400);
           }

        if(Time::where('activity_id',$request->activity_id)->sum('time')>=8 || Time::where('activity_id',$request->activity_id)->sum('time') + $request->time >8 ){


        return response()->json([
            'success' => 'false',
            'errors'  => "Se excede 8 horas en la actividad",
        ], 400);

    }
    else{
        $time= new Time();
        $time->activity_id=$request->activity_id;
        $time->date=$request->date;
        $time->time=$request->time;
        $time->save();
        return response()->json([
            'success' => 'true',

        ], 200);

    }
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
