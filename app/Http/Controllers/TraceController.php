<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTraceRequest as StoreTraceRequest;

use Rhumsaa\Uuid\Uuid as Uuid;
use App\Repositories\UserTracesRepository;

class TraceController extends Controller
{

    private $traces;

    public function __construct(UserTracesRepository $traces)
    {
        $this->traces = $traces;
    }



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
      'uuid' => Uuid::uuid4(),
      'viewport_x' => null != \Input::get('viewport_x') ? \Input::get('viewport_x') : 3000   ,
      'viewport_y' => null != \Input::get('viewport_y') ? \Input::get('viewport_y') : 3000,
      'name' => \Input::get('name')
    ));

    $trace_instance->user_id = \Auth::user()->id;

    $trace_instance->save();

    $fileName = $trace_instance->uuid . '.' . 
        $request->file('traces')->getClientOriginalExtension();

    $request->file('traces')->move(
        storage_path() . '/traces/', $fileName
    );

    return $this->show($trace_instance->uuid)->withSuccess($trace_insance->name . ' saved successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($uuid)
    {
        $traces =  $this->traces->whereUuid($uuid);

        if(! isset($traces)) {
            if($uuid != 'city' && $uuid != 'urban' && $uuid != 'rural')
                \App::abort('404');
        }


        $file_contents  = file_get_contents(storage_path() . '/traces/'. $uuid . '.csv');

        $trace_lines = explode("\n",$file_contents);

        //just removing pesky empty strings
        $trace_lines = array_filter($trace_lines);

        return \View::make('traces.show')
            ->withTrace_lines($trace_lines)
            ->withTraces($traces);
    }


    public function showCity()
    {
        return $this->show('city');
    }

    public function showUrban()
    {
        return $this->show('urban');
    }

    public function showRural()
    {
        return $this->show('rural');
    }
}
