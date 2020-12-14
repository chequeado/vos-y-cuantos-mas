@extends('frontend.themes.'.$theme.'.layouts.master')

@section('meta')
  <!-- Place this data between the <head> tags of your website -->
  <title>¿Vos y cuántos más? - Mis resultados</title>
  <meta name="description" content="Participé en '¿Vos y cuántos más de Chequeado' y estos son mis resultados." />

  <!-- Schema.org markup for Google+ -->
  <meta itemprop="name" content="¿Vos y cuántos más?">
  <meta itemprop="description" content="Participé en '¿Vos y cuántos más de Chequeado' y estos son mis resultados.">
  <meta itemprop="image" content="{{URL::to('/').'/images/logo-share.png'}}">

  <!-- Twitter Card data -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:site" content="@chequeado">
  <meta name="twitter:title" content="¿Vos y cuántos más?">
  <meta name="twitter:description" content="Participé en '¿Vos y cuántos más de Chequeado' y estos son mis resultados.">
  <meta name="twitter:creator" content="@chequeado">
  <!-- Twitter summary card with large image must be at least 280x150px -->
  <meta name="twitter:image:src" content="{{URL::to('/').'/images/logo-share.png'}}">

  <!-- Open Graph data -->
  <meta property="og:title" content="¿Vos y cuántos más?" />
  <meta property="og:type" content="article" />
  <meta property="og:url" content="{{Request::fullUrl()}}" />
  <meta property="og:image" content="{{URL::to('/').'/images/logo-share.png'}}" />
  <meta property="og:description" content="Participé en '¿Vos y cuántos más de Chequeado' y estos son mis resultados." />
  <meta property="og:site_name" content="¿Vos y cuántos más?" />

@endsection

@section('content')

    <div class="question-container" ng-controller="SummaryCtrl" ng-init='init("{{$cat}}", {!!$votes!!})' ng-cloak>

        <div class="container theme-showcase" role="main">
          <div class="jumbotron-final">
              <div class="container">
                <div class="row">
                  <div class="col-md-4"></div>
                  <div class="col-md-4"><img alt="Vos y cuantos más?" src="images/logo_grande.png" class="img-responsive" style="margin:30px 0 0 0"/></div>
                  <div class="col-md-4"></div>
                </div>
                <div class="final-final text-center ng-cloak">
                  <h1>¡De <b>@{{total}}</b> preguntas, le acertaste a <b>@{{correctas}}</b>!</h1>
                </div>
                <div class="clearfix"></div>
                <div class="text-center"><h2>Resultados finales</h2></div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="row">
                          <div class="col-md-4">
                            <p class="bg-info"><img alt="Vos y cuantos más?" src="images/monton.png" class="img-responsive"/></p>
                            <h3 ng-show="votes.muchos.length>0">respondieron igual en temas de:</h3>
                            <h3 ng-show="!votes.muchos">sin coincidencias</h3>
                            <p class="bg-info" ng-cloak ng-repeat="q in votes.muchos">@{{q.question.title}}</p>
                          </div>
                          <div class="col-md-4">
                            <p class="bg-info"><img alt="Vos y cuantos más?" src="images/muchos.png" class="img-responsive"/></p>
                            <h3 ng-show="votes.algunos.length>0">respondieron igual en temas de:</h3>
                            <h3 ng-show="!votes.algunos">sin coincidencias</h3>
                            <p class="bg-info" ng-cloak ng-repeat="q in votes.algunos">@{{q.question.title}}</p>
                          </div>
                          <div class="col-md-4">
                            <p class="bg-info"><img alt="Vos y cuantos más?" src="images/pocos.png" class="img-responsive"/></p>
                            <h3 ng-show="votes.pocos.length>0">respondieron igual en temas de:</h3>
                            <h3 ng-show="!votes.pocos">sin coincidencias</h3>
                            <p class="bg-info" ng-cloak ng-repeat="q in votes.pocos">@{{q.question.title}}</p>
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
                            <div class="col-md-4">
                                <a class="share-btn share-twitter btn btn-default btn-especial3" share-url="{{Request::fullUrl()}}" share-text="Mis resultados en '¿Vos y cuántos más?'" share-hashtags="" share-via="chequeado">Compartir <i class="fa fa-twitter" aria-hidden="true"></i></a>
                            </div>
                            <div class="col-md-4">
                                <a id="share-facebook" class="btn btn-default btn-especial3" data-url="{{Request::fullUrl()}}">Compartir <i class="fa fa-facebook-official" aria-hidden="true"></i></a>
                            </div>
                            <div class="col-md-4">
                                <a href="/" class="btn btn-default btn-especial3">Volver al inicio</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- /container -->         

</div><!--main-->
@endsection

@section('after-scripts-end')
    <script>
    </script>
@stop