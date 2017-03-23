@extends('frontend.themes.'.$theme.'.layouts.app')

@section('content')
    <div class="question-container" ng-controller="MainCtrl" ng-init='init("{{$cat}}", [ "#19845b", "#a50f0f", "#67a3aa", "#444854", "#1a2156" ])' ng-cloak>

        <!-- container -->
        <div class="container theme-showcase" role="main">
            <div class="row">
            <div class="col-md-12">
              <div class="jumbotron">

                <!-- question -->
                <div class="row" ng-show="state != 'thanks'">
                    <div class="col-md-12">
                        <h1>@{{question.title}}</h1>
                        <div class="progress">
                         <div data-percentage="0%" ng-style="{'width': ((index+1)*100/questions.length) + '%' }" class="progress-bar progress-bar-success" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        
                        <p class="pregunta-counter">Pregunta @{{index+1}} de @{{questions.length}}</p>
                        <div class="well">
                          <p>@{{question.call_action}}</p>
                        </div>
                    </div>
                </div>
                <!-- /question -->
                
                <!-- options -->
                <div ng-show="state == 'options'">
                    <div class="row">
                      <div class="col-md-1"></div>
                      <div class="col-md-1"></div>
                      <div class="col-sm-8">
                        <div class="list-group">
                          <a href="#" ng-repeat="opt in question.options" ng-click="chooseOption(opt)" class="list-group-item">@{{opt.text}}</a>
                        </div>
                      </div>
                      <div class="col-md-1"></div>
                      <div class="col-md-1"></div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row btn-container">
                        <button class="btn btn-default btn-especial boton-abajo-right" ng-click="skip()" >Saltar esta pregunta <i class="fa fa-caret-right" aria-hidden="true"></i></button>
                    </div>
                </div>
                <!-- /options -->

                <!-- slider -->
                <div ng-show="state == 'slider'">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="respuesta">Tu respuesta: @{{question.answer.text}}</p>
                            <h2>¿Qué porcentaje de la población crees que es como vos?</h2>
                        </div>
                        
                        <div class="col-md-8 col-md-offset-2 text-center">
                            <slider ng-model="question.bet" min="0" step="1" max="100" tooltip="'hide'" on-stop-slide="chooseBet($event,value)"></slider>
                            <span class="numero-grande">@{{question.bet}}%</span>
                        </div>


                        <div class="col-md-12 text-center">
                            <button href="#" class="btn btn-default btn-especial-chico" ng-click="skipBet()">No tengo idea <i class="fa fa-meh-o" aria-hidden="true" ></i></button>
                        </div>

                    </div>
                    <div class="clearfix"></div>
                    <div class="row btn-container">
                        <button class="btn btn-default btn-especial boton-abajo-left" ng-click="changeOption()"><i class="fa fa-caret-left" aria-hidden="true"></i> Modificar mi respuesta</button>
                    </div>

                </div>
                <!-- /slider -->

                <!-- answer -->
                <div ng-show="state == 'answer'">
                    <div class="row">

                        <div class="col-md-12">
                            <p class="respuesta" ng-show="!saving">@{{question.answer.text_answer}}. 
                            <span ng-if="votes.total_option>1">De las <strong>@{{votes.total_question}} personas</strong> que contestaron esta pregunta, <strong>@{{votes.total_option}}</strong> contestaron como vos. Esto representa el <strong>@{{((votes.total_option*100)/votes.total_question).toFixed(2)}}%</strong>.</span>
                            <span ng-if="votes.total_option==1 && votes.total_question>1">De las <strong>@{{votes.total_question}} personas</strong> que contestaron esta pregunta, eres la primera que contesta de esta manera. Esto representa el <strong>@{{((votes.total_option*100)/votes.total_question).toFixed(2)}}%</strong>.</span>
                            </p>
                            <p class="respuesta" ng-show="saving">Calculando "Vos y cuántos más"...</p>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6 col-md-push-6">
                            <div class="row">
                                <div class="col-md-6 text-center">
                                    <strong>@{{question.answer.text}}</strong> al igual que el <span class="numero-grande">@{{question.answer.value}}%</span> de la población.
                                </div>
                                <div class="col-md-6 text-center resultado-carita">
                                    <span ng-show="question.bet">
                                         Tu estimado fue de <strong>@{{question.bet}}%</strong>, 
                                        <strong ng-show="question.diff==0">¡excelente! ¡exacto!.</strong>
                                        <strong ng-show="question.diff!=0 && question.diff<=10">no estuviste tan lejos, muy bien.</strong>
                                        <strong ng-show="question.diff>10">la realidad es diferente a lo que creías.</strong>
                                        <img alt="" ng-show="question.diff<=10" ng-src="images/bien.png" class="img-responsive"/>
                                        <img alt="" ng-show="question.diff>10" ng-src="images/sorpresa.png" class="img-responsive"/>
                                    </span>
                                    <span ng-hide="question.bet">
                                        No tenías idea. Hoy aprendiste algo.
                                        <img alt="" ng-src="images/bien.png" class="img-responsive"/>
                                    </span>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="row">
                              <h3>¿Te sorprendió la respuesta?</h3>
                              <div class="col-md-6">
                                <a href="#" class="btn btn-default btn-especial-chico btn-block share-btn share-twitter" share-url="{{url('questions')}}/@{{question.id}}" share-text="Mirá los datos sobre @{{question.title}} en '¿Vos y cuántos más?'" share-hashtags="" share-via="chequeado">
                                Compartila en <i class="fa fa-twitter" aria-hidden="true"></i>
                                </a>
                              </div>
                              <div class="col-md-6">
                                <a id="share-facebook" data-url="{{url('questions')}}/@{{question.id}}" href="#" class="btn btn-default btn-especial-chico btn-block">
                                Compartila en <i class="fa fa-facebook-official" aria-hidden="true"></i>
                                </a>
                              </div>
                            </div>
                            <h3>¿Te quedaste con ganas de saber más?</h3>
                            <div class="row">
                              <div class="col-md-12">
                                <button href="#" class="btn btn-default btn-especial-chico btn-block" data-toggle="collapse" data-target="#fuenteCollapse" aria-expanded="false" aria-controls="fuenteCollapse">Ver la fuente</button>
                                <div class="collapse" id="fuenteCollapse">
                                    <div ng-show="question.answer_source_link">
                                        <h3>Fuente</h3>
                                        <p><a target="_blank" href="@{{question.answer_source_link}}">@{{question.answer_source}}</a></p>
                                    </div>
                                    <div ng-show="question.answer_description">
                                        <h3>Más información</h3>
                                        <p>@{{question.answer_description}}</p>
                                    </div>
                                </div>
                              </div>
                              <div class="col-md-12" ng-show="question.answer_link">
                                <a class="btn btn-default btn-especial-chico btn-block" ng-href="@{{question.answer_link}}" target="_blank">
                                Leé la nota de este tema
                                </a>
                              </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-md-pull-6">
                            <canvas id="doughnut" class="chart chart-doughnut"
                              chart-data="chart.data" chart-labels="chart.labels" chart-legend="true" chart-colours="chart.colours">
                            </canvas>
                            <div hide show-xs>
                                <table class="table">
                                    <thead>
                                        <tr><td>Descripción</td><td class="text-right">Valor</td></tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="(k,o) in question.options" ng-style="{color:chart.colours[k]}"><td>@{{o.text}}</td><td class="text-right">@{{o.value}}%</td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row btn-container">
                        <button class="btn btn-default btn-especial boton-abajo-left" ng-click="changeOption()"><i class="fa fa-caret-left" aria-hidden="true"></i> Modificar mi respuesta</button>
                        <button ng-click="moveNext()" ng-hide="index+1 == questions.length" class="btn btn-default btn-especial-grande boton-abajo-right">Siguiente pregunta <i class="fa fa-caret-right" aria-hidden="true"></i></button>
                        <button ng-click="finish()" ng-show="index+1 == questions.length" class="btn btn-default btn-especial-grande boton-abajo-right">Finalizar <i class="fa fa-caret-right" aria-hidden="true"></i></button>
                    </div>
                </div>
                <!-- /answer -->

                  <!-- answer -->
                <div class="row" ng-show="state == 'thanks'">

                    <div class="col-md-12">
                        <h1>Muchas gracias por participar!</h1>
                    </div>
                    <a href="/" ng-show="index+1 == questions.length" class="btn btn-default btn-especial-grande boton-abajo-right">Jugar otra vez <i class="fa fa-caret-right" aria-hidden="true"></i></a>

                </div>

              </div> <!-- /jumbotron -->
        </div> <!-- /col -->
        </div> <!-- /row -->
        </div> <!-- /container -->

    </div><!--main-->
@endsection

@section('after-scripts-end')
    <script>
    </script>
@stop