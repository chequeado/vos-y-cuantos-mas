@extends('frontend.themes.'.$theme.'.layouts.app')

@section('content')
    <div  ng-controller="MainCtrl" ng-init='init("{{$cat}}","{{$limit}}", [ "#e4401e", "#9614a5", "#fce919", "#417dec", "#367b25" ])' ng-cloak ng-class="state == 'answer' ? 'fondo6' : 'question-container'" >
   <!--  <div  ng-controller="MainCtrl" ng-init='init("{{$cat}}","{{$limit}}", [ "#e4401e", "#9614a5", "#fce919", "#417dec", "#367b25" ])' ng-cloak class="question-container" > -->
      <!--   <div class="credit">
            <a href="javascript:;" class="start-button btn" data-toggle="modal" data-target="#chooseModalCredit">
                <img src="/images/chqv2/nuevos/pregunta2.gif" width="40px"/>
            </a>
        </div>
        <div id="chooseModalCredit" class="modal modal-chq-credit fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title-credit">Los participantes de este proyecto fueron: </h4>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <ul>
                                                <li>
                                                    Carolina Bohorquez | <b>Diseño</b>
                                                </li>
                                                <li>
                                                    Pilar Castro | <b>Desarrolladora</b>
                                                </li>
                                                <li>
                                                    Pablo M. Fernández | <b>Coordinación Gral.</b>
                                                </li>
                                                <li>
                                                    Luciana Godoy | <b>UX y Diseño Gral.</b>
                                                </li>
                                                <li>
                                                    Esteban Oliva | <b>SEO</b>
                                                </li>
                                                <li>
                                                    Pablo H. Paladino | <b>Líder técnico</b>
                                                </li>
                                                <li>
                                                    Joaquín Saralegui | <b>Desarrollador</b>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  -->


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
                                <div data-percentage="0%" class="progress-bar progress-bar-success" role="progressbar" aria-valuemin="0" aria-valuemax="100"  ng-style="{'width': ((index+1)*100/questions.length) + '%' }" ></div>
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
                    <button class="skip-question" ng-click="skip()" >Saltar esta pregunta <img src="images/chqv2/nuevos/btn_der.gif"/></button>
                </div>
                <!-- /options -->

                <!-- slider -->
                <div ng-show="state == 'slider'">
                    <div class="row">

                        <div class="col-md-10 col-md-offset-1">
                            <p class="respuesta">Tu respuesta: @{{question.answer.text}}</p>
                        </div>

                        <div class="col-md-8 col-md-offset-2 text-center">
                            <div class="slider-box">
                            <h4 class="slider-title">¿Qué porcentaje de la población crees que es como vos?</h4>
                            <slider ng-model="question.bet" min="0" step="1" max="100" tooltip="'hide'" on-stop-slide="chooseBet($event,value)"></slider>
                            <span class="numero-grande">@{{question.bet}}%</span>
                            <a href="#" class="no-idea-option" ng-click="skipBet()">No tengo idea <i class="fa fa-meh-o" aria-hidden="true" ></i></a>
                            </div>
                        </div>

                    </div>
                    <div class="clearfix"></div>
                    <button class="skip-question" ng-click="changeOption()" ><img src="images/chqv2/nuevos/btn_izq.gif"/> Modificar mi respuesta</button>
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
                        <div class="col-sm-6 "> <!--col-md-pull-6-->
                            <div class="box1">
                                <canvas id="doughnut" class="chart chart-doughnut"
                                chart-data="chart.data" chart-labels="chart.labels" chart-legend="true" chart-colours="chart.colours">
                                </canvas>
                                <div hide show-xs>
                                    <p style="text-align:center;margin-bottom:2px;font-size:11px;font-weight:bold;" ng-repeat="(k,o) in question.options" ><span ng-style="{'background-color':chart.colours[k]}" style="height:15px;width:15px;position:absolute;border-radius:10px;"></span><span style="padding-left:20px;">@{{o.text}} (@{{o.value.replace('.0','')}}%)</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 box2">
                            <div class="box2">
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
                                         <img alt="" ng-src="images/chqv2/wink.gif" class="img-icon"/>
                                        <p>No tenías idea. Hoy aprendiste algo.</p>
                                    </span>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        <div class="row">
                            <div class="row share">
                                <p class="surprise">¿Te sorprendió la respuesta?</p>
                                <a href="#" class="share-twitter" share-url="{{url('questions')}}/@{{question.id}}" share-text="Mirá los datos sobre @{{question.title}} en '¿Vos y cuántos más?'" share-hashtags="" share-via="chequeado">
                                    Compartir <img alt="" ng-src="images/chqv2/nuevos/tw.gif" />
                                </a>
                                <a id="share-facebook" data-url="{{url('questions')}}/@{{question.id}}" href="#" class="share-facebook">
                                    Compartir <img alt="" ng-src="images/chqv2/nuevos/fb.gif" />
                                </a> 
                                <p>¿Te quedaste con ganas de saber más?</p>
                            </div>
                            <div class="row ">
                                <div class="col-md-12 see-sources">
                                <!-- <a href="javascript:;" class="start-button btn" data-toggle="modal" data-target="#chooseModalCredit">
                                    <img src="/images/chqv2/nuevos/pregunta2.gif" width="40px"/>
                                </a> -->
                                    <a target="_blank" href="javascript:;" data-toggle="modal" data-target="#chooseModalSrc">Ver fuente</a>
                                </div>



                                <div id="chooseModalSrc" class="modal modal-chq-credit fade" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
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
                                    <div class="col-md-12 see-sources-2" ng-show="question.answer_link">
                                        <a ng-href="@{{question.answer_link}}" target="_blank">
                                        Nota sobre el tema
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                    <div class="row btn-container">
                        <button class="skip-question2" ng-click="changeOption()" > <img src="images/chqv2/nuevos/btn_izq.gif"/>Modificar mi respuesta</button>
                        <button ng-click="moveNext()" ng-hide="index+1 == questions.length" class="skip-question2">Siguiente pregunta  <img src="images/chqv2/nuevos/btn_der.gif"/></button>
                        <button ng-click="finish()" ng-show="index+1 == questions.length" class="skip-question2">Finalizar  <img src="images/chqv2/nuevos/btn_der.gif"/></button>
                    </div>
                </div>
                <!-- /answer -->

                  <!-- answer -->
                <div class="row" ng-show="state == 'thanks'">

                    <div class="col-md-12">
                        <h1>Muchas gracias por participar!</h1>
                    </div>
                    <a href="/" ng-show="index+1 == questions.length" class="btn btn-default btn-especial-grande boton-abajo-right">Jugar otra vez  <img src="images/chqv2/nuevos/btn_der.gif"/></a>

                </div>

              </div> <!-- /jumbotron -->
              <!-- <a id="img-credit" ng-show="!isMobile() && (question.image_credit_source || question.image_credit_link)" ng-href="@{{question.image_credit_link}}">
                <i class="fa fa-picture-o" aria-hidden="true"></i> Créditos @{{question.image_credit_source}}
              </a> -->
        </div> <!-- /col -->
        </div> <!-- /row -->
        </div> <!-- /container -->

    </div><!--main-->
@endsection

@section('after-scripts-end')
    <script>
    </script>
@stop
