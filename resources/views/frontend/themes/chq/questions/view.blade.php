@extends('frontend.themes.'.$theme.'.layouts.master')

@section('meta')
  <!-- Place this data between the <head> tags of your website -->
  <title>¿Vos y cuántos más? - {{$obj->title}}</title>
  <meta name="description" content="{{$obj->call_action}}" />

  <!-- Schema.org markup for Google+ -->
  <meta itemprop="name" content="{{$obj->title}}">
  <meta itemprop="description" content="{{$obj->call_action}}">
  <meta itemprop="image" content="{{URL::to('/').'/imagecache/large/'.$obj->image_file}}">

  <!-- Twitter Card data -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:site" content="@chequeado">
  <meta name="twitter:title" content="{{$obj->title}}">
  <meta name="twitter:description" content="{{$obj->call_action}}">
  <meta name="twitter:creator" content="@chequeado">
  <!-- Twitter summary card with large image must be at least 280x150px -->
  <meta name="twitter:image:src" content="{{URL::to('/').'/imagecache/large/'.$obj->image_file}}">

  <!-- Open Graph data -->
  <meta property="og:title" content="{{$obj->title}}" />
  <meta property="og:type" content="article" />
  <meta property="og:url" content="{{route('frontend.question.view', ['id' => $obj->id])}}" />
  <meta property="og:image" content="{{URL::to('/').'/imagecache/large/'.$obj->image_file}}" />
  <meta property="og:description" content="{{$obj->call_action}}" />
  <meta property="og:site_name" content="¿Vos y cuántos más?" />
  <meta property="fb:admins" content="Facebook numberic ID" /> 

@endsection

@section('content')

    <div class="question-container" ng-controller="QuestionCtrl" ng-init='init({!!$obj!!}, [ "#19845b", "#a50f0f", "#facf5a", "#444854", "#1a2156" ])'>

        <!-- container -->
        <div class="container theme-showcase" role="main">
            <div class="row">
            <div class="col-md-10 col-md-offset-1">
              <div class="jumbotron">

              <div class="row">
                    <div class="col-md-6">
                      <h1>{{$obj->title}}</h1>
                      
                      <div class="well">
                        <p>{{$obj->call_action}}</p>
                      </div>


                      <p>
                        Usamos datos de <a target="_blank" href="{{$obj->answer_source_link}}">{{$obj->answer_source}}</a> y armamos una pregunta en "¿Vos y cuántos más?" al respecto.
                      </p>
                      @if(isset($obj->answer_link))
                        <p>
                          Hicimos un chequeo sobre este tema: <a target="_blank" href="{{$obj->answer_link}}">leélo aquí</a>.
                        </p>
                      @endif
                      <p>Si quieres saber más, ¡juega!</p>
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

                </div>

                <div class="row">

                    <a href="/" class="btn btn-default btn-especial-grande boton-abajo-right">Jugar <i class="fa fa-caret-right" aria-hidden="true"></i></a>

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
