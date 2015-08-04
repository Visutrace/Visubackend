 <!-- body has the class "cbp-spmenu-push" -->
<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left cbp-spmenu-open" id="cbp-spmenu-s1">
  <h3 id="hideLeft">
    <i class="fa fa-chevron-left"></i>
    Visutrace   
  </h3>
  <a href="{!! route('home') !!}">Home</a>
  <a href="{!! route('traces.create') !!}">Upload a data set</a>
</nav>

  <div style="position:fixed; left:10px">
     <h3 class="white-chevron"><i class="fa fa-chevron-right" id="showLeft"></i></h3>
  </div>


{!! HTML::style('css/push_left_menu.css') !!}
{!! HTML::script('js/classie.js') !!}
{!! HTML::script('js/menus.js') !!}
