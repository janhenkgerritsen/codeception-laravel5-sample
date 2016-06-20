@inject('converter', 'App\Test\StringConverter')

@extends('layouts.scaffold')

@section('main')
    <p class="converted">{{ $converter->convert('String To Convert') }}</p>
@stop
