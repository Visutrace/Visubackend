@extends('templates.auth_user')
@section('page_content')


{!! HTML::style('css/theatre.css') !!}


<div class="visualization-contiainer">
    
        <div id="dat-gui-container" class="col-xs-offset-8 col-xs-4">
        </div>

        <div class = "col-xs-12">
              <canvas id="display-canvas" class="canvas"></canvas>
        </div>  

</div>

<script type="text/javascript">

    <?php 

        $trace_data = json_encode($trace_lines);
        echo 'var tracedata = '.$trace_data.";\n";
     ?>

</script>

{!! HTML::script('js/jquery-1.11.0.js') !!}
{!! HTML::script('js/jquery.scrollTo.min.js') !!}
{!! HTML::script('js/bootstrap.min.js') !!}
{!! HTML::script('js/dat.gui.min.js') !!}
{!! HTML::script('js/BuildDatGui.js') !!}
{!! HTML::script('js/pixi.js') !!}
{!! HTML::script('js/VisuTrace.js') !!}
{!! HTML::script('js/DisplayEngine.js') !!}


@stop