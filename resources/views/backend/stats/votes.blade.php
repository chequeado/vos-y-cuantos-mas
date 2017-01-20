@extends('backend.layouts.master')

@section('page-header')
    <h1>
        Estadísticas
        <small>Uso de la aplicación</small>
    </h1>
@endsection

@section('content')

    <div class="box box-success">
        <div class="box-body">
            <p>Las estadísticas de uso completas están disponibles en Google Analytics.</p>
            <p>Esta sección sólo muestra una comparativa entre los datos oficiales y lo que los usuarios efectivamente votaron.</p>
        </div><!-- /.box-body -->
    </div><!--box box-success-->


    <div ng-controller="StatsCtrl" ng-init="init('{{$cat}}')">
        <label>Seleccionar categoría: </label>
        @foreach($cats as $c)
            <a ng-href="?cat={{$c->id}}" class="btn btn-flat {{($c->id==$cat)?'btn-primary':'btn-default'}}">
                {{$c->name}}
            </a>
        @endforeach

        <hr/>

        <label>Seleccionar pregunta: </label>    
        <a ng-repeat="q in questions" ng-click="selectQuestion(q)" class="btn btn-flat" ng-class="{'btn-primary':q.id==question.id,'btn-default':q.id!=question.id}">
            @{{q.title}}
        </a> 
        
        <h1 class="text-center">@{{question.title}}</h1>
        <h2 class="text-center">@{{question.description}} ... @{{question.description_suffix}}</h2>

        <div class="col-md-6">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Datos oficiales</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="chart-responsive">
                    <canvas id="doughnut" class="chart chart-doughnut"
                      chart-data="chart1.data" chart-labels="chart1.labels" chart-colours="chart1.colors" chart-legend="false">
                    </canvas>
                  </div>
                  <!-- ./chart-responsive -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li ng-repeat="o in question.options">
                  <a>
                  <i class="fa fa-square" style="color:@{{o.color}}"></i>
                  @{{o.text}}
                  <strong class="pull-right" style="color:@{{o.color}}">@{{o.value}}%</strong>
                  </a>
                </li>
              </ul>
            </div>
            <!-- /.footer -->
          </div>

        </div>

        <div class="col-md-6">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Datos de usuarios (Total de votos: @{{voteTotal}})</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <p ng-show="loadingVotes">Cargando...</p>
                  <div ng-show="!loadingVotes" class="chart-responsive">
                    <canvas id="doughnut2" class="chart chart-doughnut"
                      chart-data="chart2.data" chart-labels="chart2.labels" chart-colours="chart2.colors" chart-legend="false">
                    </canvas>
                  </div>
                  <!-- ./chart-responsive -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li ng-repeat="o in voteOptions">
                  <a>
                  <i class="fa fa-square" style="color:@{{o.color}}"></i>
                  @{{o.text}}
                  <strong class="pull-right" style="color:@{{o.color}}">@{{o.value}}%</strong>
                  </a>
                </li>
              </ul>
            </div>
            <!-- /.footer -->
          </div>

        </div>

    </div>
    

@endsection