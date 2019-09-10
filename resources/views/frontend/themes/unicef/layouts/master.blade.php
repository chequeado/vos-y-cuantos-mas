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
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,800&display=swap" rel="stylesheet">

    </head>
    <body class="body-home body2">

        @include('includes.partials.logout')
        @include('includes.partials.messages')
        @yield('content')

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
