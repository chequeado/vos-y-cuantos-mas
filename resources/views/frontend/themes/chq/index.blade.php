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
    
    <div class="container theme-showcase" role="main">
      <div class="jumbotron-home">
        <div class="row">
          <div class="col-md-4 col-md-offset-4">
            <img alt="Vos y cuantos más?" src="images/logo_grande.png" class="img-responsive logo-home"/>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-1"></div>
          <div class="col-md-8">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vestibulum libero vel volutpat facilisis. Ut tristique diam sapien, vel rutrum ante finibus in. Sed blandit enim quis magna finibus, ut pharetra nibh facilisis. Vestibulum enim turpis, finibus in odio vestibulum, aliquet laoreet mi. Morbi a orci mollis, aliquet quam a, iaculis odio. Pellentesque quam ipsum, faucibus tincidunt interdum nec, convallis non tellus. Aliquam erat volutpat. Curabitur quis laoreet velit. Sed nec mauris consequat, viverra mi quis, viverra arcu. Quisque sed lacinia massa, vitae sollicitudin justo. </p>
              <div class="text-center">
                @if(count($cats)>1)
                  @foreach($cats as $cat)
                    <a href="/app?cat={{$cat->id}}" class="btn btn-default btn-especial2">
                        {{$cat->name}} <i class="fa fa-caret-right" aria-hidden="true"></i>
                    </a>
                  @endforeach
                @else
                  <a href="/app" class="btn btn-default btn-especial2">
                      Comenzar <i class="fa fa-caret-right" aria-hidden="true"></i>
                  </a>
                @endif
              </div>
          </div>
          <div class="col-md-1"></div>
          <div class="col-md-1"></div>
        </div>
      </div>
        
    </div> <!-- /container -->




@endsection
