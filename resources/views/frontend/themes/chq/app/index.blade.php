@extends('frontend.themes.'.$theme.'.layouts.app')

@section('content')
    <div class="question-container" ng-controller="MainCtrl" ng-init='init("{{$cat}}", [ "#19845b", "#a50f0f", "#facf5a", "#444854", "#1a2156" ])' ng-cloak>

        <!-- container -->
        <div class="container theme-showcase" role="main">
            <div class="row">
            <div class="col-md-10 col-md-offset-1">
              <div class="jumbotron">

                <!-- question -->
                <div ng-show="state != 'thanks'">
                    <h1>@{{question.title}}</h1>
                    <div class="progress">
                     <div data-percentage="0%" ng-style="{'width': ((index+1)*100/questions.length) + '%' }" class="progress-bar progress-bar-success" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    
                    <p class="pregunta-counter">Pregunta @{{index+1}} de @{{questions.length}}</p>
                    <div class="well">
                      <p>@{{question.call_action}}</p>
                    </div>
                </div>
                <!-- /question -->
                
                <!-- options -->
                <div class="row" ng-show="state == 'options'">
                  <div class="col-md-1"></div>
                  <div class="col-md-1"></div>
                  <div class="col-sm-8">
                    <div class="list-group">
                      <a href="#" ng-repeat="opt in question.options" ng-click="chooseOption(opt)" class="list-group-item">@{{opt.text}}</a>
                    </div>
                  </div>
                  <div class="col-md-1"></div>
                  <div class="col-md-1"></div>
                  <button class="btn btn-default btn-especial boton-abajo-right" ng-click="skip()" >Saltar esta pregunta <i class="fa fa-caret-right" aria-hidden="true"></i></button>
                </div>
                <!-- /options -->

                <!-- slider -->
                <div class="row" ng-show="state == 'slider'">
                    <div class="col-md-12">
                        <p class="respuesta">Tu respuesta: @{{question.answer.text}}</p>
                        <h2>¿Qué porcentaje de la población crees que es como vos?</h2>
                    </div>
                    
                    <div class="col-md-8 col-md-offset-2 text-center">
                        <slider ng-model="question.bet" min="0" step="1" max="100" tooltip="'hide'" on-stop-slide="chooseBet($event,value)"></slider>
                        <span class="numero-grande">@{{question.bet}}%</span>
                    </div>

                    <button class="btn btn-default btn-especial boton-abajo-left" ng-click="changeOption()"><i class="fa fa-caret-left" aria-hidden="true"></i> Modificar mi respuesta</button>

                </div>
                <!-- /slider -->

                <!-- answer -->
                <div class="row" ng-show="state == 'answer'">

                    <div class="col-md-12">
                        <p class="respuesta">De las <strong>@{{votes.total_question}} personas</strong> que contestaron esta pregunta, <strong>@{{votes.total_option}}</strong> contestaron como vos. Esto representa el <strong>@{{((votes.total_option*100)/votes.total_question).toFixed(2)}}%</strong>.</p>
                    </div>

                    <div class="col-md-6">
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
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6 text-center">
                                <b>@{{question.answer.text}}</b> al igual que el <span class="numero-grande">@{{question.answer.value}}%</span> de la población.
                            </div>
                            <div class="col-md-6 text-center resultado-carita">
                                 Tu estimado fue de <strong>@{{question.bet}}%</strong>, 
                                <strong ng-show="question.diff<=10">no estuviste tan lejos, muy bien.</strong>
                                <strong ng-show="question.diff>10">la realidad es diferente a lo que creías.</strong>
                                <img alt="" ng-show="question.diff<=10" ng-src="images/bien.png" class="img-responsive"/>
                                <img alt="" ng-show="question.diff>10" ng-src="images/sorpresa.png" class="img-responsive"/>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <button ng-click="changeOption()" class="btn btn-default btn-especial-chico">Modificar mi respuesta</button>
                            </div>
                            <div class="col-md-6">
                                <button href="#" class="btn btn-default btn-especial-chico" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Ver más información</button>
                            </div>
                            <div class="col-md-12">
                                <div class="collapse" id="collapseExample">
                                    <p>Fuente: <a target="_blank" href="@{{question.answer_source_link}}">@{{question.answer_source}}</a></p>
                                    <p>@{{question.answer_description}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <button href="#" class="btn btn-default btn-especial-chico"><i class="fa fa-twitter" aria-hidden="true"></i></button>
                                <button href="#" class="btn btn-default btn-especial-chico"><i class="fa fa-facebook-official" aria-hidden="true"></i></button>
                            </div>
                            <div class="col-md-6">
                                <a target="_blank" ng-show="question.answer_link" class="btn btn-default btn-especial-chico" href="@{{question.answer_link}}">Leer la nota</a>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <br/><br/>
                    <button ng-click="moveNext()" ng-hide="index+1 == questions.length" class="btn btn-default btn-especial-grande boton-abajo-right">Siguiente pregunta <i class="fa fa-caret-right" aria-hidden="true"></i></button>
                    <button ng-click="finish()" ng-show="index+1 == questions.length" class="btn btn-default btn-especial-grande boton-abajo-right">Finalizar <i class="fa fa-caret-right" aria-hidden="true"></i></button>            
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