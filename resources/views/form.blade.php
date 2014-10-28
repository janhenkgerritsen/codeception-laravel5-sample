@extends('layouts.scaffold')

@section('main')
    {!! Form::open(['url' => '/form/result']) !!}
        {!! Form::text('message') !!}
        {!! Form::submit('Submit') !!}
    {!! Form::close() !!}
@stop