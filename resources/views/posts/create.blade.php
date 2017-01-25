@extends('layouts.scaffold')

@section('main')

<h1>Create Post</h1>

<form method="post" action="/posts">
    {{ csrf_field() }}
    <ul>
        <li>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}">
        </li>

        <li>
            <label for="body">Body:</label>
            <textarea id="body" name="body" cols="30" rows="10">{{ old('body') }}</textarea>
        </li>

        <li>
            <input type="submit" value="Submit" class="btn">
        </li>
    </ul>
</form>

@if ($errors->any())
    <ul>
        {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
    </ul>
@endif

@stop