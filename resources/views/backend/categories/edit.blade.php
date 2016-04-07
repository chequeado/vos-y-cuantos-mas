@extends ('backend.layouts.master')

@section ('title', trans('custom.backend.categories.management'))

@section('page-header')
    <h1>
        {{ trans('custom.backend.categories.management') }}
        <small>{{ trans('custom.backend.categories.edit') }}</small>
    </h1>
@endsection

@section('content')

    {!! Form::model($obj, ['route' => ['admin.categories.update', $obj->id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH']) !!}

        @include('backend.categories.form')

    {!! Form::close() !!}

@stop