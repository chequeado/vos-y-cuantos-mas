@extends('frontend.themes.'.$theme.'.layouts.master')

@section('meta')
  <!-- Place this data between the <head> tags of your website -->
  <title>¿Vos y cuántos más? - Pregunta no encontrada</title>

@endsection

@section('content')

    <div class="question-container">

        <!-- container -->
        <div class="container theme-showcase" role="main">
            <div class="row">
            <div class="col-md-10 col-md-offset-1">
              <div class="jumbotron">

              <div class="row">
                    <div class="col-md-6">
                      <h1>Oops! Pregunta no encontrada</h1>

                      <div class="well">
                        <p>Es probable que hayas llegado hasta acá por un link erróneo o que estemos revisando la información de esta pregunta.</p>
                      </div>
                      <p></p>
                      <p>Si quieres saber más, ¡juega!</p>
                    </div>

                </div>

                <div class="row">

                    <a href="/" class="btn btn-default btn-especial-grande boton-abajo-right">Jugar <i class="fa fa-caret-right" aria-hidden="true"></i></a>

                </div>

              </div> <!-- /jumbotron -->
        </div> <!-- /col -->
        </div> <!-- /row -->
        </div> <!-- /container -->

    </div><!--main-->
@endsection

@section('after-scripts-end')
    <script>
    </script>
@stop
