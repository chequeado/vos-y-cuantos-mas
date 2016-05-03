@extends('frontend.layouts.master')

@section('content')
    <div class="row">

        <div class="col-xs-12">
            <h1>Desmitificador<small>por chequeado.com</small></h1>
            <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut commodo mauris at massa rhoncus, et ornare erat porttitor. Nulla non egestas ex, non finibus metus. Pellentesque mi dui, sagittis non viverra a, molestie ut dolor. Integer blandit, quam vitae accumsan vestibulum, purus metus facilisis risus, et dapibus nisi turpis sed dolor. Fusce tempus ex ut posuere congue. Donec nec consectetur nisi. Aliquam gravida nunc diam, et hendrerit dolor volutpat at. Duis pulvinar rutrum quam, a dapibus mi blandit sed. Sed sagittis, leo eu dignissim rutrum, dolor erat ultrices purus, vel aliquam urna ipsum sed urna. Nullam varius mattis nisl nec bibendum.
            </p>
        </div>
 
    </div><!--row-->
    <div class="row">

        <div class="col-xs-12">
            <p class="text-center">
            <a class="btn btn-lg btn-default" href="/app">Comenzar!</a>
            </p>
        </div>
 
    </div><!--row-->
@endsection

@section('after-scripts-end')
    <script>
        //Being injected from FrontendController
        console.log(test);
    </script>
@stop