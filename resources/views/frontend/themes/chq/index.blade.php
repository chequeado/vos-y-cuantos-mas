@extends('frontend.themes.'.$theme.'.layouts.master')

@section('meta')
  <!-- Place this data between the <head> tags of your website -->
  <title>El Desmitificador - Jugar con datos</title>
  <meta name="description" content="El Desmitificador es un juego basado en datos que derriba algunas ideas erróneas." />

  <!-- Schema.org markup for Google+ -->
  <meta itemprop="name" content="El Desmitificador - Jugar con datos">
  <meta itemprop="description" content="El Desmitificador es un juego basado en datos que derriba algunas ideas erróneas.">
  <meta itemprop="image" content="{{URL::to('/').'/images/logo-share.jpg'}}">

  <!-- Twitter Card data -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:site" content="@chequeado">
  <meta name="twitter:title" content="El Desmitificador - Jugar con datos">
  <meta name="twitter:description" content="El Desmitificador es un juego basado en datos que derriba algunas ideas erróneas.">
  <meta name="twitter:creator" content="@chequeado">
  <!-- Twitter summary card with large image must be at least 280x150px -->
  <meta name="twitter:image:src" content="{{URL::to('/').'/images/logo-share.jpg'}}">

  <!-- Open Graph data -->
  <meta property="og:title" content="El Desmitificador - Jugar con datos" />
  <meta property="og:type" content="article" />
  <meta property="og:url" content="{{URL::to('/')}}" />
  <meta property="og:image" content="{{URL::to('/').'/images/logo-share.jpg'}}" />
  <meta property="og:description" content="El Desmitificador es un juego basado en datos que derriba algunas ideas erróneas." />
  <meta property="og:site_name" content="El Desmitificador" />
  <meta property="fb:admins" content="Facebook numberic ID" /> 

@endsection

@section('content')

  @if(count($cats)>1)
    @foreach($cats as $cat)
      <a href="/app?cat={{$cat->id}}" class="btn btn-default btn-especial">
          {{$cat->name}}
      </a>
    @endforeach
  @else
    <a href="/app" class="btn btn-default btn-especial">
        Comenzar
    </a>
  @endif


@endsection
