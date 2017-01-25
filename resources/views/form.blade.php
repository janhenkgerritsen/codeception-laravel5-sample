@extends('layouts.scaffold')

@section('main')
    <p>
        Your message: {{ $message }}
    </p>

    <form action="/form">
        <input type="text" name="message">
        <input type="submit" value="Submit">
    </form>
@stop