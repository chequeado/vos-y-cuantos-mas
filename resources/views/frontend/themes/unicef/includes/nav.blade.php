<nav class="navbar">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{url('/')}}">¿VOS Y CUANTOS MÁS? <small class="text-muted">Nueva generación</small></a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      @if(strpos(Request::url(), 'questions')===false)
      <ul class="nav navbar-nav">
        <li><a id="quit-btn" class="btn btn-link" data-toggle="modal" data-target="#quitModal" href="javascript:;">Salir y ver mis resultados <i class="fa fa-bar-chart" aria-hidden="true"></i></a></li>
      </ul>
      @endif
    </div><!--/.nav-collapse -->
  </div>
</nav>
