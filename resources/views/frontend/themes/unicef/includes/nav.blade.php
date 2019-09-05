<nav class="navbar">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="{{url('/')}}">¿VOS Y CUANTOS MÁS? <small class="text-muted">Nueva generación</small></a>
    </div>
    <div id="navbar">
      @if(strpos(Request::url(), 'questions')===false)
        <ul class="nav navbar-nav navbar-right">
          <li><a id="quit-btn" class="btn btn-link pull-right" data-toggle="modal" data-target="#quitModal" href="javascript:;">Salir y ver mis resultados  <i class="fa fa-bar-chart" aria-hidden="true"></i></a></li>
        </ul>
      @endif
    </div><!--/.nav-collapse -->
  </div>
</nav>
