<div id="quitModal" class="modal modal-unicef fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Salir y ver mis resultados</h4>
      </div>
      <div class="modal-body">
        <p>¿Deseas salir del juego y ver tus resultados finales?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-unicef-blue pull-left" data-dismiss="modal"><span>Seguir jugando</span></button>
        <a href="{{url('/summary?key='. csrf_token() .'&cat='.$cat)}}" class="btn btn-unicef-blue pull-right"><span>Salir y ver resultados</span></a>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
