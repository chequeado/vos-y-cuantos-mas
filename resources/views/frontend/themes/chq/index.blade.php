@extends('frontend.themes.'.$theme.'.layouts.master')

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
        
        <img ng-src="http://www.addcovers.com/covers/9is08825ma759m0.jpg" class="md-card-image" alt="Banner">
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
        console.log(theme);
    </script>
@stop