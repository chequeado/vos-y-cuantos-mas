@extends('frontend.layouts.app')

@section('content')
    <div ng-controller="MainCtrl" ng-init="init('{{$cat}}')" class="row">

        <h2 class="text-center" ng-show="loading"><i class="fa fa-cog fa-spin fa-3x fa-fw"></i></h2>
        <h2 class="text-center" ng-show="loading">Cargando preguntas</h2>
        <h2 class="text-center" ng-cloak ng-hide="loading">@{{questions.length}} preguntas</h2>

    </div><!--row-->
@endsection

@section('after-scripts-end')
    <script>
    </script>
@stop