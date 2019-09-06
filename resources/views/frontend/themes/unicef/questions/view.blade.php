@extends('frontend.themes.'.$theme.'.layouts.master')

@section('meta')
  <!-- Place this data between the <head> tags of your website -->
  <title>¿Vos y cuántos más? - {{$obj->title}}</title>
  <meta name="description" content="{{$obj->call_action}}" />

  <!-- Schema.org markup for Google+ -->
  <meta itemprop="name" content="{{$obj->title}}">
  <meta itemprop="description" content="{{$obj->call_action}}">
  <meta itemprop="image" content="{{URL::to('/').'/images/unicef/logo-share.png'}}">

  <!-- Twitter Card data -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:site" content="@chequeado">
  <meta name="twitter:title" content="{{$obj->title}}">
  <meta name="twitter:description" content="{{$obj->call_action}}">
  <meta name="twitter:creator" content="@chequeado">
  <!-- Twitter summary card with large image must be at least 280x150px -->
  <meta name="twitter:image:src" content="{{URL::to('/').'/images/unicef/logo-share.png'}}">

  <!-- Open Graph data -->
  <meta property="og:title" content="{{$obj->title}}" />
  <meta property="og:type" content="article" />
  <meta property="og:url" content="{{route('frontend.question.view', ['id' => $obj->id])}}" />
  <meta property="og:image" content="{{URL::to('/').'/images/unicef/logo-share.png'}}" />
  <meta property="og:description" content="{{$obj->call_action}}" />
  <meta property="og:site_name" content="¿Vos y cuántos más?" />
  <meta property="fb:admins" content="Facebook numberic ID" />

@endsection

@section('content')

    <div id="question-detail-container" class="container" ng-controller="QuestionCtrl" ng-init='init({!!$obj!!}, [ "#19845b", "#a50f0f", "#67a3aa", "#6622A2", "#1a2156" ])'>

       <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-4 flex-align-end flex-direction-col">
            <img alt="Vos y cuantos más?" src="/images/unicef/iconito_user.svg" class="img-responsive logo-summary"/>
            <p class="text-right text-title-1">¿VOS Y CUÁNTOS MÁS?</p>
          </div>
          <div class="col-md-4"></div>
      </div>

      <div class="row">
          <div id="central-column" class="col-sm-10 col-sm-offset-1 col-xs-12 flex-direction-col flex-justify-space-between">

            <div class="row">
                <div class="col-md-12">
                    <div class="text-center results-number">
                      <h1 class="question-title">{{$obj->call_action}}</h1>
                      <hr/>
                    </div>
                </div>
            </div>


            <div class="row">
              <div class="col-md-6">
                <p class="text-center regular-text">{{$obj->title}}</p>
                <p class="p-text">Usamos datos de <a target="_blank" href="{{$obj->answer_source_link}}">{{$obj->answer_source}}</a> y armamos una pregunta en "¿Vos y cuántos más?" al respecto.</p>
                @if(isset($obj->answer_link))
                  <p class="p-text">Hicimos un chequeo sobre este tema: <a target="_blank" href="{{$obj->answer_link}}">leélo aquí</a>.</p>
                @endif
                <p class="p-text">Si quieres saber más, ¡juega!</p>
                <a href="/" class="btn btn-unicef-blue text-center btn-block">Jugar ahora!</a>
              </div>
              <div id="stats-container" class="col-md-6">
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

          </div> <!-- Central column -->
      </div> <!-- row -->
      <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-xs-12">
          @include('frontend.themes.'.$theme.'.includes.footer')
        </div>
      </div>

    </div><!--main-->
@endsection

@section('after-scripts-end')
    <script>
    </script>
@stop
