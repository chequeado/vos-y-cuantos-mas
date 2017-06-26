<div ng-controller="FeedbackCtrl">
  <div id="sugerenciasModal" class="modal modal-chq fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Enviar sugerencias</h4>
        </div>
        <form class="form-horizontal" ng-submit="processSugerenciasForm()">
          <div class="modal-body">
            <p>Completá los campos y presioná enviar</p>
              <fieldset>

                <!-- Text input-->
                <div class="form-group">
                  <label class="col-md-4 control-label" for="textinput">Tu nombre</label>  
                  <div class="col-md-8">
                    <input id="textinput" ng-model="sugerencias.nombre" name="textinput" type="text" class="form-control input-md">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label" for="textinput">Tu correo electrónico</label>  
                  <div class="col-md-8">
                    <input id="textinput" ng-model="sugerencias.email" name="textinput" type="text" class="form-control input-md">
                  </div>
                </div>

                <!-- Textarea -->
                <div class="form-group">
                  <label class="col-md-4 control-label" for="textarea">Sugerencias</label>
                  <div class="col-md-8">                     
                    <textarea ng-model="sugerencias.sugerencia" class="form-control" id="textarea" name="textarea"></textarea>
                  </div>
                </div>

              </fieldset>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-especial boton-abajo-left" data-dismiss="modal"><i class="fa fa-caret-left" aria-hidden="true"></i>  Cancelar</button>
            <button type="submit" ng-show="sugerenciasValid() && !loading && !sent" class="btn btn-especial-grande boton-abajo-right">Enviar sugerencia  <i class="fa fa-caret-right" aria-hidden="true"></i></button>
            <label ng-show="loading" class="control-label pull-right">Enviando Mensaje...</label>
            <label ng-show="sent" class="control-label pull-right">Mensaje enviado. Muchas gracias!</label>
          </div>
        </form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

  <div id="preguntasModal" ng-controller="FeedbackCtrl" class="modal modal-chq fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Enviar nuevas preguntas</h4>
        </div>
        <form class="form-horizontal" ng-submit="processPreguntasForm()">
          <div class="modal-body">
            <p>Completá los campos y presioná enviar</p>
              <fieldset>

                <!-- Text input-->
                <div class="form-group">
                  <label class="col-md-4 control-label" for="textinput">Tu nombre</label>  
                  <div class="col-md-8">
                    <input id="textinput" ng-model="preguntas.nombre" name="textinput" type="text" class="form-control input-md">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label" for="textinput">Tu correo electrónico</label>  
                  <div class="col-md-8">
                    <input id="textinput" ng-model="preguntas.email" name="textinput" type="text" class="form-control input-md">
                  </div>
                </div>

                <!-- Textarea -->
                <div class="form-group">
                  <label class="col-md-4 control-label" for="textarea">¿Qué pregunta te gustaría sumar?</label>
                  <div class="col-md-8">                     
                    <textarea ng-model="preguntas.pregunta" class="form-control" id="textarea" name="textarea"></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label" for="textarea">¿De dónde podemos obtener esa información?</label>
                  <div class="col-md-8">                     
                    <textarea ng-model="preguntas.link" class="form-control" id="textarea" name="textarea"></textarea>
                    <div class="help-block">En lo posible un link al sitio web o documento donde podemos encontrar detalles de la información que te interesa que agreguemos.</div>
                  </div>
                </div>

              </fieldset>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-especial boton-abajo-left" data-dismiss="modal"><i class="fa fa-caret-left" aria-hidden="true"></i>  Cancelar</button>
            <button type="submit" ng-show="preguntasValid() && !loading && !sent" class="btn btn-especial-grande boton-abajo-right">Enviar preguntas  <i class="fa fa-caret-right" aria-hidden="true"></i></button>
            <label ng-show="loading" class="control-label pull-right">Enviando mensaje...</label>
            <label ng-show="sent" class="control-label pull-right">Mensaje enviado. ¡Muchas gracias!</label>
          </div>
        </form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
</div>

<div id="disclaimerModal" class="modal modal-chq fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Más información sobre <i>¿Vos y cuántos más?</i></h4>
      </div>
        <div class="modal-body">
          <p><i>¿Vos y cuántos más?</i> es un juego que permite conocer qué porcentaje de la población de la Argentina es similar al usuario, interactuando con preguntas y respuestas basadas en datos públicos.</p>
          <hr/>
          <h4 class="text-center"><strong>Equipo</strong></h4>
          <p class="text-center">Dirección de proyecto: <a href="https://twitter.com/fernandezpm" target="_blank">Pablo M. Fernández</a></p>
          <p class="text-center">Desarrollo fullstack: <a href="https://twitter.com/palamago" target="_blank">Pablo H. Paladino</a></p>
          <p class="text-center">Investigación, anápsis de datos y redacción: <a href="https://twitter.com/am_riera" target="_blank">Ariel Riera</a></p>
          <p class="text-center">Diseño web y UX: <a href="https://twitter.com/marianavarelatw" target="_blank">Mariana Varela</a></p>
          <hr/>
          <h4 class="text-center"><strong>Dirección ejecutiva</strong></h4>
          <p class="text-center"><a href="https://twitter.com/lauzommer" target="_blank">Laura Zommer</a></p>
          <hr/>
          <h4 class="text-center"><strong>Tecnologías utilizadas</strong></h4>
          <p class="text-center">Laravel PHP - MySQL - Angular JS</p>
          <h4 class="text-center"><a target="_blank" href="https://github.com/chequeado/desmitificador">Código fuente en GitHub</a></h4>
          <hr/>
          <h4 class="text-center"><strong>Con el apoyo de</strong></h4>
          <p class="text-center"><a target="_blank" href="https://latin-america.hivos.org/"><img src="/images/hivos.svg" title="hivos" width="100"/></a></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-especial boton-abajo-left" data-dismiss="modal"><i class="fa fa-caret-left" aria-hidden="true"></i>  Cerrar</button>
        </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal-dialog -->