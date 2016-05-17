@extends ('backend.layouts.master')

@section ('title', trans('custom.backend.questions.management'))

@section('page-header')
    <h1>{{ trans('custom.backend.questions.management') }}</h1>
@endsection

@section('content')

    <div class="clearfix"></div>

    <div class="box box-success">
        <div class="box-header with-border">
            <div class="pull-right">
                <a class="btn btn-primary btn-xs" href="{{route('admin.questions.create')}}">{{ trans('custom.backend.questions.create') }}</a>
            </div>
        </div>
        <div class="box-body">

            <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>@sortablelink ('title', trans('custom.backend.questions.title'))</th>
                    <th>Descripción</th>
                    <th>@sortablelink ('answer_type_id', trans('custom.backend.questions.answer_type_id'))</th>
                    <th>@sortablelink ('category_id', trans('custom.backend.questions.category_id'))</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($list as $l)
                    <tr>
                        <td>{!! $l->id !!}</td>
                        <td>{!! $l->title !!}</td>
                        <td>{!! $l->description !!} < opciones > {!! $l->description_suffix !!}</td>
                        <td>{!! $l->answer_type->name !!}</td>
                        <td>{!! $l->category->name !!}</td>
                        <td>
                            <a href="{!! route('admin.questions.edit', $l->id) !!}" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="{{ trans('custom.backend.questions.edit') }}"></i></a>
                            <a href="{!! route('admin.questions.destroy', $l->id) !!}'" data-method="delete" class="btn btn-xs btn-danger" 
                            data-trans-button-cancel="{{ trans('custom.backend.delete.cancel') }}"
                            data-trans-button-confirm="{{ trans('custom.backend.delete.confirm') }}"
                            data-trans-title="{{ trans('custom.backend.delete.title') }}"
                            data-trans-text="{{ trans('custom.backend.delete.text') }}"
                            ><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="{{ trans('custom.backend.questions.delete') }}"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        
        </div>
    </div>

    <div class="pull-left">
        {{ $list->total() }} {{ trans('custom.backend.questions.table') }}
    </div>

    <div class="pull-right">
        {!! $list->render() !!}
    </div>

    <div class="clearfix"></div>
@stop
