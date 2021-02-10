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
     <div class="credit">
            <a href="javascript:;" class="start-button btn" data-toggle="modal" data-target="#chooseModalCredit">
                <img src="/images/chqv2/nuevos/pregunta2.gif"  width="40px" />
            </a>
        </div>
        <div id="chooseModalCredit" class="modal modal-chq-credit fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title-credit">Los participantes de este proyecto fueron: </h4>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <ul style="list-style: none;">
                                                <li style="margin: 5px 0">
                                                    <b>Dirección ejecutiva:</b> Laura Zommer
                                                </li>
                                                <li style="margin: 5px 0">
                                                    <b>Dirección de proyecto:</b> Pablo M. Fernández
                                                </li>
                                                <li style="margin: 5px 0">
                                                    <b>Coordinacion de producto:</b> Ariel Tiferes
                                                </li>
                                                <li style="margin: 5px 0">
                                                    <b>Desarrollo:</b> Pilar Castro, Pablo H. Paladino y Joaquin Saralegui
                                                </li>
                                                <li style="margin: 5px 0">
                                                    <b>Investigación, análisis de datos y redacción:</b> Ariel Riera
                                                </li>
                                                <li style="margin: 5px 0">
                                                    <b>Ilustraciones 8 bit: </b> Gastón Márquez (Gazulo)
                                                </li>
                                                <li style="margin: 5px 0">
                                                    <b>Tecnologías utilizadas: </b> Laravel PHP - MySQL - Angular JS
                                                </li>
                                                <li style="margin: 5px 0">
                                                    <b>Con el apoyo de Tinker Foundation.</b>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

      <div class="container-pregunta theme-showcase final-summary" role="main">
        <div class="row">
         <!--  <div class="col-md-8 col-md-offset-2 text-center">                    
            <h1 class="question-title">¡De <b>@{{total}}</b> preguntas, le acertaste a <b>@{{correctas}}</b>!</h1>
          </div>  -->
        </div>  
        
        <h2 class="question-action">Resultados finales <br />  <span class="question-title">¡De <b>@{{total}}</b> preguntas, le acertaste a <b>@{{correctas}}</b>!</span></h2>
        <div class="row">          
            <div class="col-md-10 col-md-offset-1">
                <div class="row box3">
                  <div class="col-md-4">
                    <p class="question-option">Vos y un montón más</p>
                    <h3 ng-show="votes.muchos.length>0">respondieron igual en temas de:</h3>
                    <h3 ng-show="!votes.muchos">sin coincidencias</h3>
                    <p class="" ng-cloak ng-repeat="q in votes.muchos">@{{q.question.title}}</p>
                  </div>
                  <div class="col-md-4">
                    <p class="question-option">Vos y muchos más</p>
                    <h3 ng-show="votes.algunos.length>0">respondieron igual en temas de:</h3>
                    <h3 ng-show="!votes.algunos">sin coincidencias</h3>
                    <p class="" ng-cloak ng-repeat="q in votes.algunos">@{{q.question.title}}</p>
                  </div>
                  <div class="col-md-4">
                    <p class="question-option">Vos y pocos más</p>
                    <h3 ng-show="votes.pocos.length>0">respondieron igual en temas de:</h3>
                    <h3 ng-show="!votes.pocos">sin coincidencias</h3>
                    <p class="" ng-cloak ng-repeat="q in votes.pocos">@{{q.question.title}}</p>
                  </div>
                </div>
                <div ng-if="notas.length>0" class="row recomendation">
                  <div class="col-md-12">
                    <h3 ng-show="!votes.muchos">Por cómo respondiste te recomendamos las siguientes notas:</h3>
                    <ul>
                      <li ng-repeat="n in notas"><a href="@{{n.question.answer_link}}">@{{n.question.answer_title}}</a></li>
                    </ul>
                  </div>
                </div>
                <div class="row share">
                    <div>
                        <a href="#" class="share-twitter" share-url="{{url('questions')}}/@{{question.id}}" share-text="Mirá los datos sobre @{{question.title}} en '¿Vos y cuántos más?'" share-hashtags="" share-via="chequeado">
                        Compartir <i class="fa fa-twitter" aria-hidden="true"></i>
                    </a>
                    </div>
                    <div>
                    <a id="share-facebook" data-url="{{url('questions')}}/@{{question.id}}" href="#" class="share-facebook">
                        Compartir <i class="fa fa-facebook-official" aria-hidden="true"></i>
                    </a>
                    </div>
                    <div>
                    <a href="/" class="back-home">
                      Inicio
                    </a>
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