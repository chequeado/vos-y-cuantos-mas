@extends ('backend.layouts.master')

@section ('title', trans('custom.backend.questions.management'))

@section('page-header')
    <h1>
        {{ trans('custom.backend.questions.management') }}
        <small>{{ trans('custom.backend.questions.create') }}</small>
    </h1>
@endsection

@section('content')

    {!! Form::open(['route' => 'admin.questions.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) !!}

        @include('backend.questions.form')

    {!! Form::close() !!}

@stop
