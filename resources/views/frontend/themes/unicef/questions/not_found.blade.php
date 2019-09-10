@extends('frontend.themes.'.$theme.'.layouts.master')

@section('meta')
  <!-- Place this data between the <head> tags of your website -->
  <title>¿Vos y cuántos más? Nueva generación - Pregunta no encontrada</title>

@endsection

@section('content')
    <div id="question-detail-container" class="container">

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
                    <div class="results-number">
                      <h1 class="question-title">Oops! Pregunta no encontrada</h1>
                      <hr/>
                      <p class="p-text">Es probable que hayas llegado hasta acá por un link erróneo o que estemos revisando la información de esta pregunta.</p>
                      <p class="p-text">Si quieres saber más, ¡juega!</p>
                      <a href="/" class="btn btn-unicef-blue text-center">Jugar ahora!</a>
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
