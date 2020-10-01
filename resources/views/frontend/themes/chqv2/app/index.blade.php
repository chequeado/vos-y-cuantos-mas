@extends('frontend.themes.'.$theme.'.layouts.app')

@section('content')
    <div class="question-container" ng-controller="MainCtrl" ng-init='init("{{$cat}}","{{$limit}}", [ "#e4401e", "#9614a5", "#fce919", "#417dec", "#367b25" ])' ng-cloak>

        <!-- container -->
        <div class="container-pregunta theme-showcase" role="main">
            <div class="row">
                <div class="col-md-12">
                    <div class="">

                    <!-- question -->
                    <h4 class="question-title">@{{question.title}}</h4>
                    <div class="row" ng-show="state != 'thanks'">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <p class="pregunta-counter">Pregunta @{{index+1}} de @{{questions.length}}</p>
                            <div class="progress">
                                <div data-percentage="0%" class="progress-bar progress-bar-success" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 10%"></div>
                                </div>
                                <img src="/images/chqv2/corner.png" class="progress-corner pbr" />
                                <img src="/images/chqv2//corner.png" class="progress-corner ptr" />
                                <img src="/images/chqv2//corner.png" class="progress-corner pbl" />
                                <img src="/images/chqv2//corner.png" class="progress-corner ptl" />
                            </div>
                        </div>
                    </div>
                    <h5 class="question-action">@{{question.call_action}}</h5>

                <!-- options -->
                <div ng-show="state == 'options'">
                    <div class="row">
                      <div class="col-md-2"></div>
                      <div class="col-md-8">
                        <div class="list-group options-group">
                          <a href="#" ng-repeat="opt in question.options" ng-click="chooseOption(opt)" class="list-group-item question-option">@{{opt.text}}</a>
                        </div>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                    <button class="skip-question" ng-click="skip()" >Saltar esta pregunta <i class="fa fa-caret-right" aria-hidden="true"></i></button>
                </div>
                <!-- /options -->

                <!-- slider -->
                <div ng-show="state == 'slider'">
                    <div class="row">

                        <div class="col-md-10 col-md-offset-1">
                            <p class="respuesta">Tu respuesta: @{{question.answer.text}}</p>
                        </div>

                        <div class="col-md-8 col-md-offset-2 slider-box text-center">
                            <h4 class="slider-title">¿Qué porcentaje de la población crees que es como vos?</h4>
                            <slider ng-model="question.bet" min="0" step="1" max="100" tooltip="'hide'" on-stop-slide="chooseBet($event,value)"></slider>
                            <span class="numero-grande">@{{question.bet}}%</span>
                            <a href="#" class="no-idea-option" ng-click="skipBet()">No tengo idea <i class="fa fa-meh-o" aria-hidden="true" ></i></a>

                        </div>

                    </div>
                    <div class="clearfix"></div>
                    <button class="skip-question" ng-click="changeOption()" ><i class="fa fa-caret-left" aria-hidden="true"></i> Modificar mi respuesta</button>
                </div>
                <!-- /slider -->

                <!-- answer -->
                <div ng-show="state == 'answer'">
                    <div class="row">

                        <div class="col-md-10 col-md-offset-1">
                            <p class="respuesta" ng-show="!saving">@{{question.answer.text_answer}}
                            <span ng-if="votes.total_option>1">De las <strong>@{{votes.total_question}} personas</strong> que contestaron esta pregunta, <strong>@{{votes.total_option}}</strong> contestaron como vos. Esto representa el <strong>@{{((votes.total_option*100)/votes.total_question).toFixed(1)}}%</strong>.</span>
                            <span ng-if="votes.total_option==1 && votes.total_question>1">De las <strong>@{{votes.total_question}} personas</strong> que contestaron esta pregunta, eres la primera que contesta de esta manera. Esto representa el <strong>@{{((votes.total_option*100)/votes.total_question).toFixed(1)}}%</strong>.</span>
                            </p>
                            <p class="respuesta" ng-show="saving">Calculando "Vos y cuántos más"...</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 col-md-offset-1 box1"> <!--col-md-pull-6-->
                            <canvas id="doughnut" class="chart chart-doughnut"
                              chart-data="chart.data" chart-labels="chart.labels" chart-legend="true" chart-colours="chart.colours">
                            </canvas>
                            <div hide show-xs>
                                <p style="text-align:center;margin-bottom:2px;font-size:11px;font-weight:bold;" ng-repeat="(k,o) in question.options" ><span ng-style="{'background-color':chart.colours[k]}" style="height:15px;width:15px;position:absolute;border-radius:10px;"></span><span style="padding-left:20px;">@{{o.text}} (@{{o.value.replace('.0','')}}%)</span></p>
                            </div>
                        </div>
                        <div class="col-md-5 box2">
                            <div class="row results-analysis">
                                <p><strong>@{{question.answer.text}}</strong> al igual que el <span class="numero-grande" style="margin:-10px;">@{{question.answer.value.replace('.0','')}}%</span> de la población.</p>
                                <img alt="" ng-show="question.diff<=10" ng-src="images/chqv2/wink.png" class="img-icon"/>
                                <img alt="" ng-show="question.diff>10" ng-src="images/chqv2/surprised.png" class="img-icon"/>
                                <p ng-show="question.bet">
                                        Tu estimado fue de <strong>@{{question.bet}}%</strong>.
                                    <strong ng-show="question.diff==0">¡Excelente! Eso es exacto.</strong>
                                    <strong ng-show="question.diff!=0 && question.diff<=10"> No estuviste tan lejos, muy bien.</strong>
                                    <strong ng-show="question.diff>10"> La realidad es diferente a lo que creías.</strong>
                                </p>
                                    <span ng-hide="question.bet">
                                    <img alt="" ng-src="images/wink.png" class="img-icon"/>
                                    <p>No tenías idea. Hoy aprendiste algo.</p>
                                </span>
                                <div class="clearfix"></div>
                            </div>        
                        <div class="row">
                            <div class="row share">
                                <p>¿Te sorprendió la respuesta?</p>
                                <a href="#" class="share-twitter" share-url="{{url('questions')}}/@{{question.id}}" share-text="Mirá los datos sobre @{{question.title}} en '¿Vos y cuántos más?'" share-hashtags="" share-via="chequeado">
                                    Compartir <i class="fa fa-twitter" aria-hidden="true"></i>
                                </a>
                                <a id="share-facebook" data-url="{{url('questions')}}/@{{question.id}}" href="#" class="share-facebook">
                                    Compartir <i class="fa fa-facebook-official" aria-hidden="true"></i>
                                </a> 
                                <p>¿Te quedaste con ganas de saber más?</p>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <a target="_blank" href="@{{question.answer_source_link}}" class="see-sources">Ver fuente</a>
                                </div>
                                <div class="col-md-12" ng-show="question.answer_link">
                                    <a class="see-sources" ng-href="@{{question.answer_link}}" target="_blank">
                                    Nota sobre el tema
                                    </a>
                                </div>
                            </div>
                        </div>                    
                    </div>
                </div>

                <div class="clearfix"></div>
                    <div class="row btn-container">
                        <button class="skip-question2" ng-click="changeOption()" ><i class="fa fa-caret-left" aria-hidden="true"></i> Modificar mi respuesta</button>
                        <button ng-click="moveNext()" ng-hide="index+1 == questions.length" class="skip-question2">Siguiente pregunta <i class="fa fa-caret-right" aria-hidden="true"></i></button>
                        <button ng-click="finish()" ng-show="index+1 == questions.length" class="skip-question2">Finalizar <i class="fa fa-caret-right" aria-hidden="true"></i></button>
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
              <a id="img-credit" ng-show="!isMobile() && (question.image_credit_source || question.image_credit_link)" ng-href="@{{question.image_credit_link}}">
                <i class="fa fa-picture-o" aria-hidden="true"></i> Créditos @{{question.image_credit_source}}
              </a>
        </div> <!-- /col -->
        </div> <!-- /row -->
        </div> <!-- /container -->

    </div><!--main-->
@endsection

@section('after-scripts-end')
    <script>
    </script>
@stop
