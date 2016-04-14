@extends ('backend.layouts.master')

@section ('title', trans('custom.backend.questions.management'))

@section('page-header')
    <h1>
        {{ trans('custom.backend.questions.management') }}
        <small>{{ trans('custom.backend.questions.edit') }}</small>
    </h1>
@endsection

@section('content')

    {!! Form::model($obj, ['route' => ['admin.questions.update', $obj->id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH']) !!}

        @include('backend.questions.form')

    {!! Form::close() !!}

@stop
