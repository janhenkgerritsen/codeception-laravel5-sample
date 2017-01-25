@extends('layouts.scaffold')

@section('main')

<h1>Edit Post</h1>
<form method="post" action="/posts/{{ $post->id }}">
    {{ csrf_field() }}
    {{ method_field('patch') }}
    <ul>
        <li>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}">
        </li>

        <li>
            <label for="body">Body:</label>
            <textarea id="body" name="body" cols="30" rows="10">{{ old('body', $post->body) }}</textarea>
        </li>

        <li>
            <input type="submit" value="Update" class="btn btn-info">
            <a href="/posts/{{ $post->id }}" class="btn">Cancel</a>
        </li>
    </ul>
</form>

@if ($errors->any())
    <ul>
        {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
    </ul>
@endif

@stop