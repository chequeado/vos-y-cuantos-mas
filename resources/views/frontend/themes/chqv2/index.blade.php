@extends('frontend.themes.'.$theme.'.layouts.master')

@section('meta')
  <!-- Place this data between the <head> tags of your website -->
  <title>¿Vos y cuántos más? - por @chequeado</title>
  <meta name="description" content="'¿Vos y cuántos más de Chequeado' es un juego basado en datos oficiales." />

  <!-- Schema.org markup for Google+ -->
  <meta itemprop="name" content="¿Vos y cuántos más?">
  <meta itemprop="description" content="'¿Vos y cuántos más de Chequeado' es un juego basado en datos oficiales.">
  <meta itemprop="image" content="{{URL::to('/').'/images/logo-share.png'}}">

  <!-- Twitter Card data -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:site" content="@chequeado">
  <meta name="twitter:title" content="¿Vos y cuántos más?">
  <meta name="twitter:description" content="'¿Vos y cuántos más de Chequeado' es un juego basado en datos oficiales.">
  <meta name="twitter:creator" content="@chequeado">
  <!-- Twitter summary card with large image must be at least 280x150px -->
  <meta name="twitter:image:src" content="{{URL::to('/').'/images/logo-share.png'}}">

  <!-- Open Graph data -->
  <meta property="og:title" content="¿Vos y cuántos más?" />
  <meta property="og:type" content="article" />
  <meta property="og:url" content="{{Request::fullUrl()}}" />
  <meta property="og:image" content="{{URL::to('/').'/images/logo-share.png'}}" />
  <meta property="og:description" content="'¿Vos y cuántos más de Chequeado' es un juego basado en datos oficiales." />
  <meta property="og:site_name" content="¿Vos y cuántos más?" />


@endsection

@section('content')
    
    <div class="theme-showcase" role="main">
      <div class="jumbotron-home">
        <div class="row text-center">
          <div class="col-12" style="display: flex; flex-direction: column; align-items: center;justify-content: center;">
              <a href="javascript:;" class="start-button btn" data-toggle="modal" data-target="#chooseModal">
                <img src="images/chqv2/nuevos/fondo.gif" class="img-responsive" />
              </a>
         </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-1"></div>
          <div class="col-md-8">
            <p></p>
              <div class="text-center">
                @if(count($cats)>1)
                  @foreach($cats as $cat)
                    <a href="javascript:;" class="btn btn-default btn-especial2" data-toggle="modal" data-target="#chooseModal{{$cat->id}}">
                        {{$cat->name}} <i class="fa fa-caret-right" aria-hidden="true"></i>
                    </a>
                    <div id="chooseModal{{$cat->id}}" class="modal modal-chq fade" tabindex="-1" role="dialog">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">¿Cuántas preguntas querés contestar?</h4>
                          </div>
                            <div class="modal-body">
                              <p class="text-center">
                                <a href="/app?cat={{$cat->id}}&limit=10" class="btn btn-default btn-especial2">
                                  Contestar 10 preguntas <i class="fa fa-caret-right" aria-hidden="true"></i>
                                </a>
                              </p>
                              <p class="text-center">
                                <a href="/app?cat={{$cat->id}}&limit=20" class="btn btn-default btn-especial2">
                                  Contestar 20 preguntas <i class="fa fa-caret-right" aria-hidden="true"></i>
                                </a>
                              </p>
                              <p class="text-center">
                                <a href="/app?cat={{$cat->id}}" class="btn btn-default btn-especial2">
                                  Contestar todas las preguntas <i class="fa fa-caret-right" aria-hidden="true"></i>
                                </a>
                              </p>
                            </div>
                        </div><!-- /.modal-content -->
                      </div><!-- /.modal-dialog -->
                    </div><!-- /.modal-dialog -->
                  @endforeach
                @else
                  <!--<a href="javascript:;" class="btn btn-default btn-especial2" data-toggle="modal" data-target="#chooseModal">
                      Comenzar <i class="fa fa-caret-right" aria-hidden="true"></i>
                  </a>-->
                  <div id="chooseModal" class="modal modal-chq fade" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                      <div class="header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">¿Cuántas preguntas querés contestar?</h4>
                      </div>
                      <div class="modal-body">
                        <p class="text-center">
                          <a href="/app?limit=10" class=" modal-button">
                            Contestar 10 preguntas <img src="images/chqv2/diamante.png"/>
                          </a>
                        </p>
                        <p class="text-center">
                          <a href="/app?limit=20" class=" modal-button">
                            Contestar 20 preguntas <img src="images/chqv2/diamante.png"/>
                          </a>
                        </p>
                        <p class="text-center">
                          <a href="/app" class=" modal-button">
                            Contestar todas las preguntas  <img src="images/chqv2/diamante.png"/>
                          </a>
                        </p>
                      </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                  </div><!-- /.modal-dialog -->
                @endif
              </div>
          </div>
          <div class="col-md-1"></div>
          <div class="col-md-1"></div>
        </div>
      </div>
        
    </div> <!-- /container -->

@endsection
