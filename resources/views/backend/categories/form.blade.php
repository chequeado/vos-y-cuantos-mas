<div class="box box-success">
    <div class="box-body">
        <div class="form-group">
            <label class="col-lg-2 control-label">{{ trans('custom.backend.categories.name') }}</label>
            <div class="col-lg-10">
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('custom.backend.categories.name')]) !!}
            </div>
        </div><!--form control-->
    </div>
</div>


<div class="box box-success">
    <div class="box-body">
        <div class="pull-left">
            <a href="{{route('admin.categories.index')}}" class="btn btn-danger">{{ trans('buttons.general.cancel') }}</a>
        </div>
        <div class="pull-right">
            <input type="submit" class="btn btn-success" value="{{ trans('buttons.general.save') }}" />
        </div>
    </div>
</div>
<div class="clearfix"></div>