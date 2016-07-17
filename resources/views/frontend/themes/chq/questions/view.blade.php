@extends('frontend.themes.'.$theme.'.layouts.master')

@section('meta')
  <!-- Place this data between the <head> tags of your website -->
  <title>El Desmitificador - {{$obj->title}}</title>
  <meta name="description" content="{{$obj->call_action}}" />

  <!-- Schema.org markup for Google+ -->
  <meta itemprop="name" content="{{$obj->title}}">
  <meta itemprop="description" content="{{$obj->call_action}}">
  <meta itemprop="image" content="{{URL::to('/').'/imagecache/medium/'.$obj->image_file}}">

  <!-- Twitter Card data -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:site" content="@chequeado">
  <meta name="twitter:title" content="{{$obj->title}}">
  <meta name="twitter:description" content="{{$obj->call_action}}">
  <meta name="twitter:creator" content="@chequeado">
  <!-- Twitter summary card with large image must be at least 280x150px -->
  <meta name="twitter:image:src" content="{{URL::to('/').'/imagecache/medium/'.$obj->image_file}}">

  <!-- Open Graph data -->
  <meta property="og:title" content="{{$obj->title}}" />
  <meta property="og:type" content="article" />
  <meta property="og:url" content="{{route('frontend.question.view', ['id' => $obj->id])}}" />
  <meta property="og:image" content="{{URL::to('/').'/imagecache/medium/'.$obj->image_file}}" />
  <meta property="og:description" content="{{$obj->call_action}}" />
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
              <i class="{{$obj->icon}}"></i>
            </md-button>
            <h2>
              <span>{{$obj->category->name}}</span>
            </h2>
          </div>
        </md-toolbar>
        
        <img src="/imagecache/original/{{$obj->image_file}}" class="md-card-image" alt="Banner">
        <md-card-title>
          <md-card-title-text>
            <span class="md-headline">{{$obj->title}}</span>
          </md-card-title-text>
        </md-card-title>
        <md-card-content flex layout-padding>
          <p>
            {{$obj->call_action}}
          </p>
          <p>
            Usamos datos de <a target="_blank" href="{{$obj->answer_source_link}}">{{$obj->answer_source}}</a> y armamos una pregunta en El Desmitificador al respecto.
          </p>
          @if(isset($obj->answer_link))
            <p>
              Hicimos un chequeo sobre este tema: <a target="_blank" href="{{$obj->answer_link}}">leélo aquí</a>.
            </p>
          @endif
          <p>Si quieres saber más, ¡juega!</p>
        </md-card-content>
        <md-card-actions layout="row" layout-align="end center">
          <md-button ng-href="/app" class="md-raised md-accent">
              Jugar ahora
          </md-button>
        </md-card-actions>
      </md-card>
    </div>
</md-content>

@endsection

@section('after-scripts-end')
    <script>
        //Being injected from FrontendController
        console.log(theme);
    </script>
@stop