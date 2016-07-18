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


  <md-content layout="row" layout-align="center top" layout-fill>
    <div flex-xs flex-gt-sm="50" layout="column">
      <md-card>
        <md-toolbar md-accent>
          <div class="md-toolbar-tools">
            <md-button class="md-icon-button" aria-label="Chequeado">
              <md-icon md-font-icon="material-icons">playlist_add_check</md-icon>
            </md-button>
            <h2>
              <span>Introducción</span>
            </h2>
          </div>
        </md-toolbar>
        
        <img ng-src="{{asset('/images/logo-share.jpg')}}" class="md-card-image" alt="Banner">
        <md-card-title>
          <md-card-title-text>
            <span class="md-headline">Desmitificador</span>
          </md-card-title-text>
        </md-card-title>
        <md-card-content flex layout-padding>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut commodo mauris at massa rhoncus, et ornare erat porttitor. Nulla non egestas ex, non finibus metus. Pellentesque mi dui, sagittis non viverra a, molestie ut dolor. Integer blandit, quam vitae accumsan vestibulum, purus metus facilisis risus, et dapibus nisi turpis sed dolor.
          </p>
          <p>
            Fusce tempus ex ut posuere congue. Donec nec consectetur nisi. Aliquam gravida nunc diam, et hendrerit dolor volutpat at. Duis pulvinar rutrum quam, a dapibus mi blandit sed. Sed sagittis, leo eu dignissim rutrum, dolor erat ultrices purus, vel aliquam urna ipsum sed urna. Nullam varius mattis nisl nec bibendum.
          </p>
        </md-card-content>
        <md-card-actions layout="row" layout-align="end center">
            @if(count($cats)>1)
              @foreach($cats as $cat)
                <md-button ng-href="/app?cat={{$cat->id}}" class="md-raised md-accent">
                    {{$cat->name}}
                </md-button>
              @endforeach
            @else
              <md-button ng-href="/app" class="md-raised md-accent">
                  Comenzar
              </md-button>
            @endif
        </md-card-actions>
      </md-card>
    </div>
</md-content>

@endsection

@section('after-scripts-end')
    <script>
        //Being injected from FrontendController
    </script>
@stop