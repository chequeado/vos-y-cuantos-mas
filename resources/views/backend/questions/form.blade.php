<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title">{{ trans('custom.backend.questions.title') }}</h3>
    </div>

    <div class="box-body">


        <div class="form-group">
            <label class="col-lg-2 control-label">{{ trans('custom.backend.questions.title') }}</label>
            <div class="col-lg-10">
                {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => trans('custom.backend.questions.title')]) !!}
            </div>
        </div><!--form control-->

        <div class="form-group">
            <label class="col-lg-2 control-label">{{ trans('custom.backend.questions.description') }}</label>
            <div class="col-lg-10">
                {!! Form::text('description', null, ['class' => 'form-control', 'placeholder' => trans('custom.backend.questions.description')]) !!}
            </div>
        </div><!--form control-->

        <div class="form-group">
            <label class="col-lg-2 control-label">{{ trans('custom.backend.questions.category_id') }}</label>
            <div class="col-lg-10">
                {!! Form::select('category_id', $categories, null, array('class'=>'form-control chosen-select')) !!}
            </div>
        </div><!--form control-->

    </div>

    <div class="box-header with-border">
        <h3 class="box-title">{{ trans('custom.backend.questions.options') }}</h3>
    </div>

    <div class="box-body" ng-controller="QuestionCtrl">

        <div class="form-group" ng-init="init({{ (isset($obj))?$obj->toJson():'{}' }},{{ (isset($obj))?$obj->options->toJson():'[]' }})">
            <label class="col-lg-2 control-label">{{ trans('custom.backend.questions.answer_type_id') }}</label>
            <div class="col-lg-10">
                {!! Form::select('answer_type_id', $answer_types, null, array('class'=>'form-control', 'ng-model'=>'answer_type', 'chosen'=>'', 'ng-change' => 'changeType()')) !!}
            </div>
        </div><!--form control-->

         <div ng-if="answer_type" ng-include="include_options">
            <!-- template de options -->
         </div>

    </div>

    <div class="box-header with-border">
        <h3 class="box-title">{{ trans('custom.backend.questions.answer') }}</h3>
    </div>

    <div class="box-body">

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
                {!! Form::text('answer_description', null, ['class' => 'form-control', 'placeholder' => trans('custom.backend.questions.answer_description')]) !!}
            </div>
        </div><!--form control-->

        <div class="form-group">
            <label class="col-lg-2 control-label">{{ trans('custom.backend.questions.icon') }}</label>
            <div class="col-lg-10">
                {!! Form::text('icon', null, ['class' => 'form-control', 'placeholder' => trans('custom.backend.questions.icon')]) !!}
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
            <label class="col-lg-2 control-label">{{ trans('custom.backend.questions.answer_chart') }}</label>
            <div class="col-lg-10">
                {!! Form::text('answer_chart', null, ['class' => 'form-control', 'placeholder' => trans('custom.backend.questions.answer_chart')]) !!}
            </div>
        </div><!--form control-->

    </div>
</div>


<div class="box box-success">
    <div class="box-body">
        <div class="pull-left">
            <a href="{{route('admin.questions.index')}}" class="btn btn-danger">{{ trans('buttons.general.cancel') }}</a>
        </div>
        <div class="pull-right">
            <input type="submit" class="btn btn-success" value="{{ trans('buttons.general.save') }}" />
        </div>
    </div>
</div>
<div class="clearfix"></div>