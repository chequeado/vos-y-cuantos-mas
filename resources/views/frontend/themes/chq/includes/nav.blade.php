<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{url('/')}}">¿Vos y cuántos más? <span class="text-muted">Argentina | beta</span></a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      @if(strpos(Request::url(), 'questions')===false)
      <ul class="nav navbar-nav">
        <li><a data-toggle="modal" data-target="#quitModal" type="button">MIS RESULTADOS <i class="fa fa-bar-chart" aria-hidden="true"></i></a></li>
      </ul>
      @endif
    </div><!--/.nav-collapse -->
  </div>
</nav>