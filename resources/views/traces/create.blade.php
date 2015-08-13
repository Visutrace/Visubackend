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
        {!! Form::label('Trace Name ') !!}
        {!! Form::input('text', 'name', null, ['required' => 'required' , 'class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Upload your traces here! ') !!}
        {!! Form::file('traces', null, ['required' => 'required', 'class' => 'form-control']) !!}
    </div>

        <hr></hr>

    <h3> Optional Parameters </h3>


    <div class="form-group">
        {!! Form::label('Trace File Dimension X ') !!}
        {!! Form::text('viewport_x', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Trace File Dimension Y! ') !!}
        {!! Form::text('viewport_y', null, ['class' => 'form-control']) !!}
    </div>



    <div class="form-group">
        {!! Form::submit('Upload your Traces!') !!}
    </div>


    {!! Form::close() !!}
    </div>


    </div>

</div>


@stop