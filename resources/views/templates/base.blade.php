<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Visutrace: The Vehicle Ad-hoc Network Trace Visualizer!</title>
{!! HTML::style('css/template_style.css') !!}
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!--
corps, a free CSS web template by ZyPOP (zypopwebtemplates.com/)

Download: http://zypopwebtemplates.com/

License: Creative Commons Attribution
//-->
</head>
<body>
<div id="container">
    <header>
    <div class="width">
            <h1><a href="/">visu<span>trace</span></a></h1>
            <h2>The Vehicle Ad-hoc Network Trace Visualizer</h2>
    </div>
    </header>

    
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

@yield('content')



    <footer>
    <!--
        <div class="footer-content width">
            <ul>
                <li><h4>Proin accumsan</h4></li>
                <li><a href="#">Rutrum nulla a ultrices</a></li>
                <li><a href="#">Blandit elementum</a></li>
                <li><a href="#">Proin placerat accumsan</a></li>
                <li><a href="#">Morbi hendrerit libero </a></li>
                <li><a href="#">Curabitur sit amet tellus</a></li>
            </ul>
            
            <ul>
                <li><h4>Condimentum</h4></li>
                <li><a href="#">Curabitur sit amet tellus</a></li>
                <li><a href="#">Morbi hendrerit libero </a></li>
                <li><a href="#">Proin placerat accumsan</a></li>
                <li><a href="#">Rutrum nulla a ultrices</a></li>
                <li><a href="#">Cras dictum</a></li>
            </ul>
            
            <ul class="endfooter">
                <li><h4>Suspendisse</h4></li>
                <li><a href="#">Morbi hendrerit libero </a></li>
                <li><a href="#">Proin placerat accumsan</a></li>
                <li><a href="#">Rutrum nulla a ultrices</a></li>
                <li><a href="#">Curabitur sit amet tellus</a></li>
                <li><a href="#">Donec in ligula nisl.</a></li>
            </ul>
            
            <div class="clear"></div>
        </div>
        -->
        <div class="footer-bottom">
            <p>&copy; Visutrace 2015.</p>
            <p>Like the style of this site? We did too. Check out ZyPOP for other <a href="http://zypopwebtemplates.com/">free CSS Website Templates</a> by ZyPOP</p>
         </div>
    </footer>
</div>
</body>
</html>