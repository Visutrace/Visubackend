<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTraceRequest as StoreTraceRequest;

use Rhumsaa\Uuid\Uuid as Uuid;

class TraceController extends Controller
{



    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return \View::make('traces.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(StoreTraceRequest $request)
    {

    $trace_instance = new \App\UserTraces(array(
      'uuid' => Uuid::uuid4()
    ));

    $trace_instance->user_id = \Auth::user()->id;

    $trace_instance->save();

    $fileName = $trace_instance->uuid . '.' . 
        $request->file('traces')->getClientOriginalExtension();

    $request->file('traces')->move(
        storage_path() . '/traces/', $fileName
    );

    return \Redirect::route('home')->withSuccess("Success, data set uploaded!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($uuid)
    {
        $trace = \App\UserTraces::where('uuid',$uuid)->first();

        dd($trace);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        // TODO: Logic for deleting a trace set
    }
}
