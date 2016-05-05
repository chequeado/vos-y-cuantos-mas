@extends('frontend.layouts.app')

@section('content')
    <div ng-controller="MainCtrl" ng-init="init('{{$cat}}')" class="row">

        <h2 class="text-center" ng-show="loading"><i class="fa fa-cog fa-spin fa-3x fa-fw"></i></h2>
        <h2 class="text-center" ng-show="loading">Cargando preguntas</h2>
        <h2 class="text-center" ng-cloak ng-hide="loading || thanks">Pregunta @{{index+1}} de @{{questions.length}}</h2>

        <div ng-hide="loading" ng-cloak class="col-xs-12">
        	<div ng-show="questionMode && !thanks">
	        	<h1><i class="@{{question.icon}}"></i>@{{question.title}}</h1>
	        	<h2>@{{question.description}}</h2>
	        	<div ng-include="include_options">
	            	<!-- template de options -->
	         	</div>
        	</div>
        	<div ng-hide="questionMode || thanks">
                <div class="row">
                    <div class="col-md-6">
                        <h2>@{{answer.text_answer}}</h2>
                        <p>Estás dentro de "@{{answer.text}}" al igual que el @{{answer.value}}% de la población.</p>
                        <p>@{{question.answer_description}}</p>
                        <p>Fuente: <a target="_blank" href="@{{question.answer_source_link}}">@{{question.answer_source}}</a></p>
                        <p ng-show="question.answer_link"><a target="_blank" href="@{{question.answer_link}}" class="btn btn-primary">Ver Nota</a></p>
                    </div>
                    <div class="col-md-6">
                        <h2><i class="@{{question.icon}}"></i>@{{question.answer_title}}</h2>
                        <canvas id="doughnut" class="chart chart-doughnut"
                          chart-data="chart.data" chart-labels="chart.labels" chart-legend="true">
                        </canvas> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
        	        	<button class="btn btn-default btn-lg btn-block" ng-hide="index+1 == questions.length" ng-click="next()">Siguiente pregunta</button>
        	        	<button class="btn btn-default btn-lg btn-block" ng-show="index+1 == questions.length" ng-click="finish()">Finalizar</button>
                    </div>
                </div>
        	</div>

        	<div ng-show="thanks">
        		<h1>Muchas gracias por participar!</h1>
        	</div>
        </div>

    </div><!--row-->
@endsection

@section('after-scripts-end')
    <script>
    </script>
@stop