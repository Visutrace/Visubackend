@extends('templates.base')
@section('content')

    <div class='col-xs-9 col-offset-xs-3'>

    </div>
        <div id="body" class="width">
            <section id="content">

                <h2>Introducing to Visutrace</h2>

                <p>
                    Welcome to Visutrace: The Vehicle Ad-hoc Network Trace Visualizer. 
                    This website allows you to visualize traces with special functionality aimed at Vehicle Ad-hoc Networks. 
                    Seem interested? Check out some of the visualizations that you can create with these examples from the GMSF dataset:

                    <ul>
                        <li>The Urban Dataset</li>
                        <li>The City Dataset</li>
                        <li>The Rural Dataset</li>
                    </ul>

                </p>

            </section>
            <section>
                <h4> Logging In  </h4>
                <p>
                    Right now we support logging in with Github, but we plan to expand authentication to include Google, Facebook, and Twitter. To log in, simply click the Github icon.
                </p>

                <div class="col-xs-3">
                    <a href="{!! route('login')!!}">  
                        <div class="col-xs-12">
                            {!! HTML::image('images/showimage.png') !!}
                        </div>
                        <div class="col-xs-offset-3 col-xs-9">
                            Login With Github
                        </div>
                    </a>
                </div>

                </a>

            </section>  
            
           <div class="clear"></div>
        </div>
    </div>
@stop