@extends('layouts.scaffold')

@section('main')
    <p>
        Your message: {{ $message }}
    </p>

    {!! Form::open() !!}
        {!! Form::text('message') !!}
        {!! Form::submit('Submit') !!}
    {!! Form::close() !!}
@stop