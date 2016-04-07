@extends ('backend.layouts.master')

@section ('title', trans('custom.backend.categories.management'))

@section('page-header')
    <h1>
        {{ trans('custom.backend.categories.management') }}
        <small>{{ trans('custom.backend.categories.create') }}</small>
    </h1>
@endsection

@section('content')

    {!! Form::open(['route' => 'admin.categories.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) !!}

        @include('backend.categories.form')

    {!! Form::close() !!}

@stop