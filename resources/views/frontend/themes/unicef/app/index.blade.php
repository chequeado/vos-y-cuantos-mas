@extends('frontend.themes.'.$theme.'.layouts.app')

@section('content')
    <div class="question-container" ng-controller="MainCtrl" ng-init='init("{{$cat}}","{{$limit}}", [ "#19845b", "#a50f0f", "#67a3aa", "#6622A2", "#1a2156" ], true)' ng-cloak>

        <!-- container -->
        <div class="container theme-showcase" role="main">
            <div class="row">
                <div class="col-md-12">
                    <div id="question-content-container">
                        @include('frontend.themes.'.$theme.'.includes.nav')

                        <div class="question-body">
                            <!-- question -->
                            <div class="row" ng-show="state != 'thanks'">
                                <div class="col-md-12">
                                    <h1>@{{question.title}}</h1>
                                    <div class="progress">
                                        <div data-percentage="0%" ng-style="{'width': ((index+1)*100/questions.length) + '%' }" class="progress-bar progress-bar-success" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="question-counter">Pregunta @{{index+1}} de @{{questions.length}}</p>
                                    <div class="question-text">
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
                                    <button class="btn btn-unicef-blue pull-right" ng-click="skip()" ><span>Saltar esta pregunta</span></button>
                                </div>
                            </div>
                            <!-- /options -->

                            <!-- slider -->
                            <div ng-show="state == 'slider'">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="answer-selection">Tu respuesta: @{{question.answer.text}}</p>
                                        <h1>¿Qué porcentaje de la población crees que es como vos?</h1>
                                    </div>

                                    <div class="col-md-8 col-md-offset-2 text-center">
                                        <slider ng-model="question.bet" min="0" step="1" max="100" tooltip="'hide'" on-stop-slide="chooseBet($event,value)"></slider>
                                        <h1 class="numero-grande">@{{question.bet}}%</h1>
                                    </div>


                                    <div class="col-md-12 text-center">
                                        <button href="#" class="btn btn-link" ng-click="skipBet()"><strong>No tengo idea <i class="fa fa-meh-o" aria-hidden="true" ></i></strong></button>
                                    </div>

                                </div>
                                <div class="clearfix"></div>
                                <div class="row btn-container">
                                    <button class="btn btn-unicef-blue pull-left" ng-click="changeOption()"><span>Modificar mi respuesta</span></button>
                                </div>

                            </div>
                            <!-- /slider -->

                            <!-- answer -->
                            <div ng-show="state == 'answer'">

                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="answer-selection">@{{question.answer.text_answer}}</p>
                                    </div>
                                </div>

                                <div id="stats-container" class="row">
                                    <div class="col-md-6 col-md-push-6">
                                        <div class="row">
                                            <div class="col-md-6 text-center resultado-porcentaje">
                                                <strong>@{{question.answer.text}}</strong> al igual que el <span class="numero-grande">@{{question.answer.value.replace('.0','')}}%</span> de la población.
                                            </div>
                                            <div class="col-md-6 text-center resultado-carita">
                                                <span ng-show="question.bet">
                                                    Tu estimado fue de <strong>@{{question.bet}}%</strong>
                                                    <span ng-show="question.diff==0">¡excelente! ¡exacto!.</span>
                                                    <span ng-show="question.diff!=0 && question.diff<=10">no estuviste tan lejos, muy bien.</span>
                                                    <span ng-show="question.diff>10">la realidad es diferente a lo que creías.</span>
                                                    <span ng-hide="question.sensitive==1">
                                                        <img alt="" ng-show="question.diff<=10" ng-src="/images/unicef/bien.svg" class="img-responsive"/>
                                                        <img alt="" ng-show="question.diff>10" ng-src="/images/unicef/sorpresa.svg" class="img-responsive"/>
                                                    </span>
                                                </span>
                                                <span ng-hide="question.bet">
                                                    No tenías idea. Hoy aprendiste algo.
                                                    <span ng-hide="question.sensitive==1">
                                                        <img alt="" ng-src="/images/unicef/bien.svg" class="img-responsive"/>
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <h3>¿Te sorprendió la respuesta?</h3>
                                            <div class="col-md-6 col-sm-6">
                                                <a href="#" class="btn btn-unicef-green-light btn-block share-btn share-twitter" share-url="{{url('questions')}}/@{{question.id}}" share-text="Mirá los datos sobre @{{question.title}} en '¿Vos y cuántos más? Nueva generación'" share-hashtags="" share-via="chequeado @UNICEFArgentina">
                                                Compartila en <i class="fa fa-twitter" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <a id="share-facebook" data-url="{{url('questions')}}/@{{question.id}}" href="#" class="btn btn-unicef-green-light btn-block">
                                                Compartila en <i class="fa fa-facebook-official" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h3>¿Te quedaste con ganas de saber más?</h3>
                                                <button href="#" class="btn btn-unicef-green-light btn-block" data-toggle="collapse" data-target="#fuenteCollapse" aria-expanded="false" aria-controls="fuenteCollapse">Mirá la fuente de datos de esta pregunta</button>
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
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12" ng-show="question.answer_link">
                                                <a class="btn btn-unicef-green-light btn-block" ng-href="@{{question.answer_link}}" target="_blank">
                                                Leé la nota de este tema
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-md-pull-6"> <!--col-md-pull-6-->
                                        <canvas id="doughnut" class="chart chart-doughnut"
                                        chart-data="chart.data" chart-labels="chart.labels" chart-legend="true" chart-colours="chart.colours">
                                        </canvas>
                                        <div hide show-xs>
                                            <table class="table">
                                                <thead>
                                                    <tr><td>Descripción</td><td class="text-right">Valor</td></tr>
                                                </thead>
                                                <tbody>
                                                    <tr ng-repeat="(k,o) in question.options" ng-style="{color:chart.colours[k]}"><td>@{{o.text}}</td><td class="text-right">@{{o.value.replace('.0','')}}%</td></tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>


                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        @include('frontend.themes.'.$theme.'.includes.answer-mini-stats')
                                    </div>
                                </div>

                                <div class="clearfix"></div>

                                <div class="row btn-container">
                                    <hr/>
                                    <button class="btn btn-unicef-blue pull-left" ng-click="changeOption()"><span>Modificar mi respuesta</span></button>
                                    <button ng-click="moveNext()" ng-hide="index+1 == questions.length" class="btn btn-unicef-blue pull-right"><span>Siguiente pregunta</span></button>
                                    <button ng-click="finish()" ng-show="index+1 == questions.length" class="btn btn-unicef-blue pull-right"><span>Finalizar</span></button>
                                </div>
                            </div>
                            <!-- /answer -->

                        </div> <!-- /question-body -->

                    </div> <!-- /content-container -->
                </div> <!-- /col -->
                @include('frontend.themes.'.$theme.'.includes.footer')
            </div> <!-- /row -->
        </div> <!-- /container -->

    </div><!--main-->
@endsection

@section('after-scripts-end')
    <script>
    </script>
@stop
