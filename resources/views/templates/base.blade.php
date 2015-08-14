<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Visutrace: The Vehicle Ad-hoc Network Trace Visualizer!</title>
{!! HTML::style('css/template_style.css') !!}
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css">


</head>
<body>
<div id="container">
    <header>
    <div class="width">
            <h1><a href="/">visu<span>trace</span></a></h1>
            <h2>
                The Vehicle Ad-hoc Network <br>
                Trace Visualizer
            </h2>
    </div>
    </header>
    
@include('snippets.nav_bar')

    
@if(Session::has('error'))

<div class="col-xs-12 col-md-6 col-md-offset-3 alert-danger">
    <h2>
      {!!  Session::get('error') !!}
    </h2>
</div>



@endif

@if(Session::has('message'))

<div class="col-xs-12 col-md-6 col-md-offset-3 alert-info">
    <h2>
      {!!  Session::get('message') !!}
    </h2>
</div>


@endif

@if(Session::has('warning'))

<div class="col-xs-12 col-md-6 col-md-offset-3 alert-warning">
    <h2>
      {!!  Session::get('warning') !!}
    </h2>
</div>

@endif


@if(Session::has('success'))

<div class="col-xs-12 col-md-6 col-md-offset-3 alert-success">
    <h2>
      {!!  Session::get('success') !!}
    </h2>
</div>

@endif
<div class="container">
    
    @yield('content')

</div>

</div>
</body>
</html>