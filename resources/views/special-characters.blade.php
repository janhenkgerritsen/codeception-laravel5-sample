@extends('layouts.scaffold')

@section('main')
    <p class="character">Straße</p>
    <p class="html-encoded">Stra&szlig;e</p>
    <a class="character" href="#">Straße</a>
    <a class="html-encoded" href="#">Stra&szlig;e</a>

    <form>
        <input name="character" value="Straße">
        <input name="html-encode" value="Stra&szlig;e">
    </form>
@stop
