<div id="quitModal" class="modal modal-chq fade" tabindex="-1" role="dialog">
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
        <button type="button" class="btn btn-especial boton-abajo-left" data-dismiss="modal"><i class="fa fa-caret-left" aria-hidden="true"></i>  Seguir jugando</button>
        <a href="{{url('/summary?key='. csrf_token() .'&cat='.$cat)}}" class="btn btn-especial-grande boton-abajo-right">Salir y ver resultados  <i class="fa fa-caret-right" aria-hidden="true"></i></a>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->