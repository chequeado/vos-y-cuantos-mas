@extends('frontend.themes.'.$theme.'.layouts.master')

@section('meta')
  <!-- Place this data between the <head> tags of your website -->
  <title>¿Vos y cuántos más? - Mis resultados</title>
  <meta name="description" content="Participé en '¿Vos y cuántos más de Chequeado' y estos son mis resultados." />

  <!-- Schema.org markup for Google+ -->
  <meta itemprop="name" content="¿Vos y cuántos más? Nueva generación">
  <meta itemprop="description" content="Participé en '¿Vos y cuántos más de Chequeado' y estos son mis resultados.">
  <meta itemprop="image" content="{{URL::to('/').'/images/unicef/logo-share.png'}}">

  <!-- Twitter Card data -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:site" content="@chequeado">
  <meta name="twitter:title" content="¿Vos y cuántos más? Nueva generación">
  <meta name="twitter:description" content="Participé en '¿Vos y cuántos más de Chequeado' y estos son mis resultados.">
  <meta name="twitter:creator" content="@chequeado">
  <!-- Twitter summary card with large image must be at least 280x150px -->
  <meta name="twitter:image:src" content="{{URL::to('/').'/images/unicef/logo-share.png'}}">

  <!-- Open Graph data -->
  <meta property="og:title" content="¿Vos y cuántos más? Nueva generación" />
  <meta property="og:type" content="article" />
  <meta property="og:url" content="{{Request::fullUrl()}}" />
  <meta property="og:image" content="{{URL::to('/').'/images/unicef/logo-share.png'}}" />
  <meta property="og:description" content="Participé en '¿Vos y cuántos más de Chequeado' y estos son mis resultados." />
  <meta property="og:site_name" content="¿Vos y cuántos más? Nueva generación" />

@endsection

@section('content')

  <div id="question-container" class="container" role="main" ng-controller="SummaryCtrl" ng-init='init("{{$cat}}", {!!$votes!!})' ng-cloak>

      <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-4 flex-align-end flex-direction-col">
            <img alt="Vos y cuantos más?" src="images/unicef/iconito_user.svg" class="img-responsive logo-summary"/>
            <p class="text-right text-title-1">¿VOS Y CUÁNTOS MÁS?</p>
          </div>
          <div class="col-md-4"></div>
      </div>

      <div class="row">
          <div id="central-column" class="col-sm-10 col-sm-offset-1 col-xs-12 flex-direction-col flex-justify-space-between">


            <div class="row">
                <div class="col-md-12">
                    <div class="text-center results-number">
                      <p>¡De <b>@{{total}}</b> preguntas, le acertaste a <b>@{{correctas}}</b>!</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <p class="text-center regular-text">Resultados finales</p>
                </div>
            </div>

            <div class="row">
                <div class="results-container col-md-12">
                    <div class="row">
                      <div class="col-md-4">
                        <h3 class="little-title">VOS Y UN MONTÓN MÁS</h3>
                        <p class="regular-text" ng-show="votes.muchos.length>0">respondieron igual en temas de:</p>
                        <p class="regular-text" ng-show="!votes.muchos">sin coincidencias</p>
                        <p class="item btn-unicef-green" ng-cloak ng-repeat="q in votes.muchos">@{{q.question.title}}</p>
                        <hr/>
                      </div>
                      <div class="col-md-4">
                        <h3 class="little-title">VOS Y MUCHOS MÁS</h3>
                        <p class="regular-text" ng-show="votes.algunos.length>0">respondieron igual en temas de:</p>
                        <p class="regular-text" ng-show="!votes.algunos">sin coincidencias</p>
                        <p class="item btn-unicef-green" ng-cloak ng-repeat="q in votes.algunos">@{{q.question.title}}</p>
                        <hr/>
                      </div>
                      <div class="col-md-4">
                        <h3 class="little-title">VOS Y UNOS POCOS MÁS</h3>
                        <p class="regular-text" ng-show="votes.pocos.length>0">respondieron igual en temas de:</p>
                        <p class="regular-text" ng-show="!votes.pocos">sin coincidencias</p>
                        <p class="item btn-unicef-green" ng-cloak ng-repeat="q in votes.pocos">@{{q.question.title}}</p>
                        <hr/>
                      </div>
                    </div>
                    <div ng-if="notas.length>0" class="row">
                      <div class="col-md-12">
                        <h3 ng-show="!votes.muchos">Por cómo respondiste te recomendamos las siguientes notas:</h3>
                        <ul>
                          <li ng-repeat="n in notas"><a href="@{{n.question.answer_link}}">@{{n.question.answer_title}}</a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <p class="regular-text text-center">¿Te gustó la experiencia? ¡Seguí compartiendo tus ideas en U-Report Argentina!</p>
                        <p class="regular-text text-center"><i class="openmoji openmoji-point"></i><a target="_blank" href="https://m.me/UReportArgentina">https://m.me/UReportArgentina</a> #TuVozImporta <i class="openmoji openmoji-mega"></i></p>
                      </div>
                    </div>
                    <div class="row summary-btns-container">
                        <div class="col-md-4">
                            <a class="share-btn share-twitter btn btn-unicef-green-light btn-block" share-url="{{Request::fullUrl()}}" share-text="Mis resultados en '¿Vos y cuántos más? Nueva generación'" share-hashtags="" share-via="chequeado @UNICEFArgentina">Compartir <i class="fa fa-twitter" aria-hidden="true"></i></a>
                        </div>
                        <div class="col-md-4">
                            <a id="share-facebook" class="btn btn-unicef-green-light btn-block" data-url="{{Request::fullUrl()}}">Compartir <i class="fa fa-facebook-official" aria-hidden="true"></i></a>
                        </div>
                        <div class="col-md-4">
                            <a href="/" class="btn btn-unicef-blue btn-block">Jugar otra vez</a>
                        </div>
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
  </div>

@endsection

@section('after-scripts-end')
    <script>
    </script>
@stop
