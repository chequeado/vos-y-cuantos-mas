<div class="nav-tabs-custom">
    <ul id="myTabs" class="nav nav-tabs">
      <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="false"><i class="fa fa-question"></i> Pregunta</a></li>
      <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false"><i class="fa fa-list"></i> Opciones</a></li>
      <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="true"><i class="fa fa-check"></i> Respuesta</a></li>
    </ul>
    <div class="tab-content">
      <div class="tab-pane active" id="tab_1">
        <div class="form-group">
            <label class="col-lg-2 control-label">{{ trans('custom.backend.questions.title') }}</label>
            <div class="col-lg-10">
                {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => trans('custom.backend.questions.title')]) !!}
            </div>
        </div><!--form control-->

        <div class="form-group">
            <label class="col-lg-2 control-label">{{ trans('custom.backend.questions.call') }}</label>
            <div class="col-lg-10">
                {!! Form::textarea('call_action', null, ['class' => 'form-control', 'placeholder' => trans('custom.backend.questions.call')]) !!}
            </div>
        </div><!--form control-->

        <div class="form-group">
            <label class="col-lg-2 control-label">{{ trans('custom.backend.questions.category_id') }}</label>
            <div class="col-lg-10">
                {!! Form::select('category_id', $categories, null, array('class'=>'form-control chosen-select')) !!}
            </div>
        </div><!--form control-->

        <div class="form-group">
            <label class="col-lg-2 control-label">{{ trans('custom.backend.questions.image_file') }}</label>
            <div class="hide">
                {!! Form::text('image_file', null, ['class' => 'form-control', 'placeholder' => trans('custom.backend.questions.image_file')]) !!}
            </div>
            <div ng-controller="ImageCtrl" ng-init="init('{{isset($obj)?$obj->image_file:''}}')">
                <div class="col-lg-5">
                    <input type='file' class="hide" id="inputFile" name="image_new_file"/>
                    <img id="image_upload_preview" class="img-responsive" ng-src="@{{imgUrl}}" />
                </div>
                <div class="col-lg-5">
                    <a class="btn btn-primary btn-flat" ng-click="openImage()"><i class="fa fa-image"></i> Cambiar Imagen</a>
                    <a class="btn btn-default btn-flat hide" ng-click="clearImage()"><i class="fa fa-trash"></i> Limpiar imagen</a>
                    <p>No olvides hacer click en el botón verde de Guardar.</p>
                </div>
            </div>
        </div><!--form control-->

        <div class="form-group">
            <label class="col-lg-2 control-label">{{ trans('custom.backend.questions.description') }}</label>
            <div class="col-lg-10">
                {!! Form::text('description', null, ['class' => 'form-control', 'placeholder' => trans('custom.backend.questions.description')]) !!}
            </div>
        </div><!--form control-->

        <div class="form-group">
            <label class="col-lg-2 control-label">{{ trans('custom.backend.questions.description_suffix') }}</label>
            <div class="col-lg-10">
                {!! Form::text('description_suffix', null, ['class' => 'form-control', 'placeholder' => trans('custom.backend.questions.description_suffix')]) !!}
            </div>
        </div><!--form control-->
      </div>
      <!-- /.tab-pane -->
      <div class="tab-pane" id="tab_2">
        <div ng-controller="QuestionCtrl">

            <div class="form-group" ng-init="init({{ (isset($obj))?$obj->toJson():'{}' }},{{ (isset($obj))?$obj->options->toJson():'[]' }})">
                <!--label class="col-lg-2 control-label">{{ trans('custom.backend.questions.answer_type_id') }}</label>
                <div class="col-lg-10">
                    {!! Form::select('answer_type_id', $answer_types, null, array('class'=>'form-control', 'ng-model'=>'answer_type', 'chosen'=>'', 'ng-change' => 'changeType()')) !!}
                </div-->
            </div><!--form control-->
            
            {!! Form::hidden('answer_type_id', 'options', array('class'=>'form-control', 'ng-model'=>'answer_type')) !!}

             <div ng-if="answer_type" ng-include="include_options">
                <!-- template de options -->
             </div>

        </div>
      </div>
      <!-- /.tab-pane -->
      <div class="tab-pane" id="tab_3">
        <div class="form-group">
            <label class="col-lg-2 control-label">{{ trans('custom.backend.questions.answer_link') }}</label>
            <div class="col-lg-10">
                {!! Form::text('answer_link', null, ['class' => 'form-control', 'placeholder' => trans('custom.backend.questions.answer_link')]) !!}
            </div>
        </div><!--form control-->

        <div class="form-group">
            <label class="col-lg-2 control-label">{{ trans('custom.backend.questions.answer_title') }}</label>
            <div class="col-lg-10">
                {!! Form::text('answer_title', null, ['class' => 'form-control', 'placeholder' => trans('custom.backend.questions.answer_title')]) !!}
            </div>
        </div><!--form control-->

        <div class="form-group">
            <label class="col-lg-2 control-label">{{ trans('custom.backend.questions.answer_description') }}</label>
            <div class="col-lg-10">
                {!! Form::textarea('answer_description', null, ['class' => 'form-control', 'placeholder' => trans('custom.backend.questions.answer_description')]) !!}
            </div>
        </div><!--form control-->

        <div class="form-group">
            <label class="col-lg-2 control-label">{{ trans('custom.backend.questions.icon') }}</label>
            <div class="col-lg-10">
                @include('backend.questions.select', array('name' => 'icon','selected' => (isset($obj))?$obj->icon:null))
            </div>
        </div><!--form control-->



        <div class="form-group">
            <label class="col-lg-2 control-label">{{ trans('custom.backend.questions.answer_source') }}</label>
            <div class="col-lg-10">
                {!! Form::text('answer_source', null, ['class' => 'form-control', 'placeholder' => trans('custom.backend.questions.answer_source')]) !!}
            </div>
        </div><!--form control-->

        <div class="form-group">
            <label class="col-lg-2 control-label">{{ trans('custom.backend.questions.answer_source_link') }}</label>
            <div class="col-lg-10">
                {!! Form::text('answer_source_link', null, ['class' => 'form-control', 'placeholder' => trans('custom.backend.questions.answer_source_link')]) !!}
            </div>
        </div><!--form control-->

        <div class="form-group">
            <label class="col-lg-2 control-label">{{ trans('custom.backend.questions.share_text') }}</label>
            <div class="col-lg-10">
                {!! Form::text('share_text', null, ['class' => 'form-control', 'placeholder' => trans('custom.backend.questions.share_text')]) !!}
            </div>
        </div><!--form control-->

      </div>
      <!-- /.tab-pane -->
    </div>
    <!-- /.tab-content -->
</div>

<div class="box">
    <div class="box-body">
        <div class="pull-left">
            <a href="{{route('admin.questions.index')}}" class="btn btn-danger btn-large btn-flat">{{ trans('buttons.general.cancel') }}</a>
        </div>
        <div class="pull-right">
            <input type="submit" class="btn btn-success btn-large btn-flat" value="{{ trans('buttons.general.save') }}" />
        </div>
    </div>
</div>
<div class="clearfix"></div>