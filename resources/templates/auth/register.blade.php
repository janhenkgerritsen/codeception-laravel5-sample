@extends('layouts.scaffold')

@section('main')
	{!! var_dump(Session::all()) !!}
    <h1>Register</h1>
    {!! Form::open() !!}
    	{!! Form::label('name', 'Name: ') !!}
    	{!! Form::text('name') !!}
    	{!! $errors->first('name') !!}

    	{!! Form::label('email', 'Email: ') !!}
    	{!! Form::email('email') !!}
    	{!! $errors->first('email') !!}
    	
    	{!! Form::label('password', 'Password: ') !!}
    	{!! Form::password('password') !!}
    	{!! $errors->first('password') !!}

    	{!! Form::label('password_confirmation', 'Confirm password: ') !!}
    	{!! Form::password('password_confirmation') !!}
    	<br>
    	{!! Form::submit() !!}
    {!! Form::close() !!}
@stop
