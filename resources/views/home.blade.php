@extends('templates.base')
@section('content')
@include('snippets.usermenu')


<div class="col-xs-12">

<div class="col-xs-9 col-xs-offset-3">
    <h2>
        Your Trace Files
    </h2>


    @if($user->traces->count() === 0)
        <p>
            You have not uploaded any trace files
        </p>

    @endif

</div>


  @foreach($user->traces as $iterator=>$trace)

    @if($iterator % 3 === 0)
      <div class="col-xs-12"><br/></div>


        <div class="col-xs-offset-3 col-xs-3">

        <a href="{!! route('traces.show',$trace->uuid) !!}">
            {!! $trace->name !!}        
        </a>

        </div>

    @else        
        <div class="col-xs-3">

        <a href="{!! route('traces.show',$trace->uuid) !!}">
            {!! $trace->name !!}        
        </a>

        </div>
    @endif
  @endforeach
</div>
@stop