@extends ('backend.layouts.master')

@section ('title', trans('custom.backend.answer_types.management'))

@section('page-header')
    <h1>{{ trans('custom.backend.answer_types.management') }}</h1>
@endsection

@section('content')

    <div class="clearfix"></div>

    <div class="box box-success">
        <div class="box-header with-border">
            <div class="pull-right">
                <a class="btn btn-primary btn-xs" href="{{route('admin.answer_types.create')}}">{{ trans('custom.backend.answer_types.create') }}</a>
            </div>
        </div>
        <div class="box-body">

            <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>@sortablelink ('name', trans('custom.backend.answer_types.name'))</th>
                    <th>@sortablelink ('slug', trans('custom.backend.answer_types.slug'))</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($list as $l)
                    <tr>
                        <td>{!! $l->id !!}</td>
                        <td>{!! $l->name !!}</td>
                        <td>{!! $l->slug !!}</td>
                        <td>
                            <a href="{!! route('admin.answer_types.edit', $l->id) !!}" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="{{ trans('custom.backend.answer_types.edit') }}"></i></a>
                            <a href="{!! route('admin.answer_types.destroy', $l->id) !!}'" data-method="delete" class="btn btn-xs btn-danger" 
                            data-trans-button-cancel="{{ trans('custom.backend.delete.cancel') }}"
                            data-trans-button-confirm="{{ trans('custom.backend.delete.confirm') }}"
                            data-trans-title="{{ trans('custom.backend.delete.title') }}"
                            data-trans-text="{{ trans('custom.backend.delete.text') }}"
                            ><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="{{ trans('custom.backend.answer_types.delete') }}"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        
        </div>
    </div>

    <div class="pull-left">
        {{ $list->total() }} {{ trans('custom.backend.answer_types.table') }}
    </div>

    <div class="pull-right">
        {!! $list->render() !!}
    </div>

    <div class="clearfix"></div>
@stop
