@extends('frontend.layouts.app')

@section('content')
    <div ng-controller="MainCtrl" ng-init="init('{{$cat}}')" class="row">

        <h2 class="text-center" ng-show="loading"><i class="fa fa-cog fa-spin fa-3x fa-fw"></i></h2>
        <h2 class="text-center" ng-show="loading">Cargando preguntas</h2>
        <h2 class="text-center" ng-cloak ng-hide="loading || thanks">Pregunta @{{index+1}} de @{{questions.length}}</h2>

        <div ng-hide="loading" ng-cloak class="col-xs-12">
        	<div ng-show="questionMode && !thanks">
	        	<h1>@{{question.title}}</h1>
	        	<h2>@{{question.description}}</h2>
	        	<div ng-include="include_options">
	            	<!-- template de options -->
	         	</div>
        	</div>
        	<div ng-hide="questionMode || thanks">
        		<h1>Usted seleccionó "@{{answer.text}}" al igual que el @{{answer.value}}% de la población.</h1>
	        	<h2>@{{question.answer_title}}</h2>
	        	<h2>@{{question.answer_description}}</h2>
	        	<button class="btn btn-default btn-lg" ng-hide="index+1 == questions.length" ng-click="next()">Siguiente pregunta</button>
	        	<button class="btn btn-default btn-lg" ng-show="index+1 == questions.length" ng-click="finish()">Finalizar</button>
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