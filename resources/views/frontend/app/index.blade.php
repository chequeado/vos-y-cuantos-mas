@extends('frontend.layouts.app')

@section('content')
    <div class="question-container" ng-controller="MainCtrl" ng-init="init('{{$cat}}')" ng-cloak layout="row" layout-fill ng-style="{'background-image': 'url(' + question.image_file + ')'}">

        <md-content class="question-bg" layout="row" layout-align="center top" layout-fill flex-gt-sm="100">
            
            <md-progress-circular ng-show="loading" class="md-primary" md-mode="indeterminate" md-diameter="100"></md-progress-circular>
            
            <div flex-xs="" flex-gt-sm="75" ng-hide="loading">
              <md-card layout="column">
                <md-toolbar md-accent>
                  <div class="md-toolbar-tools">
                    <md-button class="md-icon-button custom-icon-header" aria-label="Chequeado">
                        <i class="@{{question.icon}}"></i>
                    </md-button>
                    <h2>
                      <span>@{{question.title}}</span>
                    </h2>
                    <span flex></span>
                    <p class="md-subhead">@{{index+1}} de @{{questions.length}}</p>
                  </div>
                </md-toolbar>
                <div ng-show="questionMode && !thanks">
                    <md-card-content flex layout-padding>
                        <p>@{{question.call_action}}</p>
                        <div ng-include="include_options">
                            <!-- template de options -->
                        </div>
                    </md-card-content>
                    <md-card-actions layout="row" layout-align="end center">
                        <md-button ng-hide="question.answer" ng-click="next()" class="md-raised">
                            Saltar pregunta
                        </md-button>
                        <md-button ng-hide="!question.answer" ng-click="goToAnswer()" class="md-raised md-accent">
                            Ver Resultado
                        </md-button>
                    </md-card-actions>
                </div>

                <div ng-hide="questionMode || thanks">
                    <md-card-content flex layout-padding layout="row" layout-sm="column" layout-xs="column">
                        <div flex-xs flex-gt-sm="50" layout="column">
                            <h2>@{{question.answer.text_answer}}</h2>
                            <p>Estás dentro de "@{{question.answer.text}}" al igual que el @{{question.answer.value}}% de la población.</p>
                            <p>@{{question.answer_description}}</p>
                            <p>Fuente: <a target="_blank" href="@{{question.answer_source_link}}">@{{question.answer_source}}</a></p>
                            <p ng-show="question.answer_link"><a target="_blank" href="@{{question.answer_link}}" class="btn btn-default">Ver Nota</a></p>
                        </div>
                        <div flex-xs flex-gt-sm="50" layout="column">
                            <canvas id="doughnut" class="chart chart-doughnut"
                              chart-data="chart.data" chart-labels="chart.labels" chart-legend="true">
                            </canvas>
                        </div>
                    </md-card-content>
                    <md-card-actions layout="row" layout-align="end center">
                        <md-button class="md-raised md-accent" ng-hide="index+1 == questions.length" ng-click="next()">Siguiente pregunta</md-button>
                        <md-button class="md-raised md-accent" ng-show="index+1 == questions.length" ng-click="finish()">Finalizar</md-button>
                    </md-card-actions>
                </div>

                <div ng-show="thanks">
                    <md-card-content flex layout-padding>
                        <h1>Muchas gracias por participar!</h1>
                    </md-card-content>
                    <md-card-actions layout="row" layout-align="end center">
                        <md-button class="md-raised md-accent" href="/">Volver</md-button>
                    </md-card-actions>
                </div>

              </md-card>
            </div>
        </md-content>

    </div><!--row-->
@endsection

@section('after-scripts-end')
    <script>
    </script>
@stop