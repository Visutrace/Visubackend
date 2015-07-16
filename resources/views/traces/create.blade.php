@extends('templates.auth_user')
@section('page_content')

<div class="col-xs-offset-4 col-xs-8">
    
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {!! Form::open(
        array(
            'route' => 'traces.store', 
            'class' => 'form', 
            'novalidate' => 'novalidate', 
            'files' => true)) !!}

    <div class="form-group">
        {!! Form::label('Upload your traces here! (Must be a CSV) ') !!}
        {!! Form::file('traces', null) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Upload your Traces!') !!}
    </div>
    {!! Form::close() !!}
    </div>


    </div>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

</div>


@stop