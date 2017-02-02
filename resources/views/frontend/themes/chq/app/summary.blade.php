@extends('frontend.themes.'.$theme.'.layouts.app')

@section('content')

    <div class="question-container" ng-controller="SummaryCtrl" ng-init='init("{{$cat}}", {!!$votes!!}, [ "#19845b", "#a50f0f", "#facf5a", "#444854", "#1a2156" ])' ng-cloak>

        <!-- container -->
        <div class="container theme-showcase" role="main">
            <div class="row">
            <div class="col-md-10 col-md-offset-1">
              <div class="jumbotron">

                  <!-- answer -->
                <div class="row">

                    <div class="col-md-12">
                        <h1>Resultados finales</h1>
                    </div>
                
                </div>

                <div class="row">

                    <div class="col-md-4">
                        <p class="text-center">Vos y MUCHOS más</p>
                    </div>
                    <div class="col-md-4">
                        <p class="text-center">Vos y ALGUNOS más</p>
                    </div>
                    <div class="col-md-4">
                        <p class="text-center">Vos y POCOS más</p>
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-4">
                        <a ng-repeat="q in votes.muchos" class="btn btn-default btn-block">@{{q.question.title}}</a>
                    </div>
                    <div class="col-md-4">
                        <a ng-repeat="q in votes.algunos" class="btn btn-default btn-block">@{{q.question.title}}</a>
                    </div>
                    <div class="col-md-4">
                        <a ng-repeat="q in votes.pocos" class="btn btn-default btn-block">@{{q.question.title}}</a>
                    </div>

                </div>

                <hr/>

                <div class="row">

                    <a href="/" class="btn btn-default btn-especial-grande boton-abajo-right">Jugar otra vez <i class="fa fa-caret-right" aria-hidden="true"></i></a>

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