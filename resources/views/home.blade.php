@extends('templates.base')
@section('content')
@include('snippets.usermenu')


<div class="col-xs-12">
  @foreach($user->traces as $iterator=>$trace)

    @if($iterator % 3 === 0)
      <div class="col-xs-12"><br/></div>


        <div class="col-xs-offset-3 col-xs-3">

        <a href="{!! route('traces.show',$trace->uuid) !!}">
            <img src="http://dummyimage.com/200x200/000/fff.png&txt={!! $trace->uuid !!}">
        </a>

        </div>

    @else        
        <div class="col-xs-3">

        <a href="{!! route('traces.show',$trace->uuid) !!}">
            <img src="http://dummyimage.com/200x200/000/fff.png&txt={!! $trace->uuid !!}">
        </a>

        </div>
    @endif
  @endforeach
</div>
@stop