@extends ('backend.layouts.master')

@section ('title', trans('custom.backend.categories.management'))

@section('page-header')
    <h1>{{ trans('custom.backend.categories.management') }}</h1>
@endsection

@section('content')

    <div class="clearfix"></div>

    <div class="box box-success">
        <div class="box-header with-border">
            <div class="pull-right">
                <a class="btn btn-primary btn-xs" href="{{route('admin.categories.create')}}">{{ trans('custom.backend.categories.create') }}</a>
            </div>
        </div>
        <div class="box-body">

            <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>@sortablelink ('name', trans('custom.backend.categories.name'))</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($list as $l)
                    <tr>
                        <td>{!! $l->id !!}</td>
                        <td>{!! $l->name !!}</td>
                        <td>
                            <a href="{!! route('admin.categories.edit', $l->id) !!}" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="{{ trans('custom.backend.categories.edit') }}"></i></a>
                            <a href="{!! route('admin.categories.destroy', $l->id) !!}'" data-method="delete" class="btn btn-xs btn-danger" 
                            data-trans-button-cancel="{{ trans('custom.backend.delete.cancel') }}"
                            data-trans-button-confirm="{{ trans('custom.backend.delete.confirm') }}"
                            data-trans-title="{{ trans('custom.backend.delete.title') }}"
                            data-trans-text="{{ trans('custom.backend.delete.text') }}"
                            ><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="{{ trans('custom.backend.categories.delete') }}"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        
        </div>
    </div>

    <div class="pull-left">
        {{ $list->total() }} {{ trans('custom.backend.categories.table') }}
    </div>

    <div class="pull-right">
        {!! $list->render() !!}
    </div>

    <div class="clearfix"></div>
@stop
