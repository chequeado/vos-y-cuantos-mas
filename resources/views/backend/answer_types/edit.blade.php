@extends ('backend.layouts.master')

@section ('title', trans('custom.backend.answer_types.management'))

@section('page-header')
    <h1>
        {{ trans('custom.backend.answer_types.management') }}
        <small>{{ trans('custom.backend.answer_types.edit') }}</small>
    </h1>
@endsection

@section('content')

    {!! Form::model($obj, ['route' => ['admin.answer_types.update', $obj->id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH']) !!}

        @include('backend.answer_types.form')

    {!! Form::close() !!}

@stop