@extends('templates.base')
@section('content')


 <!-- body has the class "cbp-spmenu-push" -->
<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
  <h3>Menu</h3>
  <a href="#">Celery seakale</a>
  <a href="#">Dulse daikon</a>
  <a href="#">Zucchini garlic</a>
  <a href="#">Catsear azuki bean</a>
  <a href="#">Dandesdsdsdsdlion bunya</a>
  <a href="#">Rutabaga</a>
</nav>

<div class="container">
  <div class="main">
    <section>
      <h2>Slide Menus</h2>
      <button id="showLeft">Show/Hide Left Slide Menu</button>
    </section>
  </div>
</div>

{!! HTML::style('css/push_left_menu.css') !!}
{!! HTML::script('js/classie.js') !!}
{!! HTML::script('js/menus.js') !!}


@stop