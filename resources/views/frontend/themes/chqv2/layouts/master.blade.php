<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/Article" ng-app="DesmitificadorApp">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="_token" content="{{ csrf_token() }}" />

        <title>¿Vos y cuántos más?</title>

        <!-- Meta -->
        <meta name="description" content="@yield('meta_description', '¿Vos y cuántos más?')">
        <meta name="author" content="@yield('meta_author', 'Chequeado.com')">
        @yield('meta')

        <!-- Styles -->
        @yield('before-styles-end')
        {!! Html::style(elixir('css/frontend.'.$theme.'.css')) !!}
        @yield('after-styles-end')

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Capriola" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

    </head>
    <body class="body-home body2">
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
                        <h4 class="modal-title-credit" style="text-align: center">Créditos: </h4>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-12 list-credits">
                                            <ul style="list-style: none;">
                                                <li style="margin: 5px 0">
                                                    <b>Dirección ejecutiva: </b> <a href="https://twitter.com/lauzommer"> Laura Zommer </a>
                                                </li>
                                                <li style="margin: 5px 0">
                                                    <b>Dirección de proyecto: </b> <a href="https://twitter.com/fernandezpm"> Pablo M. Fernández</a>
                                                </li>
                                                <li style="margin: 5px 0">
                                                    <b>Coordinacion de producto: </b> <a href="https://twitter.com/Gauyo"> Ariel Tiferes</a>
                                                </li>
                                                <li style="margin: 5px 0">
                                                    <b>Desarrollo:</b> Pilar Castro, <a href="https://twitter.com/palamago"> Pablo H. Paladino</a> y <a href="https://twitter.com/joacosaralegui"> Joaquin Saralegui</a>
                                                </li>
                                                <li style="margin: 5px 0">
                                                    <b>Investigación, análisis de datos y redacción: </b ><a href="https://twitter.com/am_riera"> Ariel Riera</a>
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
        



        @include('includes.partials.logout')
        @include('includes.partials.messages')
        @yield('content')
        @include('frontend.themes.'.$theme.'.includes.footer')
        @include('frontend.themes.'.$theme.'.includes.feedbackmodals')

        <!-- JavaScripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="{{asset('js/vendor/jquery/jquery-2.1.4.min.js')}}"><\/script>')</script>

        {!! Html::script('js/vendor/bootstrap/bootstrap.min.js') !!}
        @include('includes.partials.fb')

        @yield('before-scripts-end')
        {!! Html::script(elixir('js/frontend.js')) !!}
        @yield('after-scripts-end')

        <!-- Your application bootstrap  -->
        <script type="text/javascript">

        </script>

        @include('includes.partials.ga')
    </body>
</html>
