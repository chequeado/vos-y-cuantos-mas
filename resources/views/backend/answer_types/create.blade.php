@extends ('backend.layouts.master')

@section ('title', trans('custom.backend.answer_types.management'))

@section('page-header')
    <h1>
        {{ trans('custom.backend.answer_types.management') }}
        <small>{{ trans('custom.backend.answer_types.create') }}</small>
    </h1>
@endsection

@section('content')

    {!! Form::open(['route' => 'admin.answer_types.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) !!}

        @include('backend.answer_types.form')

    {!! Form::close() !!}

@stop